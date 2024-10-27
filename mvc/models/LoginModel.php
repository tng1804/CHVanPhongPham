<?php
class LoginModel extends DB
{
    public function login($email, $pass)
    {
        // Truy vấn cơ sở dữ liệu
        $sql = "SELECT * FROM tbltk WHERE email='" . mysqli_real_escape_string($this->con, $email) . "' AND pass ='" . mysqli_real_escape_string($this->con, $pass) . "'";
        $result = mysqli_query($this->con, $sql);

        // Kiểm tra kết quả truy vấn
        if (mysqli_num_rows($result) <= 0) {
            echo "<script type='text/javascript'>alert('Đăng nhập THẤT BẠI');</script>";
        } else {
            // Lấy thông tin của người dùng từ kết quả truy vấn
            $user = mysqli_fetch_assoc($result);
            $_SESSION['ten_User'] = $user['ten'];
            $_SESSION['id_User'] = $user['id_taikhoan'];

            // Kiểm tra quyền của người dùng
            if ($user['quyen'] == 0) {
                // Nếu là Admin
                echo "<script type='text/javascript'>
                alert('Đăng nhập Thành công - Admin');
                window.location.href = '/CHVanPhongPham/TaiKhoan/Show';
              </script>";
            } else if ($user['quyen'] == 1) {
                // Nếu là Khách hàng
                echo "<script type='text/javascript'>
                alert('Đăng nhập Thành công - Khách hàng');
                window.location.href = '/CHVanPhongPham/HomeUser';
              </script>";
            }
        }
    }
}
