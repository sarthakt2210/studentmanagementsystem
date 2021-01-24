<?php
include 'databaseconfig.php';
$adid = $_GET['adid'];

$select_teach_query = "SELECT * FROM student WHERE adid='$adid' ";
$query=mysqli_query($con,$select_teach_query);
$result_teacher = mysqli_fetch_assoc($query);

$image=$result_teacher['profile'];
$deletequery = "DELETE FROM student WHERE adid='$adid' ";

$name = $result_teacher['name'];
$query123 = mysqli_query($con,$deletequery);

$deletequery12 = "DELETE FROM marks WHERE adid='$adid' ";
$query1234 = mysqli_query($con,$deletequery12);


echo mysqli_error($con);

echo $image;

if($query123){
    unlink($image);
    $_SESSION['delete']="DELETE SECESSFULLY";
    header("location: managestudent.php?adid=$adid&name=$name");    
}



?>