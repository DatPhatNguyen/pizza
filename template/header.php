<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <header class="container-fluid header p-2">
        <div class="d-flex justify-content-around align-items-center">
            <a href="index.php" class="text-decoration-none  text-muted header-left d-flex align-items-center "
                style="font-size:25px">
                <img src="./images/pizza-logo.png" alt="" style="width:60px" name="header-image"> <span
                    class="text-uppercase font-weight-bold">Pizza</span>
            </a>
            <div class="header-right" id="nav">
                <a href="add.php" class="text-decoration-none  text-muted text-capitalize">add pizza</a>
                <a href="#our-menu" class="text-decoration-none header text-capitalize text-muted">Menu</a>
                <a href="#blog" class="text-decoration-none   header text-capitalize text-muted">Blog</a>
                <a href="#review-title" class="text-decoration-none  header text-capitalize text-muted">Review</a>
                <a href="order.php" class="text-decoration-none  header text-capitalize order text-muted">Order</a>

                <!-- <div class="header-right" id="nav">
                <a href="add.php" class="text-decoration-none  text-muted text-capitalize">add pizza</a>
                <a href="#our-menu" class="text-decoration-none header text-capitalize"
                    style="color:white;background: #ff6b6b; border-radius:20px; padding:8px 14px;">Menu</a>
                <a href="#blog" class="text-decoration-none   header text-capitalize"
                    style="color:white;background: #2e86de; border-radius:20px; padding:8px 14px;">Blog</a>
                <a href="#review-title" class="text-decoration-none  header text-capitalize"
                    style="color:white;background: #f368e0; border-radius:20px; padding:8px 14px;">Review</a>
                <a href="order.php" class="text-decoration-none  header text-capitalize order"
                    style="color:white;background: #10ac84; border-radius:20px; padding:8px 14px;">Order</a> -->
                <!-- <a href="registration.php" class="text-decoration-none text-muted header text-capitalize"
                    style="font-size:25px;"><i class="fa-solid fa-user" style="margin-right:10px;"></i>Registration</a> -->
                <?php
if (isset($_SESSION['username'])) {
    echo "<a href='./logout.php' style='font-size:25px;' class='text-decoration-none  text-muted header text-capitalize'>Log Out</a>";
} else {
    echo "<a href='./login.php' style='font-size:25px;' class='text-decoration-none  text-muted header text-capitalize'>Log In</a>";
    echo "<a href='./registration.php' style='font-size:25px;' class='text-decoration-none  text-muted header text-capitalize'>Registration</a>";
}
?>
                <!-- <a href="login.php" class="text-decoration-none text-danger header text-capitalize"
                    style="font-size:25px;"><i class="fa-solid fa-user " style="margin-right:10px;"></i>Login</a> -->
            </div>
            <div class=" header-hide">
                <i class="fa-solid fa-bars bar" id="bar"></i>
            </div>
            <!-- <div class="header-register">
                <a href="register.php" class="text-decoration-none  text-muted header text-capitalize"
                    style="font-size:25px;"><i class="fa-solid fa-user" style="margin-right:10px;"></i>Register</a>
            </div> -->
        </div>
    </header>
</body>
<script src="./script.js"></script>

</html>