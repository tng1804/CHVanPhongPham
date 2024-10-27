<?php
class Login extends Controller
{
    public function login()
    {
        $this->view("login", []);
        $loginModel = $this->model("LoginModel");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['pass'];

            $loginModel->login($email, $password);
        }
    }
    
}
