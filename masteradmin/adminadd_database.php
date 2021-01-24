<?php

include 'links.php';
include 'databaseconfig.php';
$name12 =mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['password']);
echo $name12;
$name = "ADMIN ".strtoupper($name12);
echo $name;
echo $password;

$teach_check_query = "SELECT passwords FROM admin_pass WHERE passwords = '$password' ";
$check_teach_result = mysqli_query($con,$teach_check_query);
$teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
$r = mysqli_fetch_assoc($check_teach_result);
$num = mysqli_num_rows($check_teach_result);

echo $num;
if($num != 0){
   header("location: reload_admin_add.php?name=$name12&password=$password");

}else{
    $query = "INSERT INTO `admin_pass`(`id`, `passwords`) VALUES ('$name','$password')";
    $result = mysqli_query($con,$query);
    $message = "New Admin is added";
    $_SESSION["success"]="ADMIN ADDED SUCESSFULLY";
    $_SESSION['newadmin'] =$name;
    header('location: adminadd.php?result='.$message); 
}


?>