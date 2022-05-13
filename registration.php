<?php
// session_start();
// $_SESSION['message'] = '';
// $mysqli = mysqli_connect('localhost','root','','test');
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if($_POST['password'] == $_POST['confirmPassword']) {
//         $username = $mysqli->real_escape_string($_POST['username']);
//         $email = $mysqli->real_escape_string($_POST['email']);
//         $password = ($_POST['password']);
//         $_SESSION['user'] = $username;
//          $sql = "INSERT INTO users (username, email, password)" . "VALUES ('$username','$email','$password')";
//         if($mysqli->query($sql)) {
//             $_SESSION['message'] = "Registration is sucessful ! Added $username to database!";
//             header("location: welcome.php");
//         }
//         else {
//             $_SESSION['message'] = "User couldn't be add to the database !!";
//         }
//     }
//     else {
//         $_SESSION['message'] = "Two password does not match";
//     }
// }
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    require_once "./config/db_connect.php";
    require_once "./function.inc.php";
    if (emptyInputSignup($name, $email, $username, $password, $confirmPassword) !== false) {
        header("location: ./registration.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ./registration.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ./registration.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $confirmPassword) !== false) {
        header("location: ./registration.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ./registration.php?error=usernametaken");
        exit();
    }
    createUser($conn, $name, $email, $username, $password);
} else {

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
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <?php include './template/header.php'?>;
    <div class="container bg-light p-3 my-2">
        <form action="registration.php" class="registration-form" method="post" enctype="multipart/form"
            autocomplete="off">
            <h2 class="text-center font-weight-bold" style="margin-bottom:-15px; color:#422465;">
                Registration </h2>
            <div class="alert alert-error"></div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Full name:</label>
                <input type="text" name="name" required="required" class="form-control p-3" placeholder="Full name..:">
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Email:</label>
                <input type="email" class="form-control p-3" placeholder="Email.." name="email">
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Username:</label>
                <input type="text" class="form-control p-3" placeholder="Username.." name="uid">
            </div>
            <div class="mb-4">
                <label class="form-label" style="color:#422465;">Passsword:</label>
                <input type="password" class="form-control p-3" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label" style="color:#422465;">Confirm passsword:</label>
                <input type="password" placeholder="Confirm password.." name="confirmPassword" class="form-control p-3">
            </div>
            <div class="text-center ">
                <button type="submit" value="Register" name="submit"
                    class="btn btn-block btn-primary w-25 mt-3 rounded">Registration</button>
            </div>
            <div class="text-center text-capitalize mt-3">
                Alreay have an account.
                <a href="login.php" class="text-primary">Login</a>
            </div>
        </form>

        <?php
if (isset($_GET["error"])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET["error"] == "invalidUid") {
        echo "<p>Choose a proper username!</p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Password doesn't match!</p>";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "<h2>Something went wrong, try again! </h2>";
    } else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username alreay taken!</p>";
    } else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }
}
?>
    </div>


    <?php include './template/footer.php'?>
</body>

</html>