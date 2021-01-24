<?php

session_start();
$con = mysqli_connect('localhost','root','','management');
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

if($num != 0){
   header("location: reload.php?name=$name&userid=$userid&password=$password&age=$age&phno=$phno&email=$email");

}else{
    $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$userid','$password','$age','$phno','$email')";
    $result = mysqli_query($con,$query);
    $message = "New Teacher is added";
    $_SESSION["success"]="TEACHER ADDED SUCESSFULLY";
    $_SESSION['newteacher'] ="Teacher  ". $name;
    header('location: teacheradd.php?result='.$message); 
}


?>