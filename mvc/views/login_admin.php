<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel ="stylesheet" href ="style.css" />
</head>
<body>
    <div class = "container">
        <form method ="POST">
            <h1>Login Admin</h1>
            <div class="form-control ">
                <input name="email" id ="email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>
        
            <div class="form-control ">
                <input id="password" name ="password" type="password" placeholder ="Password" >
                <span></span>
                <small></small>
            </div>
            <button type = "submit" name ="btn-submit-dangnhap" class = "btn-submit">Login</button>
            
        </form>
    <?php
    
?>
    </div>
</body>
<script src="app.js"></script>
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