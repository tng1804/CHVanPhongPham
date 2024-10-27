<?php

class SanPhamUserModel extends DB {
  
    public function listSpInDanhMuc(){
        if (isset($_GET['id_danhmuc'])) {
        $id_danhmuc = $_GET['id_danhmuc'];
        $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc ='".$id_danhmuc."'";
        return $result = mysqli_query($this->con,$sql);
        }
        
    }
    public function ListCategories(){
        $sql = "SELECT * FROM tbl_loai_sp";
        return $result = mysqli_query($this->con,$sql);
    }
   
    public function ListProductByCategries($id_loaisp){
        $sql = "SELECT * FROM tblsanpham WHERE loaisp_id='" . $id_loaisp . "'";
        return $result = mysqli_query($this->con,$sql);
    }
    public function CategoriesProduct($id_loaisp){
        $sql = "SELECT * FROM tbl_loai_sp WHERE id_loaisp = '" . $id_loaisp . "'";
        return $result = mysqli_query($this->con,$sql);
    }
    public function DetailProduct($id_sanpham){
        $sql = "SELECT * FROM tblsanpham WHERE id_sanpham = '" . $id_sanpham . "' ";
        return $result = mysqli_query($this->con,$sql);
    }
    public function SearchProduct($ID_Search){
        $sql = "SELECT * FROM tblsanpham WHERE tensp LIKE '%" . $ID_Search . "%' ";
        return $result = mysqli_query($this->con,$sql);
    }
}

?>