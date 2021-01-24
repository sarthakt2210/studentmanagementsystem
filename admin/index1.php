<?php

session_start();

if(isset($_SESSION['userid'])){
    $_SESSION['msg']="YOU ARE NOT REGISTERED AS A TEACHER FOR THIS INSTITIUTION";
    header("loaction :index.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['userid']);
    header('location : index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    SDFGHGFD
    <?php
    if(isset($_SESSION['success'])); ?>
    <p>this is me sarthak</p>

    

    <button><a href="index.php?logout='1'"> back to login</a></button>






</body>
</html>