<?php
class TaiKhoanModel extends DB
{
    public function listTaiKhoan()
    {
        $sql = "SELECT * FROM tbltk";
        return $result = mysqli_query($this->con, $sql);
    }
    public function dangnhap()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-submit-dangnhap'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            if (empty($email) || empty($pass)) {
                echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                </script>";
                return;
            }
            $sql = "SELECT * FROM tbltk WHERE email='" . $email . "' AND pass ='" . $pass . "' and quyen = 0";
            $result = mysqli_query($this->con, $sql); //return $result;
            if (mysqli_num_rows($result) <= 0) {
                echo  "<script type = 'text/javascript'>alert('Đăng nhập THẤT BẠI');
                </script>";
            } else {
                include_once "./public/lib/session.php";
                $row = mysqli_fetch_assoc($result);
                //session_start();
                Session::set('registerlogin', true);
                Session::set('registername', $row['ten']);
                Session::set('registerauthority', $row['quyen']);
                echo  "<script type = 'text/javascript'>alert('Đăng nhập Thành công');
                window.location.href = '/CHVanPhongPham/Home/Show';
                </script>";
            }
        }
    }

    public function themTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnsubmit'])) {
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $quyentxt = $_POST['quyen'];
            $quyen = 0;

            // Xác định quyền
            if ($quyentxt == "Admin") {
                $quyen = 0;
            } else {
                $quyen = 1;
            }

            // Kiểm tra các trường thông tin có đầy đủ không
            if (empty($ten) || empty($email) || empty($pass) || empty($sdt) || empty($diachi) || $quyen === "") {
                echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');</script>";
                return;
            }

            // Kiểm tra mật khẩu có trùng với confirm-password không
            if ($pass != $_POST['confirm-password']) {
                echo "<script type='text/javascript'>alert('Vui lòng Nhập Trùng với CONFIRM-PASSWORD');</script>";
                return;
            }

            // Kiểm tra email đã tồn tại chưa
            $sql2 = "SELECT * FROM tbltk WHERE email ='" . $email . "'";
            $result2 = mysqli_query($this->con, $sql2);

            if (mysqli_num_rows($result2) <= 0) {
                // Thực hiện thêm tài khoản
                $sql = "INSERT INTO tbltk (ten, email, pass, sdt, diachi, quyen) VALUES('" . $ten . "','" . $email . "','" . $pass . "','" . $sdt . "','" . $diachi . "','" . $quyen . "')";
                $result = mysqli_query($this->con, $sql);

                if (!$result) {
                    echo "Không thêm thành công";
                } else {
                    // Kiểm tra nếu là khách hàng
                    if ($quyen == 1) {
                        echo  "<script>
                            alert('Đăng ký khách hàng thành công');
                            window.location.href = '/CHVanPhongPham/Home/SayHi';
                        </script>";
                    } else {
                        echo  "<script>
                            alert('Thêm tài khoản Admin thành công');
                            window.history.pushState(null, '', '/CHVanPhongPham/TaiKhoan');
                            window.location.href = '/CHVanPhongPham/TaiKhoan';
                        </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>alert('Email đã tồn tại');</script>";
            }
        }
    }
    public function ktpt($id_taikhoan)
    {
        $sql = "SELECT * FROM tbltk WHERE id_taikhoan = '" . $id_taikhoan . "'";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) <= 0) return false;
        else return true;
    }

    public function deleteTK($id_taikhoan)
    {
        $sql = "DELETE FROM tbltk WHERE id_taikhoan ='" . $id_taikhoan . "'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo "Delete error" . mysqli_error($this->con);
        } else {
            echo "<script> 
                alert('Xóa tài khoản thành công');
                window.history.pushState(null, '', '/CHVanPhongPham/TaiKhoan');
                window.location.href = '/CHVanPhongPham/TaiKhoan';
                </script>";
        }
    }
    public function searchTK()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
            $tk = $_POST['txttimkiem'];
            $lc = $_POST['txtlc'];
            if ($lc == "ten")
                $sql = "SELECT * FROM tbltk WHERE ten LIKE '%$tk%' ";
            if ($lc == "email")
                $sql = "SELECT * FROM tbltk WHERE email LIKE '%$tk%' ";
            if ($lc == "diachi")
                $sql = "SELECT * FROM diachi WHERE diachi LIKE '%$tk%' ";
            if ($lc == "sdt")
                $sql = "SELECT * FROM tbltk WHERE sdt LIKE '%$tk%' ";
            return $result = mysqli_query($this->con, $sql);
        }
    }
}
