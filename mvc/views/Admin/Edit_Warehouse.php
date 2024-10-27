<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin kho</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
    <?php
    $idnhaphang = "";
    $id_sanpham ="";
    $tensp ="";
    $soluongnhap="";
    $gianhap= "";
    $ngaynhap="";
    if(mysqli_num_rows($data["WH"])>0){
        while($row = mysqli_fetch_assoc($data["WH"])){
            $idnhaphang = $row["idnhaphang"];
            $id_sanpham =$row["id_sanpham"]; 
            $tensp =$row["tensp"]; 
            $soluongnhap=$row["soluongnhap"];
            $gianhap= $row["gianhap"];
            $ngaynhap=$row["ngaynhap"];
        }
    }
    else{
        echo "Khong co ban ghi";
    }
    
    ?>
    <div class = "container">
        <form METHOD = "post" action ="" >
            <h1>Edit Account NCC</h1>

            <div class="form-control error">
            <label for="idnhaphang">ID nhập hàng</label>
                <input id ="idnhaphang"  name = "idnhaphang" type="int" value ="<?php echo($idnhaphang) ?> "placeholder ="Mã Nhập hàng" readonly>
                <span></span>
                <small></small>
            </div>
            
            <div class="form-control error">
                <label for="id_sanpham">Mã sản phẩm</label>
                <input id="id_sanpham" name="id_sanpham" type="int" value="<?php echo($id_sanpham); ?>" placeholder="Mã sản phẩm" readonly>
                <span></span>
                <small></small>
            </div>


            <div class="form-control error">
                <label for="tensp">Tên sản phẩm</label>
                <input id="tensp" name="tensp" type="int" value="<?php echo($tensp); ?>" placeholder="Tên sản phẩm" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
            <label for="soluongnhap">Số lương nhập</label>
                <input id ="soluongnhap" name = "soluongnhap" type="int" value ="<?php echo($soluongnhap) ?>" placeholder ="Số lượng nhập">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <label for="gianhap">Giá nhập</label>
                <input id ="gianhap" name = "gianhap" type="int" value ="<?php echo($gianhap) ?>" placeholder ="Giá nhập">
                <span></span>
                <small>Vui lòng nhập SDT 11 số</small>
            </div>
            

            <div class="form-control error">
            <label for="ngaynhap">Ngày nhập</label>
                <input id ="ngaynhap" name = "ngaynhap" type="date" value ="<?php echo($ngaynhap) ?>" placeholder ="Ngày nhập">
                <span></span>
                <small></small>
            </div>
        
            
            <button type = "submit" class="btn-submit" name = "btnsubmit" onclick="submitForm()">Edit</button>
          
            <div class="signup-link">
                 <a href="/CHVanPhongPham_full/Warehouse/Show">Trở về</a>
            </div>
            <script>
    function goBack() {
        window.history.back();
    }
</script>
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