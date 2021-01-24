<?php

include "databaseconfig.php";


$adid = $_SESSION['update_marks_std_adid'];
$name = $_SESSION['update_marks_std_name'];

$english1 =(int)mysqli_real_escape_string($con,$_POST['english1']);
$hindi_maths1 = (int)mysqli_real_escape_string($con,$_POST['hindi_maths1']);
$cs_bio1 = (int)mysqli_real_escape_string($con,$_POST['cs_bio1']);
$physics1 = (int)mysqli_real_escape_string($con,$_POST['physics1']);
$chemistry1 = (int)mysqli_real_escape_string($con,$_POST['chemistry1']);

$english2 =(int)mysqli_real_escape_string($con,$_POST['english2']);
$hindi_maths2 = (int)mysqli_real_escape_string($con,$_POST['hindi_maths2']);
$cs_bio2 = (int)mysqli_real_escape_string($con,$_POST['cs_bio2']);
$physics2 = (int)mysqli_real_escape_string($con,$_POST['physics2']);
$chemistry2 = (int)mysqli_real_escape_string($con,$_POST['chemistry2']);

$percent = ($english1+$english2+$physics1+$physics2+$hindi_maths1+$hindi_maths2+$chemistry1+$chemistry2+$cs_bio1+$cs_bio2)/1000;
$percent = $percent*100;
$percent = number_format("$percent",2);

echo $percent;






$q ="UPDATE `marks` SET `adid`='$adid',
`name`='$name',
`english1`='$english1',
`english2`='$english2',
`hindi_maths1`='$hindi_maths1',
`hindi_maths2`='$hindi_maths2',
`cs_bio1`='$cs_bio1',
`cs_bio2`='$cs_bio2',
`physics1`='$physics1',
`physics2`='$physics2',`chemistry1`='$chemistry1',
`chemistry2`='$chemistry2',
`percentage`='$percent' WHERE adid='$adid' ";

$query = mysqli_query($con,$q);


echo mysqli_error($con);

unset($_SESSION['update_marks_std_adid']);
unset($_SESSION['update_marks_std_name']);

$_SESSION['marks_update_success']="MAKRS UPDATED SUCESSFULLY";

header("location: updatemarks.php?msg=MAKRS UPDATED SUCESSFULLY&name=$name&adid=$adid")




?>