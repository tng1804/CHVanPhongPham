<?php

class TaiKhoan extends Controller
{
    // Must have SayHi()
    function SayHi()
    {
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->Show();
    }

    function Show()
    {
        // Call Models
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("Admin/frmTaiKhoan", [
            "TK" => $taikhoanmodel->listTaiKhoan()
        ]);
    }

    function addTK()
    {
        $this->view("Admin/frmThemTaiKhoan", []);
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $taikhoanmodel->themTaiKhoan();
    }
    function editTK($id_taikhoan)
    {
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("Admin/frmEditTaiKhoan", [
            "TK" => $taikhoanmodel->showEditTK($id_taikhoan)
        ]);
    }
    function deleteTK($id_taikhoan)
    {
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $taikhoanmodel->deleteTK($id_taikhoan);
    }
    function searchTK()
    {
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("Admin/frmTimkiemTK", ["TK" => $taikhoanmodel->searchTK()]);
    }
}
