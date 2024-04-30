<?php
class API_Question extends Controller
{
    function SayHi()
    {
        echo "Xin chào bạn !";
    }
    function GET_QT()
    {
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $QT = $QT_Model->ListQT();
        $mang = [];

        while ($s = mysqli_fetch_array($QT)) {
            array_push($mang, new Question($s["id"], $s["cauhoi"], $s["traloi"]));
        }
        echo json_encode($mang);
        // View
    }
    function POST_QT()
    {
        // Nhận dữ liệu từ yêu cầu POST
        $cauhoi = $_POST['cauhoi'];
        $traloi = $_POST['traloi'];
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $QT = $QT_Model->POST_QT_API($cauhoi, $traloi);

        // Kiểm tra kết quả và trả về phản hồi
        if ($QT) {
            echo ("Thêm câu hỏi thành công ");
        } else {
            echo ("Thêm câu hỏi thất bại ");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($QT);
    }
    public function PUT_QT()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {


            // Lấy dữ liệu từ input
            parse_str(file_get_contents("php://input"), $putData);

            // Lấy các giá trị từ mảng PUT
            $id = $putData['id'] ?? null;
            $cauhoi = $putData['cauhoi'] ?? null;
            $traloi = $putData['traloi'] ?? null;

            echo json_encode("id la:" . $id);
            // Cập nhật thông tin khách hàng
            $QT_Model = $this->model("QuestionModel");
            $rs = $QT_Model->KiemTraKhoa($id);
            if ($rs == false) {
                echo json_encode(['success' => false, 'message' => 'Id không tồn tại.']);
            } else {
                $result = $QT_Model->PUT_QT_API($id, $cauhoi, $traloi);

                // Kiểm tra kết quả và trả về phản hồi JSON
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Update câu hỏi thành công.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Update câu hỏi không thành công.']);
                }
            }
        }
    }
    public function DELETE_QT($id)
    {
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id)) {
            // Nếu không có $id_nhanvien, trả về thông báo lỗi
            echo json_encode(array('message' => 'Vui lòng cung cấp ID khách hàng để xóa.'));
            return;
        }

        // Khởi tạo model
        $QT_Model = $this->model("QuestionModel");
        $rs = $QT_Model->KiemTraKhoa($id);
            if ($rs == false) {
                echo json_encode(['success' => false, 'message' => 'Id không tồn tại.']);
            }
        // Gọi phương thức xóa khách hàng từ model
        $result = $QT_Model->DELETE_QT_API($id);

        // Kiểm tra kết quả và trả về phản hồi
        if ($result) {
            echo ("Xóa câu hỏi thành công ");
        } else {
            echo ("Xóa câu hỏi thất bại ");
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($result);
    }
}
class Question
{
    public $id;
    public $cauhoi;
    public $traloi;


    public function __construct($id, $cauhoi, $traloi)
    {
        $this->id = $id;
        $this->cauhoi = $cauhoi;
        $this->traloi = $traloi;
    }
}
