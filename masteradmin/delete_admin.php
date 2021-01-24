<?php
include 'databaseconfig.php';
$id = $_GET[ 'id'];
$pass = $_GET['password'];
$deletequery = "DELETE FROM admin_pass WHERE id='$id' AND passwords='$pass' ";

$query = mysqli_query($con,$deletequery);

if($query){
    $_SESSION['delete']="DELETE SECESSFULLY";
    header("location: manageadmin.php?id=$id");

    
}
