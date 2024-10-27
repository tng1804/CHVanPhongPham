<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <form method="POST" id="loginForm">
            <h1>Login Form</h1>
            <div class="form-control">
                <input name="email" id="email" type="email" placeholder="Email" required>
                <span></span>
                <small></small>
            </div>

            <div class="form-control">
                <input id="pass" name="pass" type="password" placeholder="Password" required>
                <span></span>
                <small></small>
            </div>
            <button type="submit" class="btn-submit">Login</button>
            <div class="signup-link">
                Not a member? <a href="/CHVanPhongPham/TaiKhoan/addTK">Create Account</a>
            </div>
        </form>
        <div class="signup-link">
            <a href="forgotPassword.php">Forgot password?</a>
        </div>
    </div>


</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(120deg, #3ca7ee, #9b408f);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-control {
        margin-bottom: 20px;
        position: relative;
    }

    .form-control input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
    }

    .form-control input:focus {
        border-color: #3ca7ee;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #3ca7ee;
        color: white;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background: #2a8cc1;
    }

    .signup-link {
        text-align: center;
        margin-top: 10px;
    }

    .signup-link a {
        color: #3ca7ee;
        text-decoration: none;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
</style>