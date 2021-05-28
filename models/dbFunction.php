<?php
require_once '../config/config.php';
session_start();
class dbFunction {
    private $conn;
    public function __construct()
    {
        $this->conn =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);
        if (!$this->conn) {
            die("Connection failed: ");
        }
    }

    public function UserRegister($username, $email, $password){
        $password = md5($password);
        $qr = mysqli_query($this->conn,"INSERT INTO users(username, email, password) VALUES ('".$username."','".$email."','".$password."')") or die(mysqli_error($this->conn));
        return $qr;

    }
    public function Login($email, $password){
        $res = mysqli_query($this->conn,"SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'");
        $user_data = mysqli_fetch_array($res);
        $no_rows = mysqli_num_rows($res);
        if ($no_rows == 1)
        {
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            return true;
        }
        else
        {
            return false;
        }
    }

    public function logout()
    {
        $_SESSION['login'] = false;
    }
    public function isUserExist($email){
        $qr = mysqli_query($this->conn,"SELECT * FROM users WHERE email = '".$email."'");
        $row = mysqli_num_rows($qr);
        if($row > 0){
            return true;
        } else {
            return false;
        }
    }
}
?>