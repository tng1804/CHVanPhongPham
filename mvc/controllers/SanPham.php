<?php

// http://localhost/live/Home/Show/1/2

class SanPham extends Controller{

    // Must have SayHi()
    function SayHi(){
        // Call Models
        $teo = $this->model("SanPhamModel");
        $this->viewAdmin("SanPhamView",
        ["SP"=>$teo->listSanPham()]
        );

    }

    function Show(){        
        $teo = $this->model("SanPhamModel");
        $this->viewAdmin("SanPhamView",
        ["SP"=>$teo->listSanPham()]
        );
    }
        // function Add(){        
        //     $teo = $this->model("SanPhamModel");
        //     $this->viewAdmin("SanPhamAdd",
        //     []
        //     );
        //     $teo->themSanPham();
        // }
        function Edit($id_sanpham){
            $teo = $this->model("SanPhamModel");
            $this->viewAdmin("SanPhamEdit",
            ["SP"=>$teo->showEdit($id_sanpham)]
            );
            $teo->suaSanPham($id_sanpham);
        }

        function Delete($id_sanpham){
            $teo = $this->model("SanPhamModel");
            $teo->xoaSanPham($id_sanpham);
        }

        function Search(){
            $teo = $this->model("SanPhamModel");
            $this->viewAdmin("SanPhamSearch", 
            ["SP"=>$teo->timKiemSanPham()]);
            //$loaiSanPhammodel->timKiemLoaiSP();
        }
        function Getloaisp(){
             $teo = $this ->model("SanPhamModel");
             $data = $teo->getAllLoaiSanPham();
             header('Content-Type: application/json');
             echo json_encode($data);
        }
        function GetNCC(){
            $teo = $this ->model("SanPhamModel");
            $data = $teo->getNCC();
            header('Content-Type: application/json');
            echo json_encode($data);     
          }
        function Sort()
        {
            $teo = $this->model("SanPhamModel");
            $this->viewAdmin("SanPhamSort", ["SP" => $teo->SortSP()
        ]);
    
        }
    }

?>