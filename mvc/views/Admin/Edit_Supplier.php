<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin nhà cung cấp</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
    <?php
    $idNCC = "";
    $tenNCC ="";
    $diachi="";
    $sdt= "";
    $masothue="";
    $trangThai="";
    if(mysqli_num_rows($data["SPL"])>0){
        while($row = mysqli_fetch_assoc($data["SPL"])){
            $idNCC = $row["idNCC"];
            $tenNCC =$row["tenNCC"]; 
            $diachi=$row["diachi"];
            $sdt= $row["sdt"];
            $masothue=$row["masothue"];
            $trangthai=$row["trangthai"];
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
            <label for="idNCC">ID nhà cung cấp</label>
                <input id ="idNCC"  name = "idNCC" type="int" value ="<?php echo($idNCC) ?> "placeholder ="id nhà cung cấp" readonly>
                <span></span>
                <small></small>
            </div>
            
            <div class="form-control error">
    <label for="tenNCC">Họ tên</label>
    <input id="tenNCC" name="tenNCC" type="text" value="<?php echo($tenNCC); ?>" placeholder="Tên nhà cung cấp">
    <span></span>
    <small></small>
</div>



            <div class="form-control error">
            <label for="diachi">Địa chỉ</label>
                <input id ="diachi" name = "diachi" type="text" value ="<?php echo($diachi) ?>" placeholder ="Địa chỉ">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <label for="sdt">Số điện thoại</label>
                <input id ="sdt" name = "sdt" type="int" value ="<?php echo($sdt) ?>" placeholder ="Số điện thoại" required pattern="\d{11}" maxlength="11">
                <span></span>
                <small>Vui lòng nhập SDT 11 số</small>
            </div>
            

            <div class="form-control error">
            <label for="masothue">Mã số thuế</label>
                <input id ="masothue" name = "masothue" type="text" value ="<?php echo($masothue) ?>" placeholder ="Mã số thuế">
                <span></span>
                <small></small>
            </div>

           <!-- Trạng thái làm việc -->
           <div class="form-control">
                <select id="trangthai" name="trangthai" required>
                    <option value="<?php echo($trangThai) ?>" disabled selected><?php echo($trangThai) ?></option>
                    <option value="Còn cung cấp">Còn cung cấp</option>
                    <option value="Nghỉ cung cấp">Nghỉ cung cấp</option>
                </select>
                <small>Vui lòng chọn trạng thái cung cấp</small>
            </div>
        
            
            <button type = "submit" class="btn-submit" name = "btnsubmit" onclick="submitForm()">Edit</button>
          
            <div class="signup-link">
                 <a href="/CHVanPhongPham_full/Supplier/Show">Trở về</a>
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