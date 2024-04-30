<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{
    // Must have SayHi()
    function SayHi(){
        $taikhoannmodel = $this->model("TaiKhoanModel");
        $this->view("login_admin", [
            "TK" => $taikhoannmodel->dangnhap()
            
        ]);
    }

    function Show(){        
       
        $this->view("index", [
            
            
        ]);
    }
 
}
?>