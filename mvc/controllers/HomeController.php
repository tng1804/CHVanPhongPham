<?php
class HomeController extends Controller
{
    function SayHi()
    {
        $this->login();
    }
    function viewCart()
    {
        $cartModel = $this->model("CartModel");
        $id_taikhoan = $_SESSION['id_User'];
        // $result = $cartModel->getCart($id_taikhoan);
        // $carts = mysqli_fetch_assoc($result);
        $this->view("Customer/Cart", [
            "carts" => $cartModel->getCart($id_taikhoan),
        ]);
    }
    function deleteCart($idCart)
    {
        $_SESSION['message'] = '';
        $cartModel = $this->model("CartModel");
        $result = $cartModel->delete($idCart);
        if ($result) {
            $_SESSION['message'] = "Bạn đã xóa sản phẩm khỏi giỏ hàng";
        } else {
            $_SESSION['message'] = "error";
        }
        header("Location: http://localhost/CHVanPhongPham/HomeController/viewCart");
        exit;
    }
    function updateCart()
    {
        $cartModel = $this->model("CartModel");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cart_id = $_POST['cart_id'];
            $quantity = $_POST['quantity'];

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $result = $cartModel->updateQuantity($cart_id, $quantity);

            if ($result) {
                // Lấy lại chi tiết giỏ hàng sau khi cập nhật
                $cart = $cartModel->getCartById($cart_id);
                $subtotal = $cart['price'] * $cart['quantity'];

                // Tính tổng tiền giỏ hàng
                $id_taikhoan = $_SESSION['id_User'];
                $carts = $cartModel->getCart($id_taikhoan);
                $total = 0;
                foreach ($carts as $item) {
                    $total += $item['price'] * $item['quantity'];
                }

                // Trả về kết quả JSON
                echo json_encode([
                    'success' => true,
                    'subtotal' => $subtotal,
                    'total' => $total
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => "Đã có lỗi xảy ra khi cập nhật."]);
            }
        }
    }
    public function deleteAllCart()
    {
        echo "";
        $_SESSION['message'] = '';
        $cartModel = $this->model("CartModel");
        $result = $cartModel->delete();
        if ($result) {
            $_SESSION['message'] = "Bạn đã xóa tất cả sản phẩm khỏi giỏ hàng";
        } else {
            $_SESSION['message'] = "error";
        }
        header("Location: http://localhost/CHVanPhongPham/HomeController/viewCart");
        exit;
    }

    function login()
    {
        $account_model = $this->model("AccountModel");
        $this->view("Customer/login", [
            "TK" => $account_model->login()
        ]);
    }
    public function logout()
    {
        session_unset();
        unset($_SESSION['ten_User']);
        // Destroy the session
        session_destroy();

        // Redirect to the login view
        $this->view('login');
    }
    function myOrders()
    {
        $orderModel = $this->model('Orders');
        $OrderProductModel = $this->model('OrderProduct');
        $id_taikhoan = $_SESSION['id_User'];

        $orders = $orderModel->getOrdersById($id_taikhoan);
        $orderProducts = $OrderProductModel->getGroupOrder();
        // var_dump($orders);
        // exit;
        $this->view('Customer/myOrders', [
            'orders' => $orders,
            'orderProducts' => $orderProducts,
        ]);
    }

    
    
}
