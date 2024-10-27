<?php
class OrderProduct extends DB
{
    public function insert($data)
    {
        // Chuẩn bị câu lệnh SQL để chèn
        $sql = "INSERT INTO `tbl_order_products`(`order_id`, `product_id`, `quantity`, `price`) 
        VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iiid", $data['order_id'], $data['product_id'], $data['quantity'], $data['price']);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }



    // Hàm để lấy đối tượng theo ID
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM `tbl_order_products` WHERE order_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Trả về toàn bộ kết quả dưới dạng mảng kết hợp
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }
    function getOrderProduct($orderId)
    {
        $sql = "SELECT orderProduct.order_id, orderProduct.product_id, orderProduct.quantity, orderProduct.price, SP.tensp, SP.anhsp  
        FROM tbl_order_products as orderProduct JOIN tblsanpham as SP on orderProduct.product_id = SP.id_sanpham where orderProduct.order_id = ?;";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Trả về toàn bộ kết quả dưới dạng mảng kết hợp
            $orderProduct = $result->fetch_all(MYSQLI_ASSOC);
            return $orderProduct;
        } else {
            return null;
        }
    }
    public function getGroupOrder()
    {
        $sql = "SELECT order_id, SUM(quantity) AS total_quantity, SUM(quantity * price) AS total_price 
        FROM  tbl_order_products
        GROUP BY order_id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Trả về toàn bộ kết quả dưới dạng mảng kết hợp
            $orderProduct = $result->fetch_all(MYSQLI_ASSOC);
            return $orderProduct;
        } else {
            return null;
        }
    }
}
