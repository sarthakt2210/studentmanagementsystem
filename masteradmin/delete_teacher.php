<?php
include 'databaseconfig.php';
$id = $_GET[ 'id'];
$pass = $_GET['password'];
$deletequery = "DELETE FROM teacher WHERE userid='$id' AND password='$pass' ";

$query = mysqli_query($con,$deletequery);

if($query){
    $_SESSION['delete']="DELETE SECESSFULLY";
    header("location: manageteacher.php?id=$id");

    
}



?>