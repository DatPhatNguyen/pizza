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
    <header class="container-fluid header p-1">
        <div class="d-flex justify-content-around align-items-center">
            <a href="index.php" class="text-decoration-none  text-muted header-left d-flex align-items-center "
                style="font-size:25px">
                <img src="./images/pizza-logo.png" alt="" style="width:60px" name="header-image"> <span
                    class="ml-2">Pizza</span>
            </a>
            <div class="header-right" id="nav">
                <a href="add.php" class="text-decoration-none  text-muted text-capitalize p">add pizza</a>
                <a href="#our-menu" class="text-decoration-none  text-muted header text-capitalize">Menu</a>
                <a href="#blog" class="text-decoration-none  text-muted header text-capitalize">Blog</a>
                <a href="#review-title" class="text-decoration-none  text-muted header text-capitalize">Review</a>
            </div>
            <div class="header-hide">
                <i class="fa-solid fa-bars bar" id="bar"></i>
            </div>
        </div>
    </header>
</body>
<script src="./script.js"></script>


</html>