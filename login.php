<?php
session_start();
$_SESSION['message'] = '';
$mysqli = mysqli_connect('localhost','root','','test');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php include('./template/header.php');?>;
    <div class="container bg-light p-3 my-2">
        <form action="register.php" class="login-form" method="post" enctype="multipart/form" autocomplete="off">
            <h1 class="text-center font-weight-bold" style="margin-bottom:-15px;color:#422465;">Log In Form
            </h1>
            <div class="alert alert-error"></div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Your username:</label>
                <input type="text" name="username" required class="form-control p-3"
                    placeholder="Enter your username/email..">
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Your passsword:</label>
                <input type="password" class="form-control p-3" placeholder="Enter your password" required
                    name="password">
            </div>
            <div class="text-center"><input type="submit" value="Register" name="register"
                    class="btn btn-block btn-primary w-25 mt-3 rounded">
            </div>
            <div class="text-center text-capitalize mt-4">
                Dont have an account yet !!
                <a href="registration.php" class="text-primary">Register</a>
            </div>
        </form>
    </div>
    <?php include('./template/footer.php') ?>

</body>