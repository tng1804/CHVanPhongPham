<?php
// require_once("");
require_once "./mvc/controllers/PaymentController.php";
class CheckoutController extends Controller
{
    function SayHi() {}
    function Checkout()
    {
        $cartModel = $this->model("CartModel");
        $id_taikhoan = $_SESSION['id_User'];

        $total = $this->getTotalPrice($cartModel, $id_taikhoan);
        $this->view("Customer/Checkout", [
            "carts" => $cartModel->getCart($id_taikhoan),
            "totalPrice" => $total,
        ]);
    }
    function postCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_taikhoan = $_SESSION['id_User'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['tel'];
            $payment_method = $_POST['payment'];
            $status = 0;

            $cartModel = $this->model("CartModel");
            $id_taikhoan = $_SESSION['id_User'];

            $totalPrice = $this->getTotalPrice($cartModel, $id_taikhoan);
            $orderModel = $this->model('Orders');

            if ($order = $orderModel->insert($id_taikhoan, $name, $email, $phone, $status, $address, $totalPrice, $payment_method)) {
                $orderId = $order['id'];
                $carts = $cartModel->getCart($id_taikhoan);
                // Dùng while để lấy tất cả sản phẩm từ giỏ hàng thay vì chỉ một dòng
                while ($item = mysqli_fetch_assoc($carts)) {
                    $data = [
                        'order_id' => $orderId,
                        'product_id' => $item['id_sanpham'],
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ];
                    $OrderProduct = $this->model('OrderProduct');
                    $result = $OrderProduct->insert($data);
                    // Trừ đi số lượng sản phẩm trong bảng products
                    $product = $cartModel->findProduct($item['id_sanpham']);
                    $quantity = $product['soluong'] - $item['quantity'];
                    $productUpdate = $cartModel->updateProduct($item['id_sanpham'], $quantity);
                    // Xoá giỏ hàng của người dùng sau khi đã đặt hàng thành công
                    // $deleteCart = $cartModel->delete($item['cart_id']);
                }
                $payment = new PaymentController();
                $payment->vnpay_payment($orderId, $name, $totalPrice, $payment_method);
            }
        }
    }

    public function checkoutSuccess($orderId)
    {
        // var_dump($_GET['vnp_SecureHash']);
        if (isset($_GET['vnp_SecureHash'])) {
            $vnp_Amount = $_GET['vnp_Amount'] ?? '';
            $vnp_BankCode = $_GET['vnp_BankCode'] ?? '';
            $vnp_BankTranNo = $_GET['vnp_BankTranNo'] ?? '';
            $vnp_CardType = $_GET['vnp_CardType'] ?? '';
            $vnp_OrderInfo = $_GET['vnp_OrderInfo'] ?? '';
            $vnp_PayDate = $_GET['vnp_PayDate'] ?? '';
            $vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? '';
            $vnp_TmnCode = $_GET['vnp_TmnCode'] ?? '';
            $vnp_TransactionNo = $_GET['vnp_TransactionNo'] ?? '';
            $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'] ?? '';
            $vnp_TxnRef = $_GET['vnp_TxnRef'] ?? '';
            $vnp_SecureHash = $_GET['vnp_SecureHash'] ?? '';

            $vnp_HashSecret = "XQ715JX17ERO040AQV9OLC23NW7DHKF1";

            $inputData = array();
            foreach ($_GET as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $inputData[$key] = $value;
                }
            }
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $i = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
            }
            $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

            if ($secureHash === $vnp_SecureHash) {
                if ($vnp_ResponseCode == '00') {
                    try {
                        $payment = $this->model('payment');
                        $updatePayment = $payment->update_payment_status($orderId);

                        $vnpay = $this->model('vn_payModel');
                        $insertVnpay = $vnpay->insert([
                            'vnp_Amount' => $vnp_Amount,
                            'vnp_BankCode' => $vnp_BankCode,
                            'vnp_BankTranNo' => $vnp_BankTranNo,
                            'vnp_CardType' => $vnp_CardType,
                            'vnp_OrderInfo' => $vnp_OrderInfo,
                            'vnp_PayDate' => $vnp_PayDate,
                            'vnp_TmnCode' => $vnp_TmnCode,
                            'vnp_TransactionNo' => $vnp_TransactionNo,
                            'vnp_TxnRef' => $vnp_TxnRef
                        ]);

                        if ($updatePayment && $insertVnpay) {
                            echo "Giao dịch thành công. Mã giao dịch: " . $vnp_TransactionNo;
                        } else {
                            echo "Đã xảy ra lỗi khi cập nhật đơn hàng hoặc chèn thông tin VNPay.";
                        }
                    } catch (Exception $e) {
                        echo "Lỗi xử lý giao dịch: " . $e->getMessage();
                    }
                } else {
                    echo "Giao dịch thất bại. Mã lỗi: " . $vnp_ResponseCode;
                }
            } else {
                echo "Giao dịch không hợp lệ.";
            }
        } else {
            //echo "Không có tham số hợp lệ từ VNPay.";
        }

        $this->view("Customer/success", [
            "orderId" => $orderId,
        ]);
    }
    function getTotalPrice($cartModel, $id_taikhoan)
    {
        $carts = $cartModel->getCart($id_taikhoan);
        $total = 0;
        foreach ($carts as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    private function calculateSubTotalPrice($orderId)
    {
        $orderProductModel = $this->model('orderProduct');  // Đảm bảo bạn đã khởi tạo đúng mô hình
        $orderProducts = $orderProductModel->getOrderProduct($orderId);

        $total = 0;
        if ($orderProducts) {
            foreach ($orderProducts as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return $total;
    }

    function orderDetail($orderId)
    {
        $orderModel = $this->model('orders');
        $orderProductModel = $this->model('orderProduct');
        $paymentModel = $this->model('payment');


        $orders = $orderModel->getOrderById($orderId);
        $orderProducts = $orderProductModel->getOrderProduct($orderId);
        $totalPrice = $this->calculateSubTotalPrice($orderId);
        $payment = $paymentModel->getPayment($orderId);
        // var_dump($payment);
        // die();
        $this->view("Customer/orderDetail", [
            "orders" => $orders,
            "orderProducts" => $orderProducts,
            "totalPrice" => $totalPrice,
            "payment" => $payment,
        ]);
    }
    public function cancelOrder($order_id)
    {
        $orderModel = $this->model('orders');
        $cancelOrder = $orderModel->cancel($order_id);
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: /');
        }
        exit;
    }

    public function thongketien()
    {
        $orderModel = $this->model('orders');
        $sales_data = $orderModel->thongke();
        header('Content-Type: application/json');
        echo json_encode($sales_data);
        // var_dump($sales_data);
        // exit();
    }
    function viewThongKe()
    {
        $this->view('Admin/ThongKe');
    }

    public function thongketienngay()
    {
        $orderModel = $this->model('orders');

        // Nhận dữ liệu startDate và endDate từ query string
        $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
        $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

        // Kiểm tra xem ngày có hợp lệ không
        if ($startDate && $endDate) {
            $sales_data = $orderModel->thongkengay($startDate, $endDate); // Truyền ngày vào
            $x = $sales_data;
        } else {
            $sales_data = [];
        }

        header('Content-Type: application/json');
        echo json_encode($sales_data);
    }
    public function viewthongkeSP()
    {
        $this->view('Admin/ThongKeSanPham');
    }
    public function thongkeSP()
    {
        $orderModel = $this->model('orders');

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : null;

        if ($limit) {
            $thongkeSP = $orderModel->getTopProducts($limit);
        } else {
            $thongkeSP = [];
        }

        header('Content-Type: application/json');
        echo json_encode($thongkeSP);
    }
}
