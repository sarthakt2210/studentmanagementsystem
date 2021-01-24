<?php
include('databaseconfig.php');

$userid = $_POST['userid'];
$pass = $_POST['password'];
$query = "SELECT name FROM teacher WHERE password = '$pass' AND userid = '$userid' ";
$result = mysqli_query($con,$query);
$teacher_logged = $result->fetch_array()[0] ?? '';
$r = mysqli_fetch_assoc($result);

$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['user']=$teacher_logged;
    $_SESSION['userid']=$userid;
    $_SESSION['teacher_pass']=$pass;
    echo $_SESSION['user'];
    header("location: teacher/teacherdash.php?TeacherID=$teacher_logged");
   
}else{
    $_SESSION['status1']="WRONG PASSWORD";
    $_SESSION['status_code']="warning";
    header('location: index.php?status=' .$_SESSION['status']);
}



?>