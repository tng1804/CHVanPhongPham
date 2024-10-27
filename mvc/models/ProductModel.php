<?php
class ProductModel extends DB {
    public function list()
    {
        $qr = "Select * from tblsanpham where id_sanpham = '21' ";
        return mysqli_query($this->con, $qr);
    }
}
