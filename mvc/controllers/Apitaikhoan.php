<?php
class Apitaikhoan extends Controller {
    public function taikhoan($id_taikhoan = null){
        // Khởi tạo model
        $taikhoanmodel = $this->model("TaiKhoanModel");
        
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_taikhoan)) {
            // Nếu không có $id_nhanvien, gọi listNhanVien để lấy danh sách tất cả nhân viên
            $tk = $taikhoanmodel->listTaiKhoan();
        } else {
            // Nếu có $id_nhanvien, gọi showNV để lấy thông tin nhân viên theo id
            $tk = $taikhoanmodel->showEditTk($id_taikhoan);
        }
    
        // Khởi tạo một mảng để lưu dữ liệu nhân viên
        $mang = [];
        
        // Lặp qua kết quả và thêm vào mảng
        while ($s = mysqli_fetch_array($tk)) {
            array_push($mang, new TaiKhoan(
                $s["id_taikhoan"],
                $s["ten"],
                $s["email"],
                $s["pass"],
                $s["sdt"],
                $s["quyen"],
                $s["diachi"]
            ));
        }
        
        // Xuất mảng dưới dạng JSON
        echo json_encode($mang);
    }
    function POSTTK()
    {
        // Nhận dữ liệu từ yêu cầu POST
     
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $TK = $taikhoanmodel->addapi();

        // Kiểm tra kết quả và trả về phản hồi
        if ($TK) {
            echo ("Thêm khách hàng thành công");
        } else {
            echo ("Thêm khách hàng thất bại");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($TK);
    }
    function PUTTK()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        // Nhận dữ liệu từ yêu cầu POST
        parse_str(file_get_contents("php://input"), $putData);
        $id_taikhoan = $putData['id_taikhoan'] ?? null;
        $ten = $putData['ten'] ?? null;
        $email = $putData['email'] ?? null;
        $pass = $putData['pass'] ?? null;
        $sdt = $putData['sdt'] ?? null;
        $diachi = $putData['diachi'] ?? null;
        $quyen = $putDataT['quyen'] ?? null;
        // if(empty($ten) || empty($email) || empty($pass)|| empty($sdt)|| empty($diachi)||empty($quyen)){
        //     echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
        //     </script>";
        //     return;
        // }
        // Gọi ra model
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $kt =  $taikhoanmodel-> ktpt($id_taikhoan);
        if($kt==false)
        {echo("tài khoản này không tồn tại"); echo($kt); return;}
            $tk = $taikhoanmodel-> PUTTK_API($id_taikhoan,$ten,$email,$pass,$sdt,$diachi,$quyen);
        if ($tk) {
            echo ("Sửa tài khoản thành công");
        } else {
            echo ("Sửa tài khoản thất bại");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($tk);//}
       // else echo("tài khoản này không tồn tại");
    }
    }
    public function deleteTK($id_taikhoan= null){
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_taikhoan)) {
            // Nếu không có $id_nhanvien, trả về thông báo lỗi
            echo json_encode(array('message' => 'Vui lòng cung cấp ID nhân viên để xóa.'));
            return;
        }
        $kt =  $taikhoanmodel-> ktpt($id_taikhoan);
        if($kt==false)
        {echo("tài khoản này không tồn tại"); echo($kt); return;}
         
        // Khởi tạo model
        $taikhoanmodel = $this->model("TaiKhoanModel");
        $TK = $taikhoanmodel->deleteTK($id_taikhoan);
        
        // if ($TK) {
        //     // Nếu xóa thành công, trả về thông báo thành công
        //     echo json_encode(array('message' => 'Xóa nhân viên thành công.'));
        // } else {
        //     // Nếu xóa không thành công, trả về thông báo lỗi
        //     echo json_encode(array('message' => 'Xóa nhân viên thất bại.'));
        // }
    }
    
    
}

class TaiKhoan{
    public $id_taikhoan;
    public $ten;
    public $email;
    public $pass;
    public $sdt;
    public $quyen;
    public $diachi;
  

    public function __construct($id_taikhoan,$ten,$email,$pass,$sdt,$quyen,$diachi){
        $this->id_taikhoan = $id_taikhoan;
        $this->ten = $ten;
        $this->email = $email;
        $this->pass = $pass;
        $this->sdt = $sdt;
        $this->quyen = $quyen;
        $this->diachi = $diachi;
    }
}


?>