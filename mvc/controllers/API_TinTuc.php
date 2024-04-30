<?php
class API_TinTuc extends Controller {
    public function getTinTuc($id_tintuc = null){
        // Khởi tạo model
        $newmodel = $this->model("NewModel");
        
        // Kiểm tra xem $id_sanpham có được cung cấp hay không
        if (empty($id_tintuc)) {
            // Nếu không có $id_sanpham, gọi listNhanVien để lấy danh sách tất cả nhân viên
            $tt = $newmodel->listTinTuc();
        } else {
            // Nếu có $id_sanpham, gọi showNV để lấy thông tin nhân viên theo id
            $tt = $newmodel->showEdit($id_tintuc);
        }
    
        // Khởi tạo một mảng để lưu dữ liệu sản phẩm
        $mang = [];
        
        // Lặp qua kết quả và thêm vào mảng
        while ($s = mysqli_fetch_array($tt)) {
            array_push($mang, new TinTuc(
                $s["id_tintuc"],
                $s["tieude"],
                $s["noidung"]
              
            ));
        }
        
        // Xuất mảng dưới dạng JSON
        echo json_encode($mang);
    }

   
    
    

    public function deleteTinTuc($id_tintuc = null){
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_tintuc)) {
            // Nếu không có $id_nhanvien, trả về thông báo lỗi
            echo json_encode(array('message' => 'Vui lòng cung cấp ID để xóa.'),JSON_PRETTY_PRINT);
            return;
        }
        
        // Khởi tạo model
        $newmodel = $this->model("NewModel");
        if($newmodel->kttt($id_tintuc)==true){
             $newmodel->xoaTinTuc($id_tintuc);
        }else{
            echo json_encode(array('message' => 'ID không tồn tại'));
        }

 
    }

    public function postTinTuc()
    {
        // Nhận dữ liệu từ yêu cầu POST
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
      
        // Gọi ra model
        $sanphammodel = $this->model("NewModel");
        $tt = $sanphammodel->themTinTuc2($tieude, $noidung);

        // Kiểm tra kết quả và trả về phản hồi
        if ($tt) {
            echo ("Thêm tin tuc thành công");
        } else {
            echo ("Thêm tin tuc thất bại");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($tt);
    }

    // public function postSanPham()
    // {
    //     // Nhận dữ liệu từ yêu cầu POST
    //     $tensp = $_POST['tensp'];
    //     $loaisp_id = $_POST['loaisp_id'];
    //     $giasp = $_POST['giasp'];
    //     $khuyenmai = $_POST['khuyenmai'];
    //     $anhsp = $_POST['anhsp'];
    //     $soluong = $_POST['soluong'];
    //     $chitiet_sp = $_POST['chitiet_sp'];
    //     $tinhtrang = $_POST['tinhtrang'];
    
    //     // Kiểm tra nếu số lượng lớn hơn 50 mới thêm sản phẩm vào cơ sở dữ liệu
    //     if ($soluong > 50) {
    //         // Gọi ra model
    //         $sanphammodel = $this->model("SanPhamModel");
    //         $sp = $sanphammodel->themSanPham2($tensp, $loaisp_id, $giasp, $khuyenmai, $anhsp, $soluong, $chitiet_sp, $tinhtrang);
    
    //         // Kiểm tra kết quả và trả về phản hồi
    //         if ($sp) {
    //             echo ("Thêm sản phẩm thành công");
    //         } else {
    //             echo ("Thêm sản phẩm thất bại");
    //         }
    //         // Trả về phản hồi dưới dạng JSON
    //         echo json_encode($sp);
    //     } else {
    //         echo ("Số lượng sản phẩm phải lớn hơn 50");
    //     }
    // }
    

    public function putTinTuc() {
        // Kiểm tra phương thức HTTP có phải là PUT không
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            // Lấy dữ liệu từ input
            parse_str(file_get_contents("php://input"), $putData);
    
            // Lấy các giá trị từ mảng PUT
            $id_tintuc = $putData['id_tintuc'] ?? null;
            $tieude = $putData['tieude'] ?? null;
            $noidung = $putData['noidung'] ?? null;
           
            $newmodel = $this->model("NewModel");
            if($newmodel->kttt($id_tintuc)==true){
                $newmodel->pustTinTuc2($tieude, $noidung,$id_tintuc);
            }else{
                echo json_encode(array('message' => 'ID không tồn tại'));
            }
            
   
        } 
    }

    
    
}

class TinTuc{
    public $id_tintuc;
     public $tieude;
     public $noidung;
  

     public function __construct($id_tintuc,$tieude,$noidung){
        $this->id_tintuc = $id_tintuc;
        $this->tieude = $tieude;
        $this->noidung = $noidung;
     
    }
}


?>
