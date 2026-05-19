<?php
class auth
{
    protected $user = [
        "admin" => "123456",
        "my" => "123456"
    ];

    public function login()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (isset($this->user[$username]) && $this->user[$username] == $password) {
                $_SESSION['username'] = $username;
                header("Location: /home/index");
                exit();
            } else {
                unset($_SESSION['username']);
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
                header("Location: /home/login");
                exit();
            }
        }
    }
}
