<?php
session_start();
// if (isset($_POST['submit'])) {
// $username = $_POST['uid'];
// $password = $_POST['password'];
// require_once "./config/db_connect.php";
// require_once "./function.inc.php";
// if (emptyInputLogin($username, $password) !== false) {
// header("location: ./login.php?error=emptyinput");
// exit();
// }
// loginUser($conn, $username, $password);
// } else {
// header("location: ./login.php");
// exit();
// }
$error = false;
include './config/db_connect.php';
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = htmlspecialchars($password);

    if (empty($email)) {
        $error = true;
        $errorEmail = "Please fill in email field!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $errorEmail = "Please fill a valid email address!";
    }
    if (empty($password)) {
        $error = true;
        $errorPassWord = "Please fill in password field!";
    }
    if (!$error) {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email ='$email'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($count == 1 && $row['password'] == $password) {
            $_SESSION['username'] = $row['username'];
            echo '<script type="text/JavaScript">
            localStorage.setItem("name", "logined");
            alert(localStorage.getItem("name"));
            </script>';
            header('location: ./index.php');
        } else {
            $errorMessage = "Invalid Username or Password!";
        }
    }
}
mysqli_close($conn);
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
    <?php include './template/header.php';?>;
    <div class="container bg-light p-3 my-2">
        <form action="login.php" class="login-form" method="post" enctype="multipart/form" autocomplete="off">
            <h1 class="text-center font-weight-bold mb-3" style="color:#422465;">Log In
            </h1>
            <?php
if (isset($errorMessage)) {
    ?>
            <div class=" text-center alert alert-success mb-2 mt-4  mx-auto" style="width:90%px; color:black;">
                <?php echo $errorMessage;
    ?>
            </div>
            <?php
}
?>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Username/Email:</label>
                <input type="text" name="email" class="form-control p-3" placeholder="Username/email..">
                <p class="text-danger"><?php if (isset($errorEmail)) {
    echo $errorEmail;
}
?></p>
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Your passsword:</label>
                <input type="password" class="form-control p-3" placeholder="Password.." name="password">
                <p class="text-danger"><?php if (isset($errorEmail)) {
    echo $errorPassWord;
}
?></p>
            </div>
            <div class="text-center"><button type="submit" value="Log In" name="submit"
                    class="btn btn-block btn-primary w-50 mt-3 rounded">Log In</button>
            </div>
            <div class="text-center text-capitalize mt-4 mb-3">
                Dont have an account yet !!
                <a href="registration.php" class="text-primary">Registration</a>
            </div>
        </form>
        <?php
if (isset($_GET["error"])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information</p>";
    }
}
?>
    </div>


    <?php include './template/footer.php'?>
<script>
    if(typeof(localStorage) !== "undefined") {
        localStorage.clear();
        //localStorage.setItem("name", "logined");
    }
    alert(localStorage.getItem('name'));
</script>
</body>

