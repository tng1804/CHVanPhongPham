<?php
class KhachHang extends Controller
{
    function SayHi()
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        // Đổ ra view
        $this->view("frmListKH", [
            "KH" => $KH_Model->ListKH()
        ]);
    }
    function listKH()
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        // Đổ ra view
        $this->view("frmListKH", [
            "KH" => $KH_Model->ListKH()
        ]);//
    }
    function AddKH()
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        $this->view("frmAddKH", [
            "KH" => $KH_Model->AddKH()
        ]);
    }
    function UpdateKH($id_khachhang)
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        $this->view("frmUpdateKH", [
            "GetKH" => $KH_Model->Get_KH($id_khachhang),
            "UpdateKH" => $KH_Model->UpdateKH($id_khachhang)
        ]);
    }
    function DeleteKH($id_khachhang)
    {
        $KH_Model = $this->model("KhachHangModel");
        $KH_Model->DeleteKH($id_khachhang);
    }

    function SearchKH()
    {
        $KH_Model = $this->model("KhachHangModel");
        $this->view("frmSearchKH", ["KH" => $KH_Model->SearchKH()]);
    }
    function SortKH()
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        $this->view("frmSortKH", [
            "KH" => $KH_Model->SortKH()
        ]);
    }
}
