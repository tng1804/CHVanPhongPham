<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="/public/assets/style.css">
</head>


<body>
    <div>
        <div class="container">
            <form METHOD="post">
                <h1>Đăng kí sản phẩm</h1>

                <div class="form-control ">
                    <input id="tensp" name="tensp" type="text" placeholder="Tên Sản Phẩm">
                    <span></span>
                    <small></small>
                </div>

                <div class="from-group col-md-3">
                    <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select class="form-control" required="required" name="loaisp_id" id="loaisp_id">
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

                        <div class="form-control ">
                            <input id="soluong" name="soluong" type="text" placeholder="Số lượng">
                            <span></span>
                            <small></small>
                        </div>

                        <div class="form-control ">
                            <input id="giamgia" name="giamgia" type="int" placeholder="Giảm giá">
                            <span></span>
                            <small></small>
                        </div>
                        <div class="form-control ">
                            <input id="gia" name="gia" type="text" placeholder="Giá sản phẩm">
                            <span></span>
                            <small></small>
                        </div>


                        <div class="form-control ">
                            <select id="tinhtrang" name="tinhtrang" required>
                                <option value="" disabled selected>Chọn</option>
                                <option value="1">Còn Hàng</option>
                                <option value="0">Hết Hàng</option>
                            </select>
                        </div>


                        <div class="form-control">
                            <input id="anh" name="anh" type="file" placeholder="Ảnh sản phẩm">
                        </div>

                        <div class="form-control ">
                            <input id="chitiet" name="chitiet" type="text" placeholder="Chi tiết sản phẩm">
                            <span></span>
                            <small></small>
                        </div>

                        <button class="btnsubmit" name="btnsubmit" style="padding: 10px 15px; background-color: #007bff; color: white; border-radius: 5px; border: none; cursor: pointer; font-weight: bold; display: block; margin: 0 auto;">Create</button>



                        <div class="signup-link">
                            <a href="javascript:history.back()">Trở về</a>
                        </div>


            </form>
        </div>
        <div>

        </div>
    </div>
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
        border-radius: 10px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    /* Kiểu cho tiêu đề */
    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    /* Kiểu cho form control */
    .form-control {
        margin-bottom: 15px;
    }

    /* Kiểu cho input và combobox */
    .form-control input,
    .form-control select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Kiểu cho input khi được tập trung (focus) */
    .form-control input:focus,
    .form-control select:focus {
        outline: none;
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

    /* Kiểu cho liên kết trong phần dưới cùng */
    .signup-link {
        text-align: center;
        margin-top: 15px;
    }

    .signup-link a {
        color: #007bff;
        text-decoration: none;
        transition: text-decoration 0.3s;
    }

    /* Hiệu ứng hover cho liên kết */
    .signup-link a:hover {
        text-decoration: underline;
    }

    /* Kiểu cho thông báo lỗi */
    .form-control small {
        color: red;
        display: none;
    }
</style>