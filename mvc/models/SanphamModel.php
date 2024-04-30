<?php
class SanPhamModel extends DB{
    public function listSanPham(){
        $sql = "SELECT * FROM tblsanpham";
         return $result = mysqli_query($this->con,$sql);
    }

    public function themSanPham(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnsubmit'])){
            $tensp = $_POST['tensp'];
            $id_loaisp = $_POST['loaisp_id'];
            $soluong = $_POST['soluong'];
            $giamgia = $_POST['giamgia'];
            $giasp = $_POST['gia'];
            $tinhtrang = $_POST['tinhtrang'];
            $anhsp = $_POST['anh'];
            $chitiet = $_POST['chitiet'];
            
            $sql = "INSERT INTO tblsanpham VALUES ('','".$tensp."','".$id_loaisp."','".$giasp."','".$giamgia."','".$anhsp."','".$soluong."','".$chitiet."','".$tinhtrang."')";
            $result = mysqli_query($this->con, $sql );
            if(!$result){
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else{
                echo "<script type='text/javascript'>alert('Thêm thành công');
                window.history.pushState(null, '', '/VanPhongPham/SanPham/Show');
                window.location.href = '/VanPhongPham/SanPham/Show';
                </script>";
        }
        }        
    }

    public function showEdit($id_sanpham){
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham = '" .$id_sanpham. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function suaSanPham($id_sanpham){       
            if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST["btnsubmit"])){
                $tensp = $_POST['tensp'];
                $id_loaisp = $_POST['loaisp_id'];
                $soluong = $_POST['soluong'];
                $giamgia = $_POST['giamgia'];
                $gia = $_POST['gia'];
                $anh = $_POST['anh'];
                $tinhtrang = $_POST['tinhtrang'];
                $chitiet = $_POST['chitiet'];
                $sql = "UPDATE tblsanpham SET
                 tensp = '" .$tensp."' ,
                 loaisp_id = '" .$id_loaisp."',
                 giasp = '" .$gia."',
                 khuyenmai = '" .$giamgia."',
                 anhsp = '".$anh."',
                 soluong = '" .$soluong."',
                 chitiet_sp = '".$chitiet."',
                 tinhtrang = '".$tinhtrang."'
                 WHERE id_sanpham = '" .$id_sanpham."'";
                $result = mysqli_query($this->con,$sql);
                if(!$result){
                    echo "Update error" . mysqli_error($this->con);
                }
                else{
                    echo " 
                    <script> 
                    alert('Sửa sản phẩm thành công');
                    window.history.pushState(null, '', '/VanPhongPham/SanPham/Show');
                    window.location.href = '/VanPhongPham/SanPham/Show';
                    </script>";
                }
            }            
    }

    public function xoaSanPham($id_sanpham){
            $sql = "DELETE FROM tblsanpham WHERE id_sanpham ='" .$id_sanpham."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa sản phẩm thành công');
                window.history.pushState(null, '', '/VanPhongPham/SanPham/Show');
                window.location.href = '/VanPhongPham/SanPham/Show';
                </script>";
            }

    }

    public function timKiemSanPham(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tensp")
    {
        $sql = "SELECT * FROM tblsanpham WHERE tensp LIKE '%$tk%' ORDER BY tensp";
    }
    else{
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham  LIKE '%$tk%' ORDER BY id_sanpham";
    }
     return $result = mysqli_query($this->con,$sql);
    }
    
}
    
public function SortSP()
{
    $qr = "SELECT * FROM tblsanpham ORDER BY tensp ASC";
    return mysqli_query($this->con, $qr);
}


public function themSanPham2($tensp, $loaisp_id, $giasp, $khuyenmai, $anhsp, $soluong, $chitiet_sp, $tinhtrang )
{
    $sql = "INSERT INTO tblsanpham VALUES ('','" . $tensp . "','" . $loaisp_id . "','" . $giasp . "','" . $khuyenmai . "','" . $anhsp . "','" . $soluong . "','" . $chitiet_sp . "','" . $tinhtrang . "')";
    $result = mysqli_query($this->con, $sql);
    return $result;
}
public function putSanPham2($tensp, $loaisp_id, $giasp, $khuyenmai, $anhsp, $soluong, $chitiet_sp, $tinhtrang,$id_sanpham){
    $sql = "UPDATE tblsanpham SET
    tensp = '" .$tensp."' ,
    loaisp_id = '" .$loaisp_id."',
    giasp = '" .$giasp."',
    khuyenmai = '" .$khuyenmai."',
    anhsp = '".$anhsp."',
    soluong = '" .$soluong."',
    chitiet_sp = '".$chitiet_sp."',
    tinhtrang = '".$tinhtrang."'
    WHERE id_sanpham = '" .$id_sanpham."'";
    $result = mysqli_query($this->con,$sql);
    if(!$result){
        echo "Update error" . mysqli_error($this->con);
    }
    else{
        echo " 
        <script> 
        alert('Sửa sản phẩm thành công');
        window.history.pushState(null, '', '/live/NhanVien/Show');
        window.location.href = '/live/NhanVien/Show';
        </script>";
    }
}


public function kttt($id_sanpham){
    $sql = "SELECT * FROM tblsanpham WHERE id_sanpham = '" .$id_sanpham. "'";
    $result = mysqli_query($this->con,$sql);
    if(mysqli_num_rows($result)<=0) return false;
    else return true;
}


public function xoaSanPham2($id_sanpham){
    
    $sql = "DELETE FROM tblsanpham WHERE id_sanpham ='" .$id_sanpham."'";
    $result = mysqli_query($this->con,$sql);
    return $result;
    }

}

?>