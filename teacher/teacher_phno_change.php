<?php
include 'databaseconfig.php';
$new_phno=$_POST['phno'];

$pass = $_SESSION['teacher_pass'];
$username = $_SESSION['userid'];


$q = "UPDATE teacher SET phone_no='$new_phno' WHERE userid='$username' AND password='$pass'";
$query = mysqli_query($con,$q);


echo mysqli_error($con);

$_SESSION['update_phno']="EMAIL UPDATED";
header("location: myaccount.php?msg=EMAIL UPDATED&phno=$new_phno");

?>