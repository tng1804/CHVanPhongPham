<?php
class DonHangModel extends DB{
    public function listdonhang(){
        $sql = "SELECT * FROM tbl_payment";
        return $result = mysqli_query($this->con,$sql);
    }

public function listdetaildonhang($order_ma){
    $sql = "SELECT * FROM tbl_donhang WHERE session_idA = '$order_ma' ORDER BY cartA_id DESC";
    $result = mysqli_query($this->con,$sql);
    return $result;
}
public function deleteDH($id_donhang){
    $session_id ="";
    $sqlss = "SELECT session_idA FROM tbl_payment WHERE  payment_id ='" .$id_donhang."'";
    $resultss = mysqli_query($this->con,$sqlss);
    if( mysqli_num_rows($resultss)>0)
    {
        while($row = mysqli_fetch_assoc($resultss))
        {
            $session_id = $row['session_idA'];
        }

    }
    else{
        echo "Error".mysqli_error($this->con);
    }
    $sqldelcart = "DELETE FROM tbl_donhang WHERE  session_idA ='" .$session_id."'";
    $resultcart = mysqli_query($this->con,$sqldelcart);
    if(!$resultcart){
        echo "Delete error" .mysqli_error($this->con);
    }
    else{
        echo "<script type = 'text/javascript'>alert('Xóa sản phẩm giỏ hàng thành công');
        </script>";
    }

    $sql = "DELETE FROM tbl_payment WHERE  payment_id ='" .$id_donhang."'";
    $result = mysqli_query($this->con,$sql);
    if(!$result){
        echo "Delete error" .mysqli_error($this->con);
    }
    else{
        echo "<script type = 'text/javascript'>alert('Xóa dơn hàng thành công');window.history.back();
        </script>";
    }

}
public function xacnhan($id_session,$tongtien){
    $sqlcheck = "SELECT * FROM tbl_hoadon WHERE session_idA = '" .$id_session. "'";
    $result1 = mysqli_query($this->con,$sqlcheck);
    $c = mysqli_num_rows($result1);
    if(mysqli_num_rows($result1)>0)
    {
        echo "<script> 
        alert('Đơn hàng này đã được tính tiền ".$id_session."  va ".$c."');
        window.history.pushState(null, '', '/VanPhongPham/HoaDon');
        window.location.href = '/VanPhongPham/DonHang';
        </script>";
        return;
    }
    //else

    $datenow = date('Y-m-d');
    $sql = "INSERT INTO tbl_hoadon (id_hoadon,session_idA,tongtien,date_thongke) VALUES('','".$id_session."','".$tongtien."','".$datenow."')";
    $result = mysqli_query($this->con,$sql);
    if(!$result){
        echo "Khong them thanh cong";
    }
    else{
      
        echo "<script> 
        alert('Thêm hóa đơn thành công');
        window.history.pushState(null, '', '/VanPhongPham/HoaDon');
        window.location.href = '/VanPhongPham/DonHang';
        </script>";
    }
}
}

    ?>