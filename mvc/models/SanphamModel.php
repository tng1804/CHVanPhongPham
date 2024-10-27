<?php
class SanPhamModel extends DB{
    public function listSanPham(){
        $sql = "SELECT * FROM tblsanpham";
         return $result = mysqli_query($this->con,$sql);
    }

  

    public function getAllLoaiSanPham() {
        $sql = "SELECT * FROM tbl_loai_sp";
        $result = mysqli_query($this->con, $sql);
        $loaisp = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loaisp[] = $row;
            }
        }

        return $loaisp;
    }
    public function getNCC() {
        $sql = "SELECT * FROM tblsupplier";
        $result = mysqli_query($this->con, $sql);
        $NCC = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $NCC[] = $row;
            }
        }

        return $NCC;
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
                $gia = $_POST['gia'];
                $anh = $_POST['anh'];
                $NCC = $_POST['nhacungcap'];
                $chitiet = $_POST['chitiet'];
                $sql = "UPDATE tblsanpham SET
                 tensp = '" .$tensp."' ,
                 loaisp_id = '" .$id_loaisp."',
                 giasp = '" .$gia."',
                 anhsp = '".$anh."',
                 soluong = '" .$soluong."',
                 chitiet_sp = '".$chitiet."',
                 id_NCC = '".$NCC."'
                 WHERE id_sanpham = '" .$id_sanpham."'";
                $result = mysqli_query($this->con,$sql);
                if(!$result){
                    echo "Update error" . mysqli_error($this->con);
                }
                else{
                    echo " 
                    <script> 
                    alert('Sửa sản phẩm thành công');
                    window.history.pushState(null, '', '/CHVanPhongPham/SanPham/Show');
                    window.location.href = '/CHVanPhongPham/SanPham/Show';
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
                window.history.pushState(null, '', '/CHVanPhongPham/SanPham/Show');
                window.location.href = '/CHVanPhongPham/SanPham/Show';
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
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham  = ". $tk." ORDER BY id_sanpham";
    }
     return $result = mysqli_query($this->con,$sql);
    }
    
}
    
public function SortSP()
{

//     $sql = "SELECT * FROM tblsanpham ORDER BY  ".$sapxep." ";
//     return mysqli_query($this->con, $sql);
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