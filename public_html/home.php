<?php
include_once('../models/dbFunction.php');

$funObj = new dbFunction();
if (isset($_POST['logout']) && $_POST['logout']) {
   $funObj->logout();
    header("location:index.php");

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

<div class="container">
    <h1 align="center" >Welcome home page</h1>

    <form method="POST" class="register-form" id="register-form" action="">
        <input type="submit" value="log out" name="logout" class="form-submit">
    </form>
</div>

<script src='web/vendor/jquery/jquery.min.js'></script>
<script src='web/js/main.js'></script>
</body>
</html>