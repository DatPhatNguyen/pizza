<?Php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src='script.js'>
    document.ready(function () {
        if(typeof(localStorage) !== "undefined") {
            localStorage.clear();
            localStorage.removeItem('name');
            alert(localStorage.getItem('name'));
        }
    });
    
</script>
</body>

<?php
session_start();
session_unset();
session_destroy();
header("location: index.php");
exit();
?>

    


