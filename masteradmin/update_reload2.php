<?php
include 'databaseconfig.php';
$name =mysqli_real_escape_string($con,$_POST['name']);
$userid = mysqli_real_escape_string($con,$_POST['userid']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$age = mysqli_real_escape_string($con,$_POST['age']);
$phno = mysqli_real_escape_string($con,$_POST['phno']);
$email = mysqli_real_escape_string($con,$_POST['email']);


$teach_check_query = "SELECT userid FROM teacher WHERE password = '$password' AND userid = '$userid' ";
$check_teach_result = mysqli_query($con,$teach_check_query);
$teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
$r = mysqli_fetch_array($check_teach_result);
$num = mysqli_num_rows($check_teach_result);
$updateid = $_SESSION['updating_teacher'];
$updatepass = $_SESSION['updating_teacher_pass'];
if($num != 0){
    header("location: update_reload.php?userid=$userid&password=$password&name=$name&age=$age&phno=$phno&email=$email" );

}else{
    $query = "UPDATE teacher SET name='$name' ,userid='$userid',password='$password',age='$age',email='$email' WHERE userid='$updateid' AND password='$updatepass' ";
    $result = mysqli_query($con,$query);
    $message = "Teacher update";
    $_SESSION['update']="SUCCESS";
    unset($_SESSION['updating_teacher']);
    unset($_SESSION['updating_teacher_pass']);
    header("location: manageteacher.php?result=$message&name=$name");
}



?>
