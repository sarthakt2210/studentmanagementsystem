<?php
include('databaseconfig.php');

$adpass = $_POST['adminpass'];
$query = "SELECT id FROM admin_pass WHERE passwords = '$adpass' ";
$result = mysqli_query($con,$query);
$admin_logged = $result->fetch_array()[0] ?? '';
$r = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['user']=$admin_logged;
    header('location: admindash.php?admin_logged_in='.$admin_logged);
}else{
    $_SESSION['status']="WRONG PASSWORD";
    $_SESSION['status_code']="warning";
    header('location: index.php?status=' .$_SESSION['status']);
}



?>