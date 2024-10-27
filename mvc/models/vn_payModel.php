<?php
class vn_payModel extends DB
{
    public function insert($data)
    {
        // Lấy dữ liệu từ $data với giá trị mặc định
        $vnp_Amount = (float) ($data['vnp_Amount'] ?? 0.0); // float
        $vnp_BankCode = $data['vnp_BankCode'] ?? '';    // string
        $vnp_BankTranNo = $data['vnp_BankTranNo'] ?? ''; // string
        $vnp_CardType = $data['vnp_CardType'] ?? '';    // string
        $vnp_OrderInfo = $data['vnp_OrderInfo'] ?? '';  // string
        $vnp_PayDate = $data['vnp_PayDate'] ?? '';      // string (có thể cần convert thành dạng hợp lệ)
        $vnp_TmnCode = $data['vnp_TmnCode'] ?? '';      // string
        $vnp_TransactionNo = $data['vnp_TransactionNo'] ?? ''; // string
        $code_cart = (int) ($data['vnp_TxnRef'] ?? 0);  // Mã đơn hàng (int)

        // Câu lệnh SQL
        $sql = "INSERT INTO tbl_vnpay (vnp_amount, vnp_bankCode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_transactionno, code_cart) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Chuẩn bị truy vấn
        $stmt = $this->con->prepare($sql);

        // Bind các tham số với kiểu dữ liệu tương ứng
        // vnp_Amount là float (d), các cột khác là string (s), và code_cart là int (i)
        $stmt->bind_param('dssssssss', $vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_TransactionNo, $code_cart);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Lỗi: " . $stmt->error;
            return false;
        }
    }
}
