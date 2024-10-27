<?php
require_once("./mvc/core/config_vnpay.php");
class PaymentController extends Controller
{
    public function vnpay_payment($orderId, $name, $totalPrice, $method_payment)
    {
        $vnp_Returnurl = "http://localhost/CHVanPhongPham/CheckoutController/checkoutSuccess/" . $orderId;

        $id_taikhoan = $_SESSION['id_User'];
        $session_id = session_id();
        $today = date("Y-m-d");
        $deliver_method = $_POST['deliver-method'];
        $code_oder = substr($session_id, 0, 8);
        $payment = $this->model('Payment');
        if ($method_payment == 'cod') {
            $insert_payment = $payment->insert_payment($orderId, $id_taikhoan, $deliver_method, $method_payment, $today);
        } elseif ($method_payment == 'vnpay') {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_TmnCode = "10PDMKDB"; //Mã website tại VNPAY 
            $vnp_HashSecret = "XQ715JX17ERO040AQV9OLC23NW7DHKF1"; //Chuỗi bí mật

            $vnp_TxnRef = $orderId; // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Tran Van Ngoc";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $totalPrice * 100;
            $vnp_Locale = 'VN';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];  // Lấy địa chỉ IP của người dùng

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

            error_log("Start Time: $startTime, Expire Time: $expire"); // Ghi log để kiểm tra

            $inputData['vnp_CreateDate'] = $startTime;
            $inputData['vnp_ExpireDate'] = $expire;

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }


            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            if (isset($_POST['payment'])) {
                $insert_payment = $payment->insert_payment($orderId, $id_taikhoan, $deliver_method, $method_payment, $today);
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
        header('Location: ' . $vnp_Returnurl);
        exit;
    }

}
