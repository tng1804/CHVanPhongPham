<?php

// http://localhost/live/Home/Show/1/2

class LoaiSanPham extends Controller{
    // Must have SayHi()
    function SayHi(){
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");
        $this->ShowListLoaiSP();
    }

    function ShowListLoaiSP(){        
        // Call Models
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");

        // Call Views
        $this->viewAdmin("frmInfoLoaiSP", [
            "LoaiSP"=>$loaiSanPhammodel->LoaiSanPhamList()
        ]);
    }

    function addLoaiSP(){
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");
        // Call Views
        $this->viewAdmin("frmThemLoaiSP", [
        ]);
        $loaiSanPhammodel->themLoaiSanPham();
    }

    function editLoaiSP($id_loaisp){
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");
        // Call Views
        $this->viewAdmin("frmSuaLoaiSP", [
            "LoaiSP"=>$loaiSanPhammodel->getEdit($id_loaisp)
        ]);
        $loaiSanPhammodel->suaLoaiSanPham($id_loaisp);
    }

    function deleteLoaiSP($id_loaisp){
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");
        $loaiSanPhammodel->xoaLoaiSanPham($id_loaisp);
    }

    function searchLoaiSP(){
        $loaiSanPhammodel = $this->model("LoaiSanPhamModel");
        $this->viewAdmin("frmTimKiemLoaiSP", ["DL"=>$loaiSanPhammodel->timKiemLoaiSP()]);
        //$loaiSanPhammodel->timKiemLoaiSP();
    }

    


}
?>