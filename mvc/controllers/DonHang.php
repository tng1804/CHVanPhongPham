<?php

class DonHang extends Controller{
    // Must have SayHi()
    function SayHi(){
        $donhangmodel = $this->model("DonHangModel");
    $this->view("orderlistall", [
        "DH" => $donhangmodel->listdonhang()
    ]);
    }
function ShowListDH(){        
    // Call Models
    $donhangmodel = $this->model("DonHangModel");
    $this->view("orderlistall", [
        "DH" => $donhangmodel->listdonhang()
    ]);
}
function ShowdetailDH($order_ma){        
    // Call Models
    $donhangmodel = $this->model("DonHangModel");
    $this->view("orderdetail", [
        "DH" => $donhangmodel->listdetaildonhang($order_ma)
    ]);
}
function deleteDH($id_donhang){
    $donhangmodel = $this->model("DonHangModel");
    $donhangmodel->deleteDH($id_donhang);
}
function xacnhan($id_session,$tongtien){
    $donhangmodel = $this->model("DonHangModel");
    $donhangmodel->xacnhan($id_session,$tongtien);
}
}
?>