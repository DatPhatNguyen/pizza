<link rel="stylesheet" href="register.php">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php session_start(); 
error_reporting(0);
include('./template/header.php');?>
<div class="container p-5">
    <div class="welcome">
        <div class="alert alert-success"><?php echo 'Login is successful !!' ?> </div>
        <span class="welcom-user">
            <span class="user">Welcome<?php echo 'Back' ?></span>
        </span>
        <?php
        $mysqli = mysqli_connect('localhost','root','','test');
        $sql = 'SELECT username from users';
        $result = $mysqli->query($sql);
        ?>
    </div>
    <div id="registerded">
        <span>Users:</span>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<ul class='userlist list-unstyled'><li>$row[username]</li></ul>";
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