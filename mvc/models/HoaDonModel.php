<?php
class HoaDonModel extends DB{
    public function listHoaDon(){
        $sql = "SELECT * FROM tbl_hoadon";
         return $result = mysqli_query($this->con,$sql);
    }
   
    // public function themHoaDon(){
    //     if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn_addhd'])){
    //         $idkh = $_POST['makhachhang'];
    //         $tongtien = $_POST['tongtien'];
    //         $ngaytao = $_POST['ngaytao'];
    //     //    if(empty($idkh)){
    //     //         echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin ".$idkh."');
    //     //         </script>";
    //     //         return;
    //     //    }

    //         $sql = "INSERT INTO tbl_hoadon (id_hoadon,id_khachhang,tongtien,date_thongke) VALUES('','".$idkh."','".$tongtien."','".$ngaytao."')";
    //         $result = mysqli_query($this->con,$sql);
    //         if(!$result){
    //             echo "Khong them thanh cong";
    //         }
    //         else{
              
    //             echo "<script> 
    //             alert('Thêm hóa đơn thành công');
    //             window.history.pushState(null, '', '/live/HoaDon');
    //             window.location.href = '/live/HoaDon';
    //             </script>";
    //         }
            
    //     }
    // }

    public function showEditHD($id_hoadon){
        $sql = "SELECT * FROM tbl_hoadon WHERE id_hoadon = '" .$id_hoadon. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function sapxepHD(){
        // if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn_sorthd'])){
        $sql = "SELECT * FROM tbl_hoadon ORDER BY tongtien ASC";
        return $result = mysqli_query($this->con,$sql);
        //}
    }

    public function editHD($id_hoadon){       
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn_luuHDedit']))
{
    //$makhachhang = $_POST['makhachhang'];
    $thanhtien = $_POST['txttongtien'];
    $thoigian = $_POST['txtthoigian'];
    $sql = "UPDATE tbl_hoadon SET tongtien = '".$thanhtien."' , date_thongke = '".$thoigian."'  WHERE id_hoadon = '".$id_hoadon."'";
 
 //$sql = "UPDATE tbl_hoadon SET id_khachhang = '".$makhachhang."',tongtien = '".$thanhtien."' , date_thongke = '".$thoigian."'  WHERE id_hoadon = '".$id_hoadon."'";
 $result = mysqli_query($this->con, $sql);
 if(!$result)
 {
     echo "<script type ='text/javascript'> alert('sửa thất bại');</script>";
 }
 else
 {
    echo "<script> 
    alert('Sửa hóa đơn thành công');
    window.history.pushState(null, '', '/live/HoaDon');
    window.location.href = '/live/HoaDon';
    </script>";
 }

}
}
//     }

    public function deleteHD($id_hoadon){
            $sql = "DELETE FROM tbl_hoadon WHERE id_hoadon ='" .$id_hoadon."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa tài khoản thành công');window.history.back();
                </script>";
            }

    }
    public function searchHD(){
       if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiem']) )
        {

          $lc = $_POST["select_timkiem"];
          $in =  $_POST["txtin"];
          $out =  $_POST["txtout"];
        if($lc == "session_id")
            $sql = "SELECT * FROM tbl_hoadon WHERE session_idA like '%".$in."%' ";
            if($lc == "tongtien")
          $sql = "SELECT * FROM tbl_hoadon WHERE tongtien >='".$in."' AND tongtien <='".$out."' ";
         if($lc == "date")
          $sql = "SELECT * FROM tbl_hoadon WHERE date >='".$in."' AND date <='".$out."' ";
          return $result = mysqli_query($this->con,$sql);
        }

}
}

?>