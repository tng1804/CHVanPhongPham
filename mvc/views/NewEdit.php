

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin của tin tức</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
    <?php
  $id_tintuc = "";
  $tieude ="";
  $noidung ="";
 
  if(mysqli_num_rows($data["TT"])>0){
      while($row = mysqli_fetch_assoc($data["TT"])){
          $tieude = $row["tieude"] ;
          $noidung =  $row["noidung"] ;
         
          
      }
  }
    else{
        echo "Khong co ban ghi";
    } 
    
    ?>
    <div class = "container">
        <form METHOD = "post">
            <h1>Sửa tin tức</h1>

            <div class="form-control error">
            <label for="tieude">Tiêu đề</label>
                <input id ="tieude"  name = "tieude" type="text" value ="<?php echo($tieude) ?> "placeholder ="Tiêu đề tin tức" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
            <label for="noidung">Nội dung</label>
                <input id ="noidung"  name = "noidung" type="text" value ="<?php echo($noidung) ?> "placeholder ="Nội dung tin tức" >
                <span></span>
                <small></small>
            </div>

            <button type = "submit" class="btn-submit" name = "btnsubmit">Edit</button>
          
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