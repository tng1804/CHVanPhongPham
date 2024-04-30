<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông khách hàng</title>
    <link rel = "stylesheet" href = "./public/css/style.css"/>
</head>
<body>
<?php
        //$id_taikhoan = $_GET['id_taikhoan'];
        $ten = "";
        $email ="";
        $pass="";
        $sdt= "";
        $diachi="";
        $quyen ="";
            if(mysqli_num_rows($data["TK"])>0){
                while($row = mysqli_fetch_assoc($data["TK"])){
                    $ten = $row["ten"];
                    $email =$row["email"]; 
                    $pass=$row["pass"];
                    $sdt= $row["sdt"];
                    $diachi=$row["diachi"];
                    $quyen = $row["quyen"];
                }
            }
            else{
                echo "Khong co ban ghi";
            }
        
    ?>
    <div class = "container">
        <form METHOD = "post">
            <h1>Edit Accout</h1>

            <div class="form-control error">
                <input id ="ten"  name = "ten" type="text" value ="<?php echo($ten) ?>"  placeholder ="Tên">
                <span></span>
                <small></small>
            </div>


            <div class="form-control error">
                <input id ="email" name = "email" type="email" value ="<?php echo($email) ?>"  placeholder ="Email" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <input id ="sdt" name = "sdt" type="int" value ="<?php echo($sdt) ?>"  placeholder ="Số điện thoại">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <input id="password" name = "password" type="password" value ="<?php echo($pass) ?>" placeholder ="Password">
                <span></span>
                <small></small>
            </div>
            
            <div class="form-control error">
                <input id="confirm-password" name = "confirm-password" type="password" value ="<?php echo($pass) ?>" placeholder ="Confirm-password">
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <input id ="diachi" name = "diachi" type="text" value ="<?php echo($diachi) ?>" placeholder ="Địa chỉ">
                <span></span>
                <small></small>
            </div>
            <div class="form-control">
            <div class="form-control">
    <select id="quyen" name="quyen">
        <?php if ($quyen == 0): ?>
            <option value="0" selected>Admin</option>
            <option value="1">Nhân viên</option>
        <?php elseif ($quyen == 1): ?>
            <option value="0">Admin</option>
            <option value="1" selected>Nhân viên</option>
        <?php else: ?>
            <option value="0">Admin</option>
            <option value="1">Nhân viên</option>
        <?php endif; ?>
    </select>
    <span></span>
    <small></small>
</div>
        
            
            <button type = "submit" class="btn-submit" name = "btnsubmit">Edit</button>
          
            <div class="signup-link">
                 <a href="TaiKhoan">Trở về</a>
            </div>
        </form>
    <?php
       
    ?>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

:root{
    --success-color: #2691d9;
    --error-color:#e74c3c;   
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Roboto', sans-serif;
    height: 100vh;
    background: linear-gradient(120deg, #3ca7ee, #9b408f);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container{
    width: 400px;
    border: none;
    border-radius:10px ;
    background: white;
    padding: 25px; 
}
.container h1{
    text-align: center;
}
.form-control{
    width: 100%;
    position: relative;
    margin-top: 25px;
}
.form-control input{
    width: 100%;
    height: 40px;
    font-size: 16px;
    border: none;
    outline: none;
    border-bottom: 2px solid #adadad;
}
.form-control span{
    position: absolute;
    border-bottom: 3px solid var(--success-color);
    left: 0;
    top: 38px;
    width: 0%;
    transition: 0.3s;
}
.form-control input:focus ~ span{
    width: 100%;
}
.form-control.error small{
    color: var(--error-color);
}
.form-control.error input{
    border-bottom: 2px solid var(--error-color);
}
.btn-submit{
    width: 100%;
    height: 50px;
    border-radius: 25px;
    border: none;
    background: var(--success-color);
    color: white;
    font-size: 18px;
    font-weight: bold;
    margin: 25px 0;
    cursor: pointer;
    transition: 0.3s;
}
.btn-submit:hover{
    background: #08609a;
}
.signup-link{
    text-align: center;
}
.signup-link a {
    color: var(--success-color);
    text-decoration: none;
    cursor: pointer;
}
.signup-link a:hover{
    text-decoration: underline;
}
</style>