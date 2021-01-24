<?php
include 'databaseconfig.php';
$new_email=$_POST['email'];

$pass = $_SESSION['teacher_pass'];
$username = $_SESSION['userid'];


$q = "UPDATE teacher SET email='$new_email' WHERE userid='$username' AND password='$pass'";
$query = mysqli_query($con,$q);


echo mysqli_error($con);

$_SESSION['update_email']="EMAIL UPDATED";
header("location: myaccount.php?msg=EMAIL UPDATED&email=$new_email");

?>