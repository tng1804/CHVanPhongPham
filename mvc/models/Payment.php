<?php
class Payment extends DB
{
    public function insert_payment($id_order, $id_taikhoan, $deliver_method, $method_payment, $today)
    {
        $sql = "INSERT INTO `tbl_payment`(`id_order`, `id_taikhoan`, `giaohang`, `thanhtoan`, `order_date`, `status`) 
                    VALUES (?, ?, ?, ?, ?, '0')";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('iisss', $id_order, $id_taikhoan, $deliver_method, $method_payment, $today);
        $result = $stmt->execute();

        return $result;
    }

    public function update_payment_status($orderId)
    {
        $query = "UPDATE tbl_payment SET status = '1' WHERE id_order = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $orderId);
        return $stmt->execute();
    }
    public function getPayment($orderId)
    {
        $query = "SELECT * FROM `tbl_payment` WHERE id_order = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Trả về mảng kết hợp của đối tượng
        } else {
            return null;
        }
    }
}
