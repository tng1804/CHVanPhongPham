<?php
class API_KhachHang extends Controller
{
    function SayHi()
    {
        echo "Xin chào bạn !";
    }
    function GET_KH($id_khachhang = null)
    {
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        // Khởi tạo model
        $sanphammodel = $this->model("SanPhamModel");

        // Kiểm tra xem $id_sanpham có được cung cấp hay không
        if (empty($id_khachhang)) {
            // Nếu không có $id_sanpham, gọi listNhanVien để lấy danh sách tất cả nhân viên
            $KH = $KH_Model->ListKH();
        } else {
            // Nếu có $id_sanpham, gọi showNV để lấy thông tin nhân viên theo id
            $KH = $KH_Model->GET_KH($id_khachhang);
        }
        $mang = [];

        while ($s = mysqli_fetch_array($KH)) {
            array_push($mang, new KhachHang($s["id_khachhang"], $s["id_taikhoan"], $s["ten"], $s["diachi"], $s["sdt"], $s["email"]));
        }
        echo json_encode($mang);

        // View
    }
    function POST_KH()
    {
        // Nhận dữ liệu từ yêu cầu POST
        $ten = $_POST['ten'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        var_dump($_POST);
        // Gọi ra model
        $KH_Model = $this->model("KhachHangModel");
        $KH = $KH_Model->POST_KH_API();

        // Kiểm tra kết quả và trả về phản hồi
        if ($KH) {
            echo ("Thêm khách hàng thành công ");
        } else {
            echo ("Thêm khách hàng thất bại ");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($KH);
    }
    public function PUT_KH()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            // Lấy dữ liệu từ input
            $putData = json_decode(file_get_contents("php://input"));
            parse_str(file_get_contents("php://input"), $putData);

            // Lấy các giá trị từ mảng PUT
            $id_khachhang = $putData['id_khachhang'] ?? null;
            $ten = $putData['ten'] ?? null;
            $diachi = $putData['diachi'] ?? null;
            $sdt = $putData['sdt'] ?? null;
            $email = $putData['email'] ?? null;

            echo json_encode("id la:" . $id_khachhang);
            // Cập nhật thông tin khách hàng
            $KH_Model = $this->model("KhachHangModel");
            $result = $KH_Model->PUT_KH_API($id_khachhang, $ten, $diachi, $sdt, $email);

            // Kiểm tra kết quả và trả về phản hồi JSON
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Update khách hàng thành công.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Update khách hàng không thành công.']);
            }
        }
    }
    public function DELETE_KH($id_khachhang)
    {
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_khachhang)) {
            // Nếu không có $id_nhanvien, trả về thông báo lỗi
            echo json_encode(array('message' => 'Vui lòng cung cấp ID khách hàng để xóa.'));
            return;
        }

        // Khởi tạo model
        $KH_Model = $this->model("KhachHangModel");

        // Gọi phương thức xóa khách hàng từ model
        $result = $KH_Model->DELETE_KH_API($id_khachhang);

        // Kiểm tra kết quả và trả về phản hồi
        if ($result) {
            echo ("Xóa khách hàng thành công ");
        } else {
            echo ("Xóa khách hàng thất bại ");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($result);
    }
}
class KhachHang
{
    public $id_khachhang;
    public $id_taikhoan;
    public $ten;
    public $diachi;
    public $sdt;
    public $email;

    public function __construct($id_khachhang, $id_taikhoan, $ten, $diachi, $sdt, $email)
    {
        $this->id_khachhang = $id_khachhang;
        $this->id_taikhoan = $id_taikhoan;
        $this->ten = $ten;
        $this->diachi = $diachi;
        $this->sdt = $sdt;
        $this->email = $email;
    }
}
