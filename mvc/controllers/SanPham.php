<?php

// http://localhost/live/Home/Show/1/2

class SanPham extends Controller{

    // Must have SayHi()
    function SayHi(){
        // Call Models
        $teo = $this->model("SanPhamModel");
        //$tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("SanPhamView",
        ["SP"=>$teo->listSanPham()]
        );

    }

    function Show(){        
        // Call Models
        $teo = $this->model("SanPhamModel");
        //$tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("SanPhamView",
        ["SP"=>$teo->listSanPham()]
        );
    }
        function Add(){        
            // Call Models
            $teo = $this->model("SanPhamModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call Views
            $this->view("SanPhamAdd",
            []
            );
            $teo->themSanPham();
        }

        function Edit($id_sanpham){
            $teo = $this->model("SanPhamModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call Views
            $this->view("SanPhamEdit",
            ["SP"=>$teo->showEdit($id_sanpham)]
            );
            $teo->suaSanPham($id_sanpham);
        }

        function Delete($id_sanpham){
            $teo = $this->model("SanPhamModel");
            //$tong = $teo->Tong($a, $b); // 3
    
            // Call model
            $teo->xoaSanPham($id_sanpham);
        }

        function Search(){
            $teo = $this->model("SanPhamModel");
            $this->view("SanPhamSearch", 
            ["SP"=>$teo->timKiemSanPham()]);
            //$loaiSanPhammodel->timKiemLoaiSP();
        }

        function Sort()
        {
            // Gọi ra model
            $teo = $this->model("SanPhamModel");
            $this->view("SanPhamSort", ["SP" => $teo->SortSP()
        ]);
    
        }
    }

?>