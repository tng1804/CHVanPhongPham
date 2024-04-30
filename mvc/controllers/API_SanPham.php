<?php
class API_SanPham extends Controller {
    public function getSanPham($id_sanpham = null){
        // Khởi tạo model
        $sanphammodel = $this->model("SanPhamModel");
        
        // Kiểm tra xem $id_sanpham có được cung cấp hay không
        if (empty($id_sanpham)) {
            // Nếu không có $id_sanpham, gọi listNhanVien để lấy danh sách tất cả nhân viên
            $sp = $sanphammodel->listSanPham();
        } else {
            // Nếu có $id_sanpham, gọi showNV để lấy thông tin nhân viên theo id
            $sp = $sanphammodel->showEdit($id_sanpham);
        }
    
        // Khởi tạo một mảng để lưu dữ liệu sản phẩm
        $mang = [];
        
        // Lặp qua kết quả và thêm vào mảng
        while ($s = mysqli_fetch_array($sp)) {
            array_push($mang, new SanPham(
                $s["id_sanpham"],
                $s["tensp"],
                $s["loaisp_id"],
                $s["giasp"],
                $s["khuyenmai"],
                $s["anhsp"],
                $s["soluong"],
                $s["chitiet_sp"],
                $s["tinhtrang"]
            ));
        }
        
        // Xuất mảng dưới dạng JSON
        echo json_encode($mang);
    }

    public function deleteSanPham($id_sanpham = null){
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_sanpham)) {
            // Nếu không có $id_nhanvien, trả về thông báo lỗi
            echo json_encode(array('message' => 'Vui lòng cung cấp ID nhân viên để xóa.'),JSON_PRETTY_PRINT);
            return;
        }
        
        // Khởi tạo model
        $sanphammodel = $this->model("SanPhamModel");
        if($sanphammodel->kttt($id_sanpham)==true){
             $sanphammodel->xoaSanPham($id_sanpham);
        }else{
            echo json_encode(array('message' => 'ID không tồn tại'));
        }

 
    }

    public function postSanPham()
    {
        // Nhận dữ liệu từ yêu cầu POST
        $tensp = $_POST['tensp'];
        $loaisp_id = $_POST['loaisp_id'];
        $giasp = $_POST['giasp'];
        $khuyenmai = $_POST['khuyenmai'];
        $anhsp = $_POST['anhsp'];
        $soluong = $_POST['soluong'];
        $chitiet_sp = $_POST['chitiet_sp'];
        $tinhtrang = $_POST['tinhtrang'];
        // Gọi ra model
        $sanphammodel = $this->model("SanPhamModel");
        $sp = $sanphammodel->themSanPham2($tensp, $loaisp_id, $giasp, $khuyenmai, $anhsp, $soluong, $chitiet_sp, $tinhtrang );

        // Kiểm tra kết quả và trả về phản hồi
        if ($sp) {
            echo ("Thêm khách hàng thành công");
        } else {
            echo ("Thêm khách hàng thất bại");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($sp);
    }

    public function putSanPham() {
        // Kiểm tra phương thức HTTP có phải là PUT không
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            // Lấy dữ liệu từ input
            parse_str(file_get_contents("php://input"), $putData);
    
            // Lấy các giá trị từ mảng PUT
            $id_sanpham = $putData['id_sanpham'] ?? null;
            $tensp = $putData['tensp'] ?? null;
            $loaisp_id = $putData['loaisp_id'] ?? null;
            $giasp = $putData['giasp'] ?? null;
            $khuyenmai = $putData['khuyenmai'] ?? null;
            $anhsp = $putData['anhsp'] ?? null;
            $soluong = $putData['soluong'] ?? null;
            $chitiet_sp = $putData['chitiet_sp'] ?? null;
            $tinhtrang = $putData['tinhtrang'] ?? null;
            $sanphammodel = $this->model("SanPhamModel");
            if($sanphammodel->kttt($id_sanpham)==true){
                $sanphammodel->putSanPham2($tensp, $loaisp_id, $giasp, $khuyenmai, $anhsp, $soluong, $chitiet_sp, $tinhtrang,$id_sanpham);
            }else{
                echo json_encode(array('message' => 'ID không tồn tại'));
            }
            
   
        } 
    }

    
    
}

class SanPham{
    public $id_sanpham;
     public $tensp;
     public $loaisp_id;
     public $giasp;
     public $khuyenmai;
     public $anhsp;
     public $soluong;
     public $chitiet_sp;
     public $tinhtrang;

     public function __construct($id_sanpham,$tensp,$loaisp_id,$giasp,$khuyenmai,$anhsp,$soluong,$chitiet_sp,$tinhtrang){
        $this->id_sanpham = $id_sanpham;
        $this->tensp = $tensp;
        $this->loaisp_id = $loaisp_id;
        $this->giasp = $giasp;
        $this->khuyenmai = $khuyenmai;
        $this->anhsp = $anhsp;
        $this->soluong = $soluong;
        $this->chitiet_sp = $chitiet_sp;
        $this->tinhtrang = $tinhtrang;
    }
}


?>
