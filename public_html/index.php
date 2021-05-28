<?php
include_once('../models/dbFunction.php');

$funObj = new dbFunction();
if ($_SESSION['login']){
    header("location:home.php");
}
if (isset($_POST['login']) && $_POST['login']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $funObj->Login($email, $password);
    if ($user) {
        header("location:home.php");
    } else {
        echo "<script>alert('email / Password Not Match')</script>";
    }
}
if (isset($_POST['register']) && $_POST['register']) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if ($password == $confirmPassword) {
        $emailCheck = $funObj->isUserExist($email);
        if (!$emailCheck) {
            $register = $funObj->UserRegister($username, $email, $password);
            if ($register) {
                echo "<script>alert('Registration Successful')</script>";
            } else {
                echo "<script>alert('Registration Not Successful')</script>";
            }
        } else {
            echo "<script>alert('Email Already Exist')</script>";
        }
    } else {
        echo "<script>alert('Password Not Match')</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Login and Registration Form with HTML5 and CSS3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="web/css/style.css">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="confirm_password" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="register" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="web/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="web/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="login" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</div>


<script src='web/vendor/jquery/jquery.min.js'></script>
<script src='web/js/main.js'></script>
</body>
</html>