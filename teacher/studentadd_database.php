<?php

include 'databaseconfig.php';
$name =mysqli_real_escape_string($con,$_POST['name']);
$adid = mysqli_real_escape_string($con,$_POST['adid']);
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$mname = mysqli_real_escape_string($con,$_POST['mname']);
$dob = mysqli_real_escape_string($con,$_POST['dob']);
$phno = mysqli_real_escape_string($con,$_POST['phno']);
$email = mysqli_real_escape_string($con,$_POST['email']);


$profile = $_FILES['profile'];

print_r($profile);
echo"<br>";

$filename = $profile['name'];
$fileerror = $profile['error'];
$filelocation = $profile['tmp_name'];

if($fileerror == 4){
    
    $_SESSION['messageprofile']="PROFILE NOT FOUND";
    header("location: addstd_reload.php?messageprofile=PROFILE NOT FOUND&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email");
}



$file_extension=explode('.',$filename);
$filecheck = strtolower(end($file_extension));
echo $filecheck;

$file_ext_valid = array('png','jpg','jpeg');

if(in_array($filecheck,$file_ext_valid)){
    $std_check_query = "SELECT `adid` FROM student WHERE adid = '$adid' ";
    $check_std_result = mysqli_query($con,$std_check_query);
    // $teacher_already_exist = $check_std_result->fetch_array()[0] ?? '';
    // $r = mysqli_fetch_array($check_teach_result);
    $num = mysqli_num_rows($check_std_result);

    if($num != 0){
        $_SESSION['already_exist_adid']=$adid;
        header("location: addstd_reload.php?message=ADMISSION ALREADY EXIST&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");


    }else{
        echo"done done";
        $destination = "../student_profile/".$filename;
        move_uploaded_file($filelocation,$destination);
        echo $destination;
        $query1234 = "INSERT INTO `marks`(`adid`, `name`) VALUES ('$adid','$name')";
        $q1 = mysqli_query($con,$query1234);
        echo mysqli_error($con);
        
        $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name','$adid','$dob','$fname','$mname','$phno','$email','$destination')";
        $q = mysqli_query($con,$query123);
        echo mysqli_error($con);
        if($q){
            echo"vnbfdsbnvgd";
        }

        $_SESSION['std_add_sucess']="STUDENT ADDED SUCESSFULLY";
        $_SESSION['std_name']=$name;
        header("location: addstudent.php?meaasge=STUDENT ADDED SUCESSFULLY $name");


    }
    


    

}else{
    $_SESSION['invalid_ext']="INVALID EXTENSION OF PROFILE";
    $_SESSION['file']=$profile;
    header("location: addstd_reload.php?messageprofile=INVALID FILE EXTENSION&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");
}


?>