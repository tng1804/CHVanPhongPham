<?php

class KhuyenMai extends Controller
{
    // Must have SayHi()
    function SayHi()
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $this->view("Admin/frmThongTinKM", []);
    }

    function Show()
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $this->view("Admin/frmThongTinKM", [
            "KM" => $khuyenmaimodel->listKM()
        ]);
    }

    function addKM()
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");

        $this->view("Admin/frmThemKhuyenMai", [
            "danhmuc" => $khuyenmaimodel->getTenDM()
        ]);

        $khuyenmaimodel->addKM();
    }

    function editKM($id_KM)
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $this->view("Admin/frmSuaKhuyenMai", [
            "KM" => $khuyenmaimodel->showEdit($id_KM),
            "danhmuc" => $khuyenmaimodel->getTenDM()
        ]);
        $khuyenmaimodel->editKM($id_KM);
    }

    function deleteKM($id_KM)
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $khuyenmaimodel->deleteKM($id_KM);
    }

    function timkiemKM()
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $this->view("Admin/frmTimKiemKM", ["DL" => $khuyenmaimodel->timkiemKM()]);
    }
    function loc()
    {
        $khuyenmaimodel = $this->model("KhuyenMaiModel");
        $this->view("Admin/frmTrangThaiKM", [
            "TT" => $khuyenmaimodel->loc()
        ]);
    }
}
