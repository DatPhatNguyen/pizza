<?php
session_start();
$_SESSION['message'] = '';
$mysqli = mysqli_connect('localhost','root','','test');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['password'] == $_POST['confirmPassword']) {
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = ($_POST['password']);
        $_SESSION['user'] = $username;
         $sql = "INSERT INTO users (username, email, password)" . "VALUES ('$username','$email','$password')";
        if($mysqli->query($sql)) {
            $_SESSION['message'] = "Login is sucessful ! Welcomback $username";
            header("location: welcomeBack.php"); 
        }
        else {
            $_SESSION['message'] = "Invalid user!!";
        }
    }
    else {
        $_SESSION['message'] = "Two password does not match";
    }
}
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
</head>

<body>
    <?php include('./template/header.php') ?>;
    <div class="container bg-light p-3 my-2">
        <form action="register.php" class="register-form" method="post" enctype="multipart/form" autocomplete="off">
            <h1 class="text-center" style="margin-bottom:-25px">Login</h1>
            <div class="alert alert-error"></div>
            <div class="mb-3">
                <label class="form-label">Your username:</label>
                <input type="text" name="username" required="required" class="form-control p-3"
                    placeholder="Enter your username:">
            </div>
            <div class="mb-3">
                <label class="form-label">Your email:</label>
                <input type="email" class="form-control p-3" placeholder="Enter your email" name="email"
                    required="required">
            </div>
            <div class="mb-3">
                <label class="form-label">Your passsword:</label>
                <input type="password" class="form-control p-3" placeholder="Enter your password"
                    autocomplete="new-password" required="required" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm your passsword:</label>
                <input type="password" placeholder="Confirm your password" name="confirmPassword"
                    autocomplete="new-password" class="form-control p-3" required="required">
            </div>
            <div class="text-center "><input type="submit" value="Register" name="register"
                    class="btn btn-block btn-primary w-50 mt-3 rounded-pill">
            </div>
            <div class="text-center text-capitalize mt-3">
                Dont have an account yet !!
                <a href="register.php" class="text-primary">Register</a>
            </div>
        </form>
    </div>
    <?php include('./template/footer.php') ?>

</body>

</html>