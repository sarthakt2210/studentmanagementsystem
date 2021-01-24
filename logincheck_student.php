<?php
include('databaseconfig.php');

echo mysqli_error($con);


$adid = $_POST['adid'];

$query = "SELECT name FROM student WHERE adid='$adid' ";
$result = mysqli_query($con,$query);
$teacher_logged = $result->fetch_array()[0] ?? '';
$r = mysqli_fetch_assoc($result);

$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['user']=$teacher_logged;
    echo $_SESSION['user'];
    header("location: student/studentdash.php?StudentID=$adid");
   
}else{
    $_SESSION['status_student']="WRONG ADMISSION CODE";
    $_SESSION['status_code']="warning";
    header('location: index.php?status=' .$_SESSION['status']);
}



?>