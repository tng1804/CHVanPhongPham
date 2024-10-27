<?php
class CartModel extends DB
{
    public function sumProduct($id_taikhoan)
    {
        $sql = "SELECT COUNT(id_sanpham) AS product_types_count 
        FROM tbl_cart 
        WHERE id_taikhoan = $id_taikhoan 
        GROUP BY id_taikhoan;";

        $result = mysqli_query($this->con, $sql);

        $product_count = 0;
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $product_count = $row['product_types_count'];
        }
        return $product_count;
    }
    public function insert($data)
    {
        $sql = "INSERT INTO `tbl_cart`(`cart_id`, `id_taikhoan`, `id_sanpham`, `price`, `quantity`)
         VALUES ('','" . $data['id_taikhoan'] . "','" . $data['id_sanpham'] . "','" . $data['price'] . "','" . $data['quantity'] . "')";

        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function getCart($id_taikhoan)
    {
        $sql = "SELECT Cart.cart_id, Cart.id_taikhoan, Cart.id_sanpham, Cart.price, Cart.quantity,SP.tensp, SP.anhsp 
        FROM tbl_cart as Cart INNER JOIN tblsanpham as SP ON Cart.id_sanpham = SP.id_sanpham 
        WHERE id_taikhoan = '" . $id_taikhoan . "' ORDER BY cart_id DESC;";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function delete($idCart = null)
    {
        if ($idCart == null) {
            $sql = "DELETE FROM `tbl_cart`";
            $stmt = $this->con->prepare($sql);
        } else {
            $sql = "DELETE FROM `tbl_cart` WHERE cart_id = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $idCart);
        }

        // Thực thi truy vấn
        return $stmt->execute();
    }
    function updateQuantity($cart_id, $quantity)
    {
        $sql = "UPDATE tbl_cart SET quantity = ? WHERE cart_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ii", $quantity, $cart_id);
        return $stmt->execute();
    }
    public function getCartById($cart_id)
    {
        $sql = "SELECT * FROM tbl_cart WHERE cart_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $cart_id);

        // Thực thi truy vấn
        $stmt->execute();

        // Lấy kết quả truy vấn
        $result = $stmt->get_result();

        // Kiểm tra nếu có dữ liệu trả về
        if ($result->num_rows > 0) {
            // Trả về kết quả dưới dạng mảng kết hợp
            return $result->fetch_assoc();
        } else {
            // Không có dữ liệu
            return null;
        }
    }
    public function findProduct($id_sanpham)
    {
        $sql = "SELECT * FROM `tblsanpham` WHERE `id_sanpham` = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id_sanpham);

        // Thực thi truy vấn
        $stmt->execute();

        // Lấy kết quả truy vấn
        $result = $stmt->get_result();

        // Kiểm tra nếu có dữ liệu trả về
        if ($result->num_rows > 0) {
            // Trả về kết quả dưới dạng mảng kết hợp
            return $result->fetch_assoc();
        } else {
            // Không có dữ liệu
            return null;
        }
    }

    public function updateProduct($id_sanpham, $quantity)
    {
        $sql = "UPDATE `tblsanpham` SET `soluong` = ? WHERE `id_sanpham` = ?";
        $stmt = $this->con->prepare($sql);

        // Sử dụng "ii" nếu cả $quantity và $id_sanpham là số nguyên
        $stmt->bind_param("ii", $quantity, $id_sanpham);

        // Thực thi câu lệnh
        $result = $stmt->execute();

        return $result;
    }
}
