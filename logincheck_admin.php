<?php
include('databaseconfig.php');

$adpass = $_POST['adminpass'];
$query = "SELECT id FROM admin_pass WHERE passwords = '$adpass' ";
$result = mysqli_query($con,$query);
$admin_logged = $result->fetch_array()[0] ?? '';
$r = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['user']=$admin_logged;
    $query = "SELECT id2 FROM admin_pass WHERE passwords = '$adpass' ";
    $result = mysqli_query($con,$query);
    $r = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    echo $r['id2'];
    if($r['id2'] == "MASTER"){
        echo"master";
        header('location: ./masteradmin/admindash.php?admin_logged_in='.$_SESSION['user']);
    }else{
        header('location: ./admin/admindash.php?admin_logged_in='.$admin_logged);
    }
}else{
    $_SESSION['status']="WRONG PASSWORD";
    $_SESSION['status_code']="warning";
    header('location: index.php?status=' .$_SESSION['status']);
}



?>