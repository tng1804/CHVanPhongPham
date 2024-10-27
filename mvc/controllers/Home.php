<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller
{
    // Must have SayHi()
    function SayHi()
    {
        $this->view("Customer/index", []);
    }

    function Show()
    {
        // Call Models
        $nhanVienmodel = $this->model("TaiKhoanModel");
        // $tong = $nhanVienmodel->Tong($a, $b); // 3
        // $this->nhanVienmodel->GetSV();
        // Call Views
        $this->view("Admin/frmTaiKhoan", [
            // "Page"=>"news",
            // "Number"=>$tong,
            // "Mau"=>"red",
            // "SoThich"=>["A", "B", "C"],
            // "nhanVien"=>$nhanVienmodel->GetSV()
            //"SV" => $nhanVienmodel->SinhVien()
        ]);
    }
}
