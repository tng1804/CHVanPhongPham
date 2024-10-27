<?php
class WarehouseModel extends DB{
    public function listWarehouse()
    {
        $sql = "SELECT * FROM tblkho";
        return $result = mysqli_query($this->con, $sql);
    }
    public function addWarehouse() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['btnsubmit'])) {              
            $id_sanpham = $_POST['id_sanpham'];
            $tensp = $_POST['tensp'];
            $soluongnhap = $_POST['soluongnhap'];
            $gianhap = $_POST['gianhap'];
            $ngaynhap = $_POST['ngaynhap'];
    
            if (empty($id_sanpham) || empty($tensp) || empty($soluongnhap) || empty($gianhap) || empty($ngaynhap)) {
                echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');</script>";
                return;
            } else {
                // Kiểm tra nếu sản phẩm đã tồn tại trong bảng tblsanpham
                $check_sql = "SELECT soluong FROM tblsanpham WHERE id_sanpham = '$id_sanpham'";
                $check_result = mysqli_query($this->con, $check_sql);
    
                if (mysqli_num_rows($check_result) > 0) {
                    // Nếu sản phẩm đã tồn tại, cập nhật tổng số lượng trong tblsanpham
                    $row = mysqli_fetch_assoc($check_result);
                    $new_total_quantity = $row['soluong'] + $soluongnhap;
    
                    $update_sql = "UPDATE tblsanpham SET soluong = '$new_total_quantity' WHERE id_sanpham = '$id_sanpham'";
                    $update_result = mysqli_query($this->con, $update_sql);
    
                    if (!$update_result) {
                        echo "<script type='text/javascript'>alert('Cập nhật tổng số lượng sản phẩm thất bại');</script>";
                        return;
                    }
                } else {
                    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào tblsanpham
                    $sql_add_sanpham = "INSERT INTO tblsanpham (id_sanpham, tensp, soluong) 
                                        VALUES ('$id_sanpham', '$tensp', '$soluongnhap')";
                    $result_sanpham = mysqli_query($this->con, $sql_add_sanpham);
    
                    if (!$result_sanpham) {
                        echo "<script type='text/javascript'>alert('Thêm sản phẩm vào bảng sản phẩm thất bại');</script>";
                        return;
                    }
                }
    
                // Thêm chi tiết nhập hàng mới vào tblkho
                $sql_add_kho = "INSERT INTO tblkho (idnhaphang, id_sanpham, tensp, soluongnhap, gianhap, ngaynhap) 
                                VALUES ('', '$id_sanpham','$tensp', '$soluongnhap', '$gianhap', '$ngaynhap')";
                $result_kho = mysqli_query($this->con, $sql_add_kho);
    
                if (!$result_kho) {
                    echo "<script type='text/javascript'>alert('Thêm sản phẩm vào kho thất bại');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Thêm sản phẩm vào kho thành công');
                          window.history.pushState(null, '', '/CHVanPhongPham/Warehouse/Show');
                          window.location.href = '/CHVanPhongPham/Warehouse/Show';
                          </script>";
                }
            }
        }
    }
    
    
    
     public function showEdit($idnhaphang){
        $sql = "SELECT * FROM tblkho WHERE idnhaphang = '" .$idnhaphang. "'";
        return $result = mysqli_query($this->con,$sql);
    }
    public function editWarehouse($idnhaphang) {       
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST["btnsubmit"])) {
            $id_sanpham = $_POST['id_sanpham'];
            $soluongnhap = $_POST['soluongnhap'];
            $gianhap = $_POST['gianhap'];
            $ngaynhap = $_POST['ngaynhap'];
            $tensp = $_POST['tensp'];
            
            // Cập nhật thông tin trong bảng tblkho
            $sql = "UPDATE tblkho SET
                     id_sanpham = '$id_sanpham',
                     soluongnhap = '$soluongnhap',
                     gianhap = '$gianhap',
                     ngaynhap = '$ngaynhap',
                     tensp = '$tensp'
                     WHERE idnhaphang = '$idnhaphang'";
            $result = mysqli_query($this->con, $sql);
    
            if (!$result) {
                echo "Update error: " . mysqli_error($this->con);
                return;
            } else {
                echo "<script> 
                        alert('Sửa kho thành công');
                        window.history.pushState(null, '', '/CHVanPhongPham/Warehouse/Show');
                        window.location.href = '/CHVanPhongPham/Warehouse/Show';
                      </script>";
            }
    
            // Lấy số lượng hiện tại từ bảng tblsanpham
            $sql_get_soluong = "SELECT soluong FROM tblsanpham WHERE id_sanpham = '$id_sanpham'";
            $result_get_soluong = mysqli_query($this->con, $sql_get_soluong);
            
            if ($row = mysqli_fetch_assoc($result_get_soluong)) {
                $current_soluong = $row['soluong'];
                
                // Xác định số lượng mới dựa trên điều kiện
                if ($soluongnhap < $current_soluong) {
                    $new_soluong = $current_soluong - $soluongnhap; // Trừ đi nếu ít hơn
                } else {
                    $new_soluong = $current_soluong + $soluongnhap; // Cộng vào nếu nhiều hơn
                }
    
                // Cập nhật số lượng trong bảng tblsanpham
                $sql2 = "UPDATE tblsanpham SET soluong = '$new_soluong' WHERE id_sanpham = '$id_sanpham'";
                $result2 = mysqli_query($this->con, $sql2);
    
                if (!$result2) {
                    echo "Update sản phẩm error: " . mysqli_error($this->con);
                } else {
                    echo "<script> 
                            alert('Cập nhật số lượng sản phẩm thành công');
                          </script>";
                }
            }
        }
    }
    
    
    public function deleteWH($idnhaphang) {
        // Lấy id_sanpham và soluongnhap từ bản ghi cần xóa trong bảng tblkho
        $sql_get_kho = "SELECT id_sanpham, soluongnhap FROM tblkho WHERE idnhaphang = '$idnhaphang'";
        $result_get_kho = mysqli_query($this->con, $sql_get_kho);
    
        if ($row = mysqli_fetch_assoc($result_get_kho)) {
            $id_sanpham = $row['id_sanpham'];
            $soluongnhap_kho = $row['soluongnhap'];
    
            // Lấy số lượng hiện tại của sản phẩm trong bảng tblsanpham
            $sql_get_sanpham = "SELECT soluong FROM tblsanpham WHERE id_sanpham = '$id_sanpham'";
            $result_get_sanpham = mysqli_query($this->con, $sql_get_sanpham);
    
            if ($row_sanpham = mysqli_fetch_assoc($result_get_sanpham)) {
                $current_soluong = $row_sanpham['soluong'];
    
                // Trừ số lượng từ kho khỏi số lượng hiện tại của sản phẩm
                $new_soluong = $current_soluong - $soluongnhap_kho;
                if ($new_soluong < 0) $new_soluong = 0; // Đảm bảo số lượng không bị âm
    
                // Cập nhật số lượng mới vào bảng tblsanpham
                $sql_update_sanpham = "UPDATE tblsanpham SET soluong = '$new_soluong' WHERE id_sanpham = '$id_sanpham'";
                $result_update_sanpham = mysqli_query($this->con, $sql_update_sanpham);
    
                if (!$result_update_sanpham) {
                    echo "Update error in tblsanpham: " . mysqli_error($this->con);
                    return;
                }
            }
        }
    
        // Sau khi cập nhật số lượng sản phẩm, xóa bản ghi trong bảng tblkho
        $sql_delete_kho = "DELETE FROM tblkho WHERE idnhaphang = '$idnhaphang'";
        $result_delete_kho = mysqli_query($this->con, $sql_delete_kho);
    
        if (!$result_delete_kho) {
            echo "Delete error: " . mysqli_error($this->con);
        } else {
            echo "<script type='text/javascript'>
                    alert('Xóa sản phẩm trong kho thành công');
                    window.history.pushState(null, '', '/CHVanPhongPham/Warehouse/Show');
                    window.location.href = '/CHVanPhongPham/Warehouse/Show';
                  </script>";
        }
    }
    
    public function SortWH()
    {
        $qr = "SELECT * FROM tblkho ORDER BY ngaynhap ASC";
        return mysqli_query($this->con, $qr);
    }
    public function searchWH(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="idnhaphang")
    {
        $sql = "SELECT * FROM tblkho WHERE idnhaphang LIKE '%$tk%' ORDER BY idnhaphang";
    }
    else{
        $sql = "SELECT * FROM tblkho WHERE ngaynhap  LIKE '%$tk%' ORDER BY ngaynhap";
    }
     return $result = mysqli_query($this->con,$sql);
    }   
    }
}
?>