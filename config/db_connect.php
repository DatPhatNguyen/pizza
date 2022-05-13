<?php
// connect to database
$conn = mysqli_connect('localhost','root','','test');
    //check connection
    if(!$conn) {
        die('Connection error'  . mysqli_connect_error());
    }
?>