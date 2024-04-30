<?php

// http://localhost/live/Home/Show/1/2

class HoaDon extends Controller{
    // Must have SayHi()
    function SayHi(){
        $hoadonnmodel = $this->model("HoaDonModel");
        $this->ShowListHD();
    }

    function ShowListHD(){        
        // Call Models
         $hoadonmodel = $this->model("HoaDonModel");
        $this->view("qlyhoadon", [
            "HD" => $hoadonmodel->listHoaDon()
        ]);
        
    }

    function addHD(){
        $this->view("HoaDonadd", []);
        $hoadonmodel = $this->model("HoaDonModel");
        $hoadonmodel->themHoaDon();
        
    }
    function editHD($id_hoadon){
        $hoadonmodel = $this->model("HoaDonModel");
        $this->view("qlyhoadonsua", [
            "HD" => $hoadonmodel->showEditHD($id_hoadon)
        ]);
        $hoadonmodel->editHD($id_hoadon); 
    }
    function deleteHD($id_hoadon){
        $hoadonmodel = $this->model("HoaDonModel");
        $hoadonmodel->deleteHD($id_hoadon);
    }
    function SearchHD(){        
        $hoadonmodel = $this->model("HoaDonModel");
        $this->view("hoadonSearch", [
            "HD" => $hoadonmodel->SearchHD()]);
        $hoadonmodel->SearchHD();
    }
    function sapxepHD(){        
        $hoadonmodel = $this->model("HoaDonModel");
        $this->view("sapxephd", [
            "HD" => $hoadonmodel->sapxepHD()]);
       // $hoadonmodel->sapxephHD();
    }
}
?>