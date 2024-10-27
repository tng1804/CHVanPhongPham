<?php
class Orders extends DB
{
    public function insert($user_id, $name, $email, $phone, $status, $address, $totalPrice, $payment_method)
    {
        // Chuẩn bị câu lệnh SQL để chèn
        $sql = "INSERT INTO `tbl_orders`(`user_id`, `name`, `email`, `phone`, `address`, `status`, `total_price`, `payment_method`, `created_at`, `updated_at`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("isssssds", $user_id, $name, $email, $phone, $address, $status, $totalPrice, $payment_method);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            // Lấy ID của đối tượng vừa chèn
            $last_id = $this->con->insert_id;

            // Truy vấn lại đối tượng vừa chèn
            $result = $this->getOrderById($last_id);
            return $result;
        } else {
            return false; // Hoặc bạn có thể trả về thông báo lỗi
        }
    }


    // Hàm để lấy đối tượng theo ID lấy ra 1 đối tượng
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM `tbl_orders` WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Trả về mảng kết hợp của đối tượng
        } else {
            return null;
        }
    }

    // Hàm để lấy đối tượng theo ID lấy ra nhiều đối tượng
    public function getOrdersById($id)
    {
        $sql = "SELECT * FROM `tbl_orders` WHERE user_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về mảng kết hợp của đối tượng
        } else {
            return null;
        }
    }

    public function cancel($orderId)
    {
        $query = "UPDATE tbl_orders SET status = '6' WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $orderId);
        return $stmt->execute();
    }

    public function thongke()
    {
        // Truy vấn dữ liệu theo tháng
        $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, SUM(total_price) AS total_sales 
        FROM tbl_orders 
        WHERE status = '5'
        GROUP BY month 
        ORDER BY month";

        $result = $this->con->query($sql);

        $sales_data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sales_data[] = [
                    "date" => $row['month'],
                    "units" => $row['total_sales']
                ];
            }
            return $sales_data;
        } else {
            return [];
        }
    }

    public function thongkengay($startDate, $endDate)
    {
        $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, SUM(total_price) AS total_sales 
            FROM tbl_orders 
            WHERE status = '5' 
            AND created_at BETWEEN ? AND ? 
            GROUP BY month 
            ORDER BY month";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();

        $sales_data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sales_data[] = [
                    "date" => $row['month'],
                    "units" => $row['total_sales']
                ];
            }
        }

        return $sales_data;
    }
    public function getTopProducts($limit)
    {
        $sql = "SELECT p.tensp, SUM(op.quantity) as total_quantity 
        FROM tblsanpham p JOIN tbl_order_products op ON p.id_sanpham = op.product_id 
        GROUP BY p.id_sanpham ORDER BY total_quantity DESC LIMIT ?";

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'label' => $row['tensp'],
                'y' => (int) $row['total_quantity']
            ];
        }
        return $data; 
    }
}
