<?php

// http://localhost/live/Home/Show/1/2

class News extends Controller{

    // Must have SayHi()
    function SayHi(){
        // Call Models
        $teo = $this->model("NewModel");
        //$tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("NewView",
        ["TT"=>$teo->listTinTuc()]
        );

    }

    function Show(){        
        // Call Models
        $teo = $this->model("NewModel");
        //$tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("NewView",
        ["TT"=>$teo->listTinTuc()]
        );
    }
        function Add(){        
            // Call Models
            $teo = $this->model("NewModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call Views
            $this->view("NewAdd",
            []
            );
            $teo->themTinTuc();
        }

        function Edit($id_tintuc){
            $teo = $this->model("NewModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call Views
            $this->view("NewEdit",
            ["TT"=>$teo->showEdit($id_tintuc)]
            );
            $teo->suaTinTuc($id_tintuc);
        }

        function Delete($id_tintuc){
            $teo = $this->model("NewModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call model
            $teo->xoaTinTuc($id_tintuc);
        }

        function Search(){
            $teo = $this->model("NewModel");
            $this->view("NewSearch", 
            ["TT"=>$teo->timkiemTinTuc()]);
            //$loaiSanPhammodel->timKiemLoaiSP();
        }
    
        function Sort()
    {
        // Gọi ra model
        $teo = $this->model("NewModel");
        $this->view("NewSort", ["TT" => $teo->SortTT()
    ]);

    }
        
    }

?>