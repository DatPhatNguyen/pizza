<?php
session_start();
$_SESSION['message'] = '';
$mysqli = mysqli_connect('localhost','root','','test');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['password'] === $_POST['confirmPassword']) {
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);

        $sql = "INSERT INTO users (username, email, password)" . "VALUES ('$username','$email','$password')";
        if($mysqli->query($sql) === true ) {
            $_SESSION['message'] = "Registration sucessful ! Add $username to database";
            header("Location: index.php");
        }
        else {
            $_SESSION['message'] = "User could't be add to the database !!";
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
    <style>
    .register-form {
        max-width: 560px;
        margin: 20px auto;
        padding: 30px;
        border: 1px solid #999;
    }
    </style>
</head>

<body>
    <?php include('./template/header.php') ?>
    <div class="container">
        <form action="register.php" class="register-form" method="post" enctype="multipart/form" autocomplete="off">
            <h1 class="text-center">Resigter</h1>
            <div class="alert alert-error"></div>
            <div class="mb-3">
                <label class="form-label">Your username:</label>
                <input type="text" placeholer="Enter your username" name="username" required="required"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Your email:</label>
                <input type="email" class="form-control" placeholer="Enter your email" name="email" required="required">
            </div>
            <div class="mb-3">
                <label class="form-label">Your passsword:</label>
                <input type="password" class="form-control" placeholer="Enter your password" autocomplete="new-password"
                    required="required" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm your passsword:</label>
                <input type="password" placeholder="Confirm your password" name="confirmPassword"
                    autocomplete="new-password" class="form-control" required="required">
            </div>
            <div class="text-center "><input type="submit" value="Register" name="register"
                    class="btn btn-block btn-primary w-50 mt-3">
            </div>
        </form>
    </div>
    <?php include('./template/footer.php') ?>

</body>

</html>