<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin tài khoản</title>
    <link rel="stylesheet" href="./public/css/style.css" />
</head>

<body>
    <?php
    $ten = "";
    $email = "";
    $pass = "";
    $sdt = "";
    $diachi = "";
    $quyen = "";
    if (mysqli_num_rows($data["TK"]) > 0) {
        while ($row = mysqli_fetch_assoc($data["TK"])) {
            $id_taikhoan = $row['id_taikhoan'];
            $ten = $row["ten"];
            $email = $row["email"];
            $pass = $row["pass"];
            $sdt = $row["sdt"];
            $diachi = $row["diachi"];
            $quyen = $row["quyen"];
        }
    } else {
        echo "Khong co ban ghi";
    }
    ?>
    <div class="container">
        <form method="post">
            <h1>Sửa thông tin tài khoản</h1>
            <div class="form-control error">
                <label for="id_taikhoan">ID Tài khoản</label>
                <input id="id_taikhoan" readonly name="id_taikhoan" type="text" value="<?php echo ($id_taikhoan) ?>" placeholder="Tên">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="ten">Tên</label>
                <input id="ten" name="ten" type="text" value="<?php echo ($ten) ?>" placeholder="Tên">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?php echo ($email) ?>" placeholder="Email">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="sdt">Số điện thoại</label>
                <input id="sdt" name="sdt" type="int" value="<?php echo ($sdt) ?>" placeholder="Số điện thoại">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="pass">Mật khẩu</label>
                <input id="pass" name="pass" type="password" value="<?php echo ($pass) ?>" placeholder="Password">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="confirm-password">Xác nhận mật khẩu</label>
                <input id="confirm-password" name="confirm-password" type="password" value="<?php echo ($pass) ?>" placeholder="Confirm-password">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
                <label for="diachi">Địa chỉ</label>
                <input id="diachi" name="diachi" type="text" value="<?php echo ($diachi) ?>" placeholder="Địa chỉ">
                <span></span>
                <small></small>
            </div>
            <div class="form-control">
                <label for="quyen">Quyền</label>
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
            <button type="submit" class="btn-submit" onclick="submitForm()" name="btnsubmit">Edit</button>
            <div class="signup-link">
                <a href="/CHVanPhongPham/TaiKhoan/Show">Trở về</a>
            </div>
        </form>
    </div>
</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    :root {
        --success-color: #2691d9;
        --error-color: #e74c3c;
    }

    * {
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

    .container {
        width: 400px;
        border: none;
        border-radius: 10px;
        background: white;
        padding: 25px;
    }

    .container h1 {
        text-align: center;
    }

    .form-control {
        width: 100%;
        position: relative;
        margin-top: 25px;
    }

    .form-control label {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    .form-control input,
    .form-control select {
        width: 100%;
        height: 40px;
        font-size: 16px;
        border: none;
        outline: none;
        border-bottom: 2px solid #adadad;
    }

    .form-control span {
        position: absolute;
        border-bottom: 3px solid var(--success-color);
        left: 0;
        top: 38px;
        width: 0%;
        transition: 0.3s;
    }

    .form-control input:focus~span {
        width: 100%;
    }

    .form-control.error small {
        color: var(--error-color);
    }

    .form-control.error input {
        border-bottom: 2px solid var(--error-color);
    }

    .btn-submit {
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

    .btn-submit:hover {
        background: #08609a;
    }

    .signup-link {
        text-align: center;
    }

    .signup-link a {
        color: var(--success-color);
        text-decoration: none;
        cursor: pointer;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
</style>