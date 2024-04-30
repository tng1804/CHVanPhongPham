<?php
class KhachHangModel extends DB
{
    public function ListKH()
    {
        $qr = "SELECT * FROM tblkhachhang";
        return mysqli_query($this->con, $qr);
    }
    public function SortKH()
    {
        $qr = "SELECT * FROM tblkhachhang ORDER BY ten ASC";
        return mysqli_query($this->con, $qr);
    }
    public function AddKH()
    {
        // and isset($_POST['btnGhi'])
        if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['btnGhi'])) {
            // $id_taikhoan = $_POST['id_taikhoan'];
            $tenKH = $_POST['tenKH'];
            $diaChi = $_POST['diaChi'];
            $sDT = $_POST['sDT'];
            $email = $_POST['email'];
            $sql = "INSERT INTO tblkhachhang VALUES ('','','" . $tenKH . "','" . $diaChi . "','" . $sDT . "','" . $email . "')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else {
                $sql2 = "INSERT INTO tbltk VALUES ('','" . $tenKH . "','".$email."','1','" . $sDT . "','1','" . $diaChi . "')";
                $result2 = mysqli_query($this->con, $sql2);

                $sql3 = "SELECT * FROM tbltk WHERE email='" . $email . "'";
                $result3 = mysqli_query($this->con, $sql3);
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $id_taikhoan = $row3['id_taikhoan'];
                    $sql2 = "UPDATE tblkhachhang SET id_taikhoan = '" . $id_taikhoan . "' WHERE email = '" . $email . "'";
                    $rs2 = mysqli_query($this->con, $sql2);
                }
                

                echo "<script type='text/javascript'>alert('Thêm thành công')
                // window.location.href = '/VANPHONGPHAM/KhachHang/listKH';
                </script>";
                return $result;
            }
            
        }
    }
    public function Get_KH($id_khachhang)
    {
        $sql = "SELECT * FROM tblkhachhang WHERE id_khachhang='" . $id_khachhang . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function UpdateKH($id_khachhang)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
            $ten = $_POST['txt_ten'];
            $diachi =  $_POST['txt_diachi'];
            $sdt =  $_POST['txt_sdt'];
            $email =  $_POST['txt_email'];

            $sql = "UPDATE tblkhachhang SET ten='" . $ten . "',diachi='" . $diachi . "',sdt='" . $sdt . "',email='" . $email . "'
            WHERE id_khachhang='" . $id_khachhang . "'";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo "Cập nhập dữ liệu không thành công.";
            } else {
                echo "Cập nhập dữ liệu thành công.";
                // Thông báo thành công
                echo "<script>
                alert('Cập nhật dữ liệu thành công');
                window.location.href = '/VANPHONGPHAM/KhachHang/listKH';
                </script>";
            }
        }
    }

    public function DeleteKH($id_khachhang)
    {
        $sql = "DELETE FROM tblkhachhang WHERE id_khachhang = '" . $id_khachhang . "'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo "Delete error" . mysqli_error($this->con);
        } else {
            echo "<script type = 'text/javascript'>alert('Xóa khách hàng thành công');
            window.location.href = '/VANPHONGPHAM/KhachHang/listKH';
            </script>";
        }

        return $result;
    }
    public function SearchKH()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
            $tk = $_POST['txttimkiem'];
            $lc = $_POST['txtlc'];
            if ($lc == "tenKH") {
                $sql = "SELECT * FROM tblkhachhang WHERE ten LIKE '%$tk%' ORDER BY ten";
            } else {
                $sql = "SELECT * FROM tblkhachhang WHERE id_khachhang  LIKE '%$tk%' ORDER BY id_khachhang";
            }

            $result = mysqli_query($this->con, $sql);
            return $result;
        }
    }
    public function POST_KH_API()
    {
        // $sql = "INSERT INTO tblkhachhang VALUES ('','','" . $ten . "','" . $diaChi . "','" . $sDT . "','" . $email . "')";
        // $result = mysqli_query($this->con, $sql);
        // return $result;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tenKH = $_POST['tenKH'];
            $diaChi = $_POST['diaChi'];
            $sDT = $_POST['sDT'];
            $email = $_POST['email'];
            $sql = "INSERT INTO tblkhachhang VALUES ('','','" . $tenKH . "','" . $diaChi . "','" . $sDT . "','" . $email . "')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else {
                $sql2 = "INSERT INTO tbltk VALUES ('','" . $tenKH . "','".$email."','1','" . $sDT . "','1','" . $diaChi . "')";
                $result2 = mysqli_query($this->con, $sql2);

                $sql3 = "SELECT * FROM tbltk WHERE email='" . $email . "'";
                $result3 = mysqli_query($this->con, $sql3);
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $id_taikhoan = $row3['id_taikhoan'];
                    $sql2 = "UPDATE tblkhachhang SET id_taikhoan = '" . $id_taikhoan . "' WHERE email = '" . $email . "'";
                    $rs2 = mysqli_query($this->con, $sql2);
                }
                return $result;
            }
            
        }
    }

    public function PUT_KH_API($id_khachhang, $ten, $diachi, $sdt, $email)
    {
        $sql = "UPDATE tblkhachhang SET ten='" . $ten . "',diachi='" . $diachi . "',sdt='" . $sdt . "',email='" . $email . "'
            WHERE id_khachhang='" . $id_khachhang . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function DELETE_KH_API($id_khachhang)
    {
        $sql = "DELETE FROM tblkhachhang WHERE id_khachhang = '" . $id_khachhang . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
}
