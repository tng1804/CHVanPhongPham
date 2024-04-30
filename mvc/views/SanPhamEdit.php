<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông sản phẩm</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    $id_sanpham = "";
    $tensp = "";
    $id_loaisp = "";
    $gia = "";
    $giamgia = "";
    $anh = "";
    $soluong = "";
    $chitiet = "";
    $tinhtrang = "";

    if (mysqli_num_rows($data["SP"]) > 0) {
        while ($row = mysqli_fetch_assoc($data["SP"])) {
            $tensp = $row["tensp"];
            $id_loaisp =  $row["loaisp_id"];
            $gia =  $row["giasp"];
            $giamgia =  $row["khuyenmai"];
            $anh = $row["anhsp"];
            $soluong =  $row["soluong"];
            $chitiet = $row["chitiet_sp"];
            $tinhtrang =  $row["tinhtrang"];
        }
    } else {
        echo "Khong co ban ghi";
    }

    ?>
    <div class="container">
        <form METHOD="post">
            <h1>Sửa sản phẩm</h1>

            <div class="form-control error">
                <label for="tensp">Tên sản phẩm</label>
                <input id="tensp" name="tensp" type="text" value="<?php echo ($tensp) ?> " placeholder="Tên sản phẩm">
                <span></span>
                <small></small>
            </div>

            <div class="from-group col-md-3">
                <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                <select class="form-control" required="required" name="loaisp_id" id="loaisanpham_id">
                    <option value="">--Chọn--</option>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "chvanphongpham");
                    if (!$conn) {
                        die("Ket noi that bai" . mysqli_connect_error());
                        exit;
                    }
                    $sql2 = "SELECT * FROM tbl_loai_sp";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<option value='" . $row["id_loaisp"] . "'>" . $row["tenloaisp"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-control error">
                <label for="soluong">Số lượng</label>
                <input id="soluong" name="soluong" type="text" value="<?php echo ($soluong) ?>" placeholder="Số lượng">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <label for="gia">Giá sản phẩm</label>
                <input id="gia" name="gia" type="int" value="<?php echo ($gia) ?>" placeholder="Giá sản phẩm">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="giamgia">Giảm giá</label>
                <input id="giamgia" name="giamgia" type="text" value="<?php echo ($giamgia) ?>" placeholder="Giảm giá">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <label for="anh">Ảnh sản phẩm</label>
                <input id="anh" name="anh" type="file" value="<?php echo ($anh) ?>" placeholder="Ảnh sản phẩm">
                <span></span>
                <small></small>
            </div>

            <!-- Trạng thái làm việc -->
            <div class="form-control">
                <select id="tinhtrang" name="tinhtrang" required>
                    <option value="">--Chọn--</option>
                    <?php
                    if ($tinhtrang == 1) {
                    ?>
                        <option value="1" selected>Còn Hàng</option>
                        <option value="0">Hết Hàng</option>
                    <?php
                    } else {
                    ?>
                        <option value="1">Còn Hàng</option>
                        <option value="0" selected>Hết Hàng</option>
                    <?php
                    }
                    ?>
                </select>
                <small>Vui lòng chọn tình trạng</small>
            </div>

            <div class="form-control error">
                <label for="chitiet">Chi tiết</label>
                <input id="chitiet" name="chitiet" type="text" value="<?php echo ($chitiet) ?>" placeholder="Chi tiết sản phẩm">
                <span></span>
                <small></small>
            </div>

            <button type="submit" class="btn-submit" name="btnsubmit">Edit</button>

            <div class="signup-link">
                <a href="javascript:history.back()">Trở về</a>
            </div>
        </form>

</body>

</html>

<style>
    /* Kiểu cơ bản cho toàn bộ trang */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Kiểu cho container */
    .container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Kiểu cho tiêu đề */
    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
    }

    /* Kiểu cho form control */
    .form-control {
        margin-bottom: 15px;
    }

    /* Kiểu cho input */
    .form-control input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    /* Kiểu cho input khi được tập trung (focus) */
    .form-control input:focus {
        border-color: #007bff;
    }

    /* Kiểu cho nút submit */
    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    /* Hiệu ứng hover cho nút submit */
    .btn-submit:hover {
        background-color: #0056b3;
    }

    /* Kiểu cho liên kết quay lại */
    .signup-link {
        text-align: center;
        margin-top: 15px;
    }

    /* Kiểu cho liên kết trong phần dưới cùng */
    .signup-link a {
        color: #007bff;
        text-decoration: none;
    }

    /* Hiệu ứng hover cho liên kết */
    .signup-link a:hover {
        text-decoration: underline;
    }

    /* Kiểu cho thông báo lỗi */
    .form-control.error input {
        border-color: red;
    }

    .form-control.error small {
        color: red;
        display: block;
    }

    /* Kiểu cơ bản cho form control */
    .form-control {
        margin-bottom: 15px;
    }

    /* Kiểu cho nhãn (label) */
    .form-control label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    /* Kiểu cho select (trường chọn) */
    .form-control select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    /* Hiệu ứng khi trường chọn được tập trung (focus) */
    .form-control select:focus {
        border-color: #007bff;
        outline: none;
    }

    /* Kiểu cho tùy chọn trong select */
    .form-control select option {
        padding: 5px;
        font-size: 14px;
    }

    /* Kiểu cho thông báo nhỏ */
    .form-control small {
        display: block;
        margin-top: 5px;
        color: #888;
        font-size: 12px;
    }

    /* Kiểu cho thông báo nhỏ khi có lỗi */
    .form-control.error small {
        color: red;
    }
</style>