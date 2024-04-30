<?php
class NewModel extends DB{
    public function listTinTuc(){
        $sql = "SELECT * FROM tbltintuc";
         return $result = mysqli_query($this->con,$sql);
    }

    public function themTinTuc(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnsubmit'])){
            $tieude = $_POST['tieude'];
            $noidung = $_POST['noidung'];
          
            
            $sql = "INSERT INTO tbltintuc VALUES ('','".$tieude."','".$noidung."')";
            $result = mysqli_query($this->con, $sql );
            if(!$result){
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else{
                echo "<script type='text/javascript'>alert('Thêm thành công');
                window.history.pushState(null, '', '/VanPhongPham/News/Show');
                window.location.href = '/VanPhongPham/News/Show';
                </script>";
        }
        }        
    }

    public function showEdit($id_tintuc){
        $sql = "SELECT * FROM tbltintuc WHERE id_tintuc = '" .$id_tintuc. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function suaTinTuc($id_tintuc){       
            if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST["btnsubmit"])){
                $tieude = $_POST['tieude'];
                $noidung = $_POST['noidung'];
             
                $sql = "UPDATE tbltintuc SET
                 tieude = '" .$tieude."',
                 noidung = '" .$noidung."'
                 WHERE id_tintuc = '" .$id_tintuc."'";
                $result = mysqli_query($this->con,$sql);
                if(!$result){
                    echo "Update error" . mysqli_error($this->con);
                }
                else{
                    echo " 
                    <script> 
                    alert('Sửa thành công');
                    window.history.pushState(null, '', '/VanPhongPham/News/Show');
                    window.location.href = '/VanPhongPham/News/Show';
                    </script>";
                }
            }            
    }

    public function xoaTinTuc($id_tintuc){
            $sql = "DELETE FROM tbltintuc WHERE id_tintuc ='" .$id_tintuc."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa thành công');
                window.history.pushState(null, '', '/VanPhongPham/News/Show');
                window.location.href = '/VanPhongPham/News/Show';
                </script>";
            }

    }

    public function timkiemTinTuc(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tensp")
    {
        $sql = "SELECT * FROM tbltintuc WHERE tieude LIKE '%$tk%' ORDER BY tieude";
    }
    else{
        $sql = "SELECT * FROM tbltintuc WHERE id_tintuc  LIKE '%$tk%' ORDER BY id_tintuc";
    }
     return $result = mysqli_query($this->con,$sql);
    }
    
}
    public function SortTT()
{
    $qr = "SELECT * FROM tbltintuc ORDER BY tieude ASC";
    return mysqli_query($this->con, $qr);
}

public function kttt($id_tintuc){
    $sql = "SELECT * FROM tbltintuc WHERE id_tintuc = '" .$id_tintuc. "'";
    $result = mysqli_query($this->con,$sql);
    if(mysqli_num_rows($result)<=0) return false;
    else return true;
}

public function themTinTuc2($tieude, $noidung)
{
    $sql = "INSERT INTO tbltintuc VALUES ('','" . $tieude . "','" . $noidung . "')";
    $result = mysqli_query($this->con, $sql);
    return $result;
}

public function putTinTuc2($tieude, $noidung,$id_tintuc){
    $sql = "UPDATE tbltintuc SET
    tieude = '" .$tieude."' ,
    noidung = '" .$noidung."'
    WHERE id_tintuc = '" .$id_tintuc."'";
    $result = mysqli_query($this->con,$sql);
    if(!$result){
        echo "Update error" . mysqli_error($this->con);
    }
    else{
        echo " 
        <script> 
        alert('Sửa  thành công');
        window.history.pushState(null, '', '/live/NhanVien/Show');
        window.location.href = '/live/NhanVien/Show';
        </script>";
    }
}

    }

?>