<?php
class QuestionModel extends DB
{
    public function ListQT()
    {
        $qr = "SELECT * FROM tblquestion";
        return mysqli_query($this->con, $qr);
    }
    public function SortQT()
    {
        $qr = "SELECT * FROM tblquestion ORDER BY cauhoi ASC";
        return mysqli_query($this->con, $qr);
    }
    public function AddQT()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnGhi'])) {
            $cauhoi = $_POST['cauhoi'];
            $traloi = $_POST['traloi'];

            $sql = "INSERT INTO tblquestion VALUES ('','" . $cauhoi . "','" . $traloi . "')";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
            } else {
                echo "<script type='text/javascript'>alert('Thêm thành công')
                window.location.href = '/VANPHONGPHAM/Question/listQT';
                </script>";
            }
        }
    }

    public function DeleteQT($id)
    {
        $sql = "DELETE FROM tblquestion WHERE id = '" . $id . "'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo "Delete error" . mysqli_error($this->con);
        } else {
            echo "<script type = 'text/javascript'>alert('Xóa QTách hàng thành công');
            window.location.href = '/VANPHONGPHAM/Question/listQT';
            </script>";
        }
    }
    public function GetQT($id)
    {
        $sql = "SELECT * FROM tblquestion WHERE id = '" . $id . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function UpdateQT($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
            $cauhoi = $_POST['txt_cauhoi'];
            $traloi =  $_POST['txt_traloi'];

            $sql = "UPDATE tblquestion SET cauhoi='" . $cauhoi . "',traloi='" . $traloi . "'
            WHERE id ='" . $id . "'";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo "Cập nhập dữ liệu không thành công.";
            } else {
                echo "Cập nhập dữ liệu thành công.";
                // Thông báo thành công
                echo "<script>
                alert('Cập nhật dữ liệu thành công');
                window.location.href = '/VANPHONGPHAM/Question/listQT';
                </script>";
            }
        }
    }
    public function SearchQT()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
            $tk = $_POST['txttimkiem'];
            $lc = $_POST['txtlc'];
            if ($lc == "cauhoi") {
                $sql = "SELECT * FROM tblquestion WHERE cauhoi LIKE '$tk%' ORDER BY cauhoi";   // 'A%' : Tim kiem theo chu cai dau
            } else {
                $sql = "SELECT * FROM tblquestion WHERE id  LIKE '$tk%' ORDER BY id";           // '%A%' : Tim kiem theo co chua chu cai
            }

            $result = mysqli_query($this->con, $sql);
            return $result;
        }
    }
    //window.history.pushState(null, '', '/VANPHONGPHAM/QTachHang/listQT');


    // API
    public function POST_QT_API($cauhoi, $traloi)
    {
        $sql = "INSERT INTO tblquestion VALUES ('','" . $cauhoi . "','" . $traloi . "')";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function PUT_QT_API($id, $cauhoi, $traloi)
    {
        $sql = "UPDATE tblquestion SET cauhoi ='" . $cauhoi . "',traloi='" . $traloi . "'
            WHERE id='" . $id . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function DELETE_QT_API($id)
    {
        $sql = "DELETE FROM tblquestion WHERE id = '" . $id . "'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function KiemTraKhoa($id)
    {
        $sql = "SELECT * FROM tblquestion WHERE id = '" . $id . "'";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) <= 0)
            return false;
        else
            return true;
    }
}
