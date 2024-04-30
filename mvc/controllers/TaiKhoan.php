<?php

class TaiKhoan extends Controller{
    // Must have SayHi()
    function SayHi(){
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->ShowListTK();
    }

    function ShowListTK(){        
        // Call Models
         $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("TaiKhoanfrm", [
            "TK" => $taikhoanmodel->listTaiKhoan()
        ]);
        //$this->view("timkiemTK", ["TK"=>$taikhoanmodel->searchTK()]);
    }

    function addTK(){
        $this->view("createAccoutNV", []);
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $taikhoanmodel->themTaiKhoan();
        
    }
    function editTK($id_taikhoan){
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("EditTaiKhoan", [
            "TK" => $taikhoanmodel->showEditTK($id_taikhoan)
        ]);
        $taikhoanmodel->editTK($id_taikhoan);
        
    }
    function deleteTK($id_taikhoan){
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $taikhoanmodel->deleteTK($id_taikhoan);
    }
    // function Searchfrm(){        
    //     // Call Models
    //     $taikhoanmodel = $this->model("TaiKhoanModel");
       
         
    //     $this->view("timkiemTK", [
    //         "TK" => $taikhoanmodel->SearchTK()
    //     ]);
    //    // $taikhoanmodel->SearchTK();
    // }
    function searchTK(){
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("timkiemTK", ["TK"=>$taikhoanmodel->searchTK()]); 
    }
    function sapxepTK(){
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $this->view("sapxepTK", ["TK"=>$taikhoanmodel->sapxepTK()]); 
    }

    
}
?>