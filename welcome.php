<link rel="stylesheet" href="register.php">
<?php session_start(); 
error_reporting(0);
include('./template/header.php');?>
<div class="container p-5">
    <div class="welcome">
        <div class="alert alert-success"><?php echo 'Registration is successful !!' ?> </div>
        <span class="welcom-user">
            <span class="user">Welcome<?php echo ' New user' ?></span>
        </span>
        <?php
        $mysqli = mysqli_connect('localhost','root','','test');
        $sql = 'SELECT username from users';
        $result = $mysqli->query($sql);
        ?>
    </div>
    <div id="registerded">
        <span>Users registered: </span>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<ul class='userlist'><li>$row[username]</li></ul>";
            }
        ?>
    </div>
</div>
<?php
    include('./template/footer.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .welcome {
        margin-top: 3rem;
    }
    </style>
</head>

<body>

</body>

</html>