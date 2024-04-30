<?php
class TaiKhoanModel extends DB{
    public function listTaiKhoan(){
        $sql = "SELECT * FROM tbltk";
         return $result = mysqli_query($this->con,$sql);
    }
    public function dangnhap(){
        if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn-submit-dangnhap'])){
            $email = $_POST['email'];
            $pass = $_POST['password'];
            if(empty($email) || empty($pass)){
                echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                </script>";
                return;
            }
            $sql = "SELECT * FROM tbltk WHERE email='".$email."' AND pass ='".$pass."' and quyen = 0";
            $result = mysqli_query($this->con,$sql); //return $result;
            if(mysqli_num_rows($result)<=0){
                echo  "<script type = 'text/javascript'>alert('Đăng nhập THẤT BẠI');
                </script>";
            }
            else{
                echo  "<script type = 'text/javascript'>alert('Đăng nhập Thành công');
                window.location.href = '/VanPhongPham/Home/Show';
                </script>";
            }
            
        }
    }
    public function PUTTK_API($id_taikhoan,$ten,$email,$pass,$sdt,$diachi,$quyen){
        $sql = "UPDATE tbltk SET
        ten = '" .$ten."' ,
        email = '" .$email."',
        pass = '" .$pass."',
        sdt = '" .$sdt."',
        diachi = '" .$diachi."',
        quyen = '" .$quyen."'
        WHERE id_taikhoan = '" .$id_taikhoan."'";
        $result = mysqli_query($this->con, $sql);
         return $result;
    }
    public function addapi(){
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $quyen = $_POST['quyen'];
        $sql = "INSERT INTO tbltk (ten,email,pass,sdt, diachi, quyen) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."','".$quyen."')";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }
    public function themTaiKhoan(){
        if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btnsubmit'])){
               
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $quyentxt = $_POST['quyen'];
            $quyen = 0;
            if($quyentxt == "Admin")
            $quyen =0;
            else $quyen =1;
            if(empty($ten) || empty($email) || empty($pass)|| empty($sdt)|| empty($diachi)||empty($quyen)){
                echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                </script>";
                return;
            }
            if($pass != $_POST['confirm-password']){
                echo"<script type = 'text/javascript'>alert('Vui lòng Nhập Trùng với CONFIRM-PASSWORD');
                </script>";
                return;
            }
            $sql2 = "SELECT * FROM tbltk WHERE email ='".$email."'";
            $result2 = mysqli_query($this->con,$sql2);
            if(mysqli_num_rows($result2)<=0){
            $sql = "INSERT INTO tbltk (ten,email,pass,sdt, diachi, quyen) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."','".$quyen."')";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Khong them thanh cong";
            }
            else{
              
                echo  "<script> 
                alert('thêm tài khoản thành công');
                window.history.pushState(null, '', '/VanPhongPham/TaiKhoan');
                window.location.href = '/VanPhongPham/TaiKhoan';
                </script>";
            }
            }else{
                echo"Trùng email";
            }
            
        }
    }
    public function sapxepTK(){
        $sql = "SELECT * FROM tbltk ORDER BY ten ASC";
        return $result = mysqli_query($this->con,$sql);
    }
    public function showEditTK($id_taikhoan){
        $sql = "SELECT * FROM tbltk WHERE id_taikhoan = '" .$id_taikhoan. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function editTK($id_taikhoan){       
        if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST["btnsubmit"])){
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $quyentxt = $_POST['quyen'];
            $quyen = 0;
            if($quyentxt == "Admin")
            $quyen =0;
            else $quyen =1;
            $sql = "UPDATE tbltk SET
             ten = '" .$ten."' ,
             email = '" .$email."',
             pass = '" .$pass."',
             sdt = '" .$sdt."',
             diachi = '" .$diachi."',
             quyen = '" .$quyen."'
             WHERE id_taikhoan = '" .$id_taikhoan."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Update error" . mysqli_error($this->con);
            }
            else{
                echo "<script> 
                alert('Xóa tài khoản thành công');
                window.history.pushState(null, '', '/VanPhongPham/TaiKhoan');
                window.location.href = '/VanPhongPham/TaiKhoan';
                </script>";
            }
        }
    }
    public function ktpt($id_taikhoan){
        $sql = "SELECT * FROM tbltk WHERE id_taikhoan = '" .$id_taikhoan. "'";
        $result = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($result)<=0) return false;
        else return true;
    }

    public function deleteTK($id_taikhoan){
            $sql = "DELETE FROM tbltk WHERE id_taikhoan ='" .$id_taikhoan."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script> 
                alert('Xóa tài khoản thành công');
                window.history.pushState(null, '', '/VanPhongPham/TaiKhoan');
                window.location.href = '/VanPhongPham/TaiKhoan';
                </script>";
            }
            // return $result;

    }
    public function searchTK(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
        {
            $tk = $_POST['txttimkiem'];
            $lc= $_POST['txtlc'];
            if($lc=="ten")
            $sql = "SELECT * FROM tbltk WHERE ten LIKE '%$tk%' ";
            if($lc=="email")
            $sql = "SELECT * FROM tbltk WHERE email LIKE '%$tk%' ";
            if($lc=="diachi")
            $sql = "SELECT * FROM diachi WHERE diachi LIKE '%$tk%' ";
            if($lc=="sdt")
            $sql = "SELECT * FROM tbltk WHERE sdt LIKE '%$tk%' ";
            return $result = mysqli_query($this->con,$sql);
        }

}
}

?>