<?php
include './config/db_connect.php';
$error = false;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $username = strip_tags($username);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $confirmPassword = $_POST['confirmPassword'];
    $confirmPassword = strip_tags($confirmPassword);
    $confirmPassword = htmlspecialchars($password);

    $password = md5($password);
    $confirmPassword = md5($confirmPassword);
    if (empty($username)) {
        $error = true;
        $errorUsername = 'Please fill in username field..';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $errorEmail = "Please fill in email field!";
    }
    if (empty($password)) {
        $error = true;
        $errorPassWord = "Please fill in password field!";
    }
    if (empty($confirmPassword)) {
        $error = true;
        $errorConfirmPassword = "Please reconfirm password! ";
    }
    if ($password != $confirmPassword) {
        $error = true;
        echo '<p>Password did not match! </p>';
    }
    // $password = md5($password);
    $sqlEmail = "SELECT * FROM users WHERE email = '$email'";
    $queryEmail = mysqli_query($conn, $sqlEmail);
    $sql1 = "INSERT into users (username,email, password) values ('$username','$email','$password')";
    if (mysqli_num_rows($queryEmail) > 0) {
        $error = false;
        echo '<script type="text/JavaScript">
            alert("Email already use");
        </script>';

    }
    if (!$error) {
        $sql = "Insert into users (username,email,password) values ('$username','$email','$password')";
        if (mysqli_query($conn, $sql)) {
            $successMessage = 'Register successfully, <a href="./login.php" class="text-info">click here to Log In</a>';
        }
        // } else if (!mysqli_query($conn, $sql)) {
        //     $failRegisterMessage = 'Register failed, try again!'; }
        // } else {
        //     echo 'Error: ' . mysqli_error($conn);
        // }
        $sql = "Insert into users (username,email,password) values ('$username','$email','$password')";
        if (mysqli_query($conn, $sql) === false) {
            $failRegisterMessage = 'Register failed, try again!';
        }
    }
}
mysqli_close($conn);
?>


<!-- // if (isset($_POST["submit"])) {
// $name = $_POST['name'];
// $email = $_POST['email'];
// $username = $_POST['uid'];
// $password = $_POST['password'];
// $confirmPassword = $_POST['confirmPassword'];
// require_once "./config/db_connect.php";
// require_once "./function.inc.php";
// if (emptyInputSignup($name, $email, $username, $password, $confirmPassword) !== false) {
// header("location: ./registration.php?error=emptyinput");
// exit();
// }
// if (invalidUid($username) !== false) {
// header("location: ./registration.php?error=invaliduid");
// exit();
// }
// if (invalidEmail($email) !== false) {
// header("location: ./registration.php?error=invalidemail");
// exit();
// }
// if (passwordMatch($password, $confirmPassword) !== false) {
// header("location: ./registration.php?error=passwordsdontmatch");
// exit();
// }
// if (uidExists($conn, $username, $email) !== false) {
// header("location: ./registration.php?error=usernametaken");
// exit();
// }
// createUser($conn, $name, $email, $username, $password);
// } else {

// }
//  -->

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
    <?php include './template/header.php'?>;
    <div class="container bg-light p-3 my-2">
        <form action="registration.php" class="registration-form" method="post" enctype="multipart/form"
            autocomplete="off">
            <h1 class="text-center font-weight-bold" style="margin-bottom:-15px; color:#422465;">
                Registration </h1>
            <?php
if (isset($successMessage)) {
    ?>
            <div class=" text-center alert alert-success mb-2 mt-4  mx-auto" style="width:90%px; color:black;">
                <?php echo $successMessage;
    ?>
            </div>
            <?php
}
?>
            <?php if (isset($failRegisterMessage)) {
    ?>
            <div class=" text-center alert alert-danger mb-2 mt-4  mx-auto" style="width:90%px; color:black;">
                <?php echo $failRegisterMessage;
    ?> </div>
            <?php
}
?>
            <!-- <div class="mb-4">
                <label class="form-label" style="color:#422465;">Full name:</label>
                <input type="text" name="name" required="required" class="form-control p-3" placeholder="Full name..:">
            </div> -->
            <div class="mb-4 mt-5">
                <label class="form-label" style="color:#422465; font-size:17px; font-weight:500;">Username:</label>
                <input type="text" class="form-control p-3" placeholder="Username.." name="username">
                <p class="text-danger"><?php if (isset($errorUsername)) {
    echo $errorUsername;
}
?></p>
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465; font-size:17px; font-weight:500;">Email:</label>
                <input type="email" class="form-control p-3" placeholder="Email.." name="email">
                <p class="text-danger"><?php if (isset($errorEmail)) {
    echo $errorEmail;
}
?></p>
            </div>

            <div class="mb-4">
                <label class="form-label" style="color:#422465; font-size:17px; font-weight:500;">Passsword:</label>
                <input type="password" class="form-control p-3" placeholder="Password" name="password">
            </div>
            <p class="text-danger"><?php if (isset($errorPassWord)) {
    echo $errorPassWord;
}
?></p>
            <div class="mb-3">
                <label class="form-label" style="color:#422465; font-size:17px; font-weight:500;">Confirm
                    passsword:</label>
                <input type="password" placeholder="Confirm password.." name="confirmPassword" class="form-control p-3">
            </div>
            <p class="text-danger"><?php if (isset($errorConfirmPassword)) {
    echo $errorConfirmPassword;
}
?></p>
            <div class="text-center ">
                <button type="submit" value="Register" name="submit"
                    class="btn btn-block btn-primary w-50 mt-3 rounded">Register</button>
            </div>
            <div class="text-center text-capitalize mt-3">
                Alreay have an account.
                <a href="login.php" class="text-primary">Login</a>
            </div>
        </form>
    </div>
    <?php
// if (isset($_GET["error"])) {
//     if ($_GET['error'] == "emptyinput") {
//         echo "<p>Fill in all fields!</p>";
//     } else if ($_GET["error"] == "invalidUid") {
//         echo "<p>Choose a proper username!</p>";
//     } else if ($_GET["error"] == "invalidemail") {
//         echo "<p>Choose a proper email!</p>";
//     } else if ($_GET["error"] == "passwordsdontmatch") {
//         echo "<p>Password doesn't match!</p>";
//     } else if ($_GET["error"] == "stmtfailed") {
//         echo "<h2>Something went wrong, try again! </h2>";
//     } else if ($_GET["error"] == "usernametaken") {
//         echo "<p>Username alreay taken!</p>";
//     } else if ($_GET["error"] == "none") {
//         echo "<p>You have signed up!</p>";
//     }
// }
// ?>
    <?php include './template/footer.php'?>;
</body>

</html>