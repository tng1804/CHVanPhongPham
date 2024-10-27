<?php
class KhuyenMaiModel extends DB
{
    public function listKM()
    {
        $sql = "SELECT * FROM tbl_khuyenmai";
        return $result = mysqli_query($this->con, $sql);
    }
    public function getTenDM()
    {
        $sql = "SELECT id_danhmuc,ten_danhmuc FROM tbl_danhmuc";
        return $result = mysqli_query($this->con, $sql);
    }
    public function addKM()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['btnsubmit'])) {
            // Khai báo biến lỗi
            $errors = [];

            $tenKM = $_POST['tenKM'] ?? null; // Tên chương trình khuyến mãi
            $moTa = $_POST['moTa'] ?? null; // Miêu tả
            $ngayTao = $_POST['ngayTao'] ?? null; // Thời gian bắt đầu
            $ngayKetThuc = isset($_POST['ngayKetThuc']) ? $_POST['ngayKetThuc'] : null; // Thời gian kết thúc
            $loaiKM = $_POST['loaiKM'] ?? null; // Loại khuyến mãi
            $dieuKien = $_POST['dieuKien'] ?? null; // Điều kiện tối thiểu
            $mucGiam = $_POST['mucGiam'] ?? null; // Mức giảm
            $danhMucID = $_POST['danhMucID'] ?? null; // ID danh mục sản phẩm

            // Kiểm tra các trường bắt buộc
            if (empty($tenKM)) {
                $errors[] = "Tên chương trình khuyến mãi là bắt buộc.";
            }
            if (empty($ngayTao)) {
                $errors[] = "Thời gian bắt đầu là bắt buộc.";
            }
            if (empty($loaiKM)) {
                $errors[] = "Loại khuyến mãi là bắt buộc.";
            }
            if (empty($mucGiam)) {
                $errors[] = "Mức giảm là bắt buộc.";
            }

            // Thiết lập ngày kết thúc là null nếu không được nhập
            if (empty($ngayKetThuc)) {
                $ngayKetThuc = '9999-12-31';
            }

            // Nếu có lỗi, hiển thị thông báo lỗi
            if (!empty($errors)) {
                echo "<script type='text/javascript'>alert('" . implode("\\n", $errors) . "');</script>";
            } else {
                // Thực hiện truy vấn SQL nếu không có lỗi
                $sql = "INSERT INTO tbl_khuyenmai (tenKM, moTa, ngayTao, ngayKetThuc, loaiKM, dieuKien, mucGiam, danhMucID) 
                VALUES ('$tenKM', '$moTa', '$ngayTao', '$ngayKetThuc', '$loaiKM', '$dieuKien', '$mucGiam', '$danhMucID')";

                $result = mysqli_query($this->con, $sql);

                if ($result) {
                    echo "<script type='text/javascript'>alert('Thêm chương trình Khuyến Mãi thành công');</script>";
                    echo "<script>window.location.href = '/CHVanPhongPham/KhuyenMai/Show';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Vui lòng kiểm tra lại thông tin nhập');</script>";
                }
            }
        }
    }

    public function showEdit($id_KM)
    {
        $sql = "SELECT * FROM tbl_khuyenmai WHERE ID = '" . $id_KM . "'";
        return $result = mysqli_query($this->con, $sql);
    }


    public function editKM($id_KM)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['btnsubmit'])) {
            // Khai báo biến lỗi
            $errors = [];

            $tenKM = $_POST['tenKM'] ?? null; // Tên chương trình khuyến mãi
            $moTa = $_POST['moTa'] ?? null; // Miêu tả
            $ngayTao = $_POST['ngayTao'] ?? null; // Thời gian bắt đầu
            $ngayKetThuc = isset($_POST['ngayKetThuc']) ? $_POST['ngayKetThuc'] : null; // Thời gian kết thúc
            $loaiKM = $_POST['loaiKM'] ?? null; // Loại khuyến mãi
            $dieuKien = $_POST['dieuKien'] ?? null; // Điều kiện tối thiểu
            $mucGiam = $_POST['mucGiam'] ?? null; // Mức giảm
            $danhMucID = $_POST['danhMucID'] ?? null; // ID danh mục sản phẩm

            if (empty($tenKM)) {
                $errors[] = "Tên chương trình khuyến mãi là bắt buộc.";
            }
            if (empty($ngayTao)) {
                $errors[] = "Thời gian bắt đầu là bắt buộc.";
            }
            if (empty($loaiKM)) {
                $errors[] = "Loại khuyến mãi là bắt buộc.";
            }
            if (empty($mucGiam)) {
                $errors[] = "Mức giảm là bắt buộc.";
            }

            // Thiết lập ngày kết thúc là '9999-12-31' nếu không được nhập
            if (empty($ngayKetThuc)) {
                $ngayKetThuc = '9999-12-31';
            }

            // Nếu có lỗi, hiển thị thông báo lỗi
            if (!empty($errors)) {
                echo "<script type='text/javascript'>alert('" . implode("\\n", $errors) . "');</script>";
            } else {
                // Thực hiện truy vấn SQL để cập nhật nếu không có lỗi
                $sql = "UPDATE tbl_khuyenmai SET 
                        tenKM = '$tenKM', 
                        moTa = '$moTa', 
                        ngayTao = '$ngayTao', 
                        ngayKetThuc = '$ngayKetThuc', 
                        loaiKM = '$loaiKM', 
                        dieuKien = '$dieuKien', 
                        mucGiam = '$mucGiam', 
                        danhMucID = '$danhMucID' 
                        WHERE ID = $id_KM";

                $result = mysqli_query($this->con, $sql);

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cập nhật chương trình Khuyến Mãi thành công');</script>";
                    echo "<script>window.location.href = '/CHVanPhongPham/KhuyenMai/Show';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Vui lòng kiểm tra lại thông tin nhập');</script>";
                }
            }
        }
    }

    public function deleteKM($id_KM)
    {
        $sql = "DELETE FROM tbl_khuyenmai WHERE ID ='" . $id_KM . "'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo "Delete error" . mysqli_error($this->con);
        } else {
            echo "<script type = 'text/javascript'>alert('Xóa chương trình KM thành công');
                window.history.pushState(null, '', '/CHVanPhongPham/KhuyenMai/Show');
                window.location.href = '/CHVanPhongPham/KhuyenMai/Show';
                </script>";
        }
    }

    public function timKiemKM()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
            $tk = $_POST['txttimkiem'];
            $lc = $_POST['txtlc'];
            if ($lc == "tenKM") {
                $sql = "SELECT * FROM tbl_khuyenmai WHERE tenKM LIKE '%$tk%' ORDER BY tenKM";
            } else {
                $sql = "SELECT * FROM tbl_khuyenmai WHERE loaiKM  LIKE '%$tk%' ORDER BY loaiKM";
            }
            return $result = mysqli_query($this->con, $sql);
        }
    }

    public function loc()
    {
        // Lấy lựa chọn của người dùng
        $trangThaiLuaChon = $_POST['trangthai'] ?? 'all';

        // Tạo truy vấn SQL dựa trên trạng thái đã chọn
        $sql = "SELECT * FROM tbl_khuyenmai";
        if ($trangThaiLuaChon == 'active') {
            $sql .= " WHERE ngayKetThuc > NOW()";
        } elseif ($trangThaiLuaChon == 'expired') {
            $sql .= " WHERE ngayKetThuc <= NOW()";
        }

        // Lấy dữ liệu từ cơ sở dữ liệu
        $result = mysqli_query($this->con, $sql);

        // Kiểm tra xem truy vấn có thành công không
        if ($result) {
            return $result; // Trả về kết quả để sử dụng bên ngoài
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($this->con); // In lỗi nếu có
            return false; // Trả về false nếu có lỗi
        }
    }
}
