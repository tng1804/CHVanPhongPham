<?php

// http://localhost/live/Home/Show/1/2

class HomeUser extends Controller
{
    function SayHi(){
        $this->Show();
    }
    function Show()
    {
        $sanphamusermodel = $this->model("SanPhamUserModel");
        $Loai = $sanphamusermodel->ListCategories();
        $Sp = [];
        while ($row = mysqli_fetch_assoc($Loai)) {
            $listProducts = $sanphamusermodel->ListProductByCategries($row['id_loaisp']);
            $Sp[] = [
                "Loai" => $row['tenloaisp'],
                "id_loaisp" =>   $row['id_loaisp'],
                "sanpham" => $listProducts
            ];
        }



        $this->viewUser("index", [
            "Sp" => $Sp
        ], [
            "loaisp" => $Loai
        ]);
    }
    function ShowByCategory($id_loaisp)
    {
        $sanphamusermodel = $this->model("SanPhamUserModel");
        $allLoai =  $Loai = $sanphamusermodel->ListCategories();
        $Loai = $sanphamusermodel->CategoriesProduct($id_loaisp);
        $Sp = [];
        while ($row = mysqli_fetch_assoc($Loai)) {
            $listProducts = $sanphamusermodel->ListProductByCategries($row['id_loaisp']);
            $Sp[] = [
                "Loai" => $row['tenloaisp'],
                "id_loaisp" =>   $row['id_loaisp'],
                "sanpham" => $listProducts
            ];
        }
        $this->viewUser("SanPhamLoai", [
            "Sp" => $Sp
        ], [
            "loaisp" => $allLoai
        ]);
    }
    function ShowDetailProduct($id_sanpham)
    {
        $sanphamusermodel = $this->model("SanPhamUserModel");
        $allLoai =  $Loai = $sanphamusermodel->ListCategories();
        $Sp = $sanphamusermodel->DetailProduct($id_sanpham);
        $this->viewUser("SanphamDetail", [
            "Sp" => $Sp
        ], [
            "loaisp" => $allLoai
        ]);
    }
    function SearchProduct($ID_Search)
    {
        $sanphamusermodel = $this->model("SanPhamUserModel");
        $allLoai =  $Loai = $sanphamusermodel->ListCategories();
        $Sp =  $sanphamusermodel->SearchProduct($ID_Search);
        $this->viewUser("SanPhamSearch", [
            "Sp" => $Sp
        ], [
            "loaisp" => $allLoai
        ]);
    }
    function sumCart()
    {
        $cartModel = $this->model("CartModel");
        $id_taikhoan = $_SESSION['id_User'];
        $sumProduct =  $cartModel->sumProduct($id_taikhoan);
        echo json_encode($sumProduct);
    }
    public function postCart()
    {
        $cartModel = $this->model("CartModel");
        $id_taikhoan = $_SESSION['id_User'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_sanpham = $_POST['id_sanpham'];
            $price = $_POST['price'];
            $quantity = $_POST['soluong'];
            $data = array(
                'id_taikhoan' => $id_taikhoan,
                'id_sanpham' => $id_sanpham,
                'price' => $price,
                'quantity' => $quantity
            );

            $result = $cartModel->insert($data);

            if ($result > 0) {
                echo json_encode(['message' => "Thêm vào giỏ hàng thành công"]);
            } else {
                echo json_encode(['message' => "Đã có lỗi xảy ra."]);
            }
        } else {
            echo json_encode(['message' => "Yêu cầu không hợp lệ."]);
        }
    }
}
