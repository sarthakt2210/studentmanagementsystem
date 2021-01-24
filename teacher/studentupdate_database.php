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

$file_ext_valid = array('png','jpg','jpeg');


$filename = $profile['name'];
$fileerror = $profile['error'];
$filelocation = $profile['tmp_name'];

if($fileerror == 4){
    $profile_update = 0;
    
}else{
    $profile_update = 1;
};


if($profile_update == 1){
    $file_extension=explode('.',$filename);
    $filecheck = strtolower(end($file_extension));
    echo $filecheck;
    if(in_array($filecheck,$file_ext_valid)){
        $adid1 =$_SESSION['update_std_adid'];

        $std_check_query = "SELECT * FROM student WHERE adid = '$adid1' ";
        $check_std_result = mysqli_query($con,$std_check_query);
        $num = mysqli_num_rows($check_std_result);
        $r = mysqli_fetch_assoc($check_std_result);
        $name12 = $r['name'];
        $adid12 = $r['adid'];
        $fname12 = $r['fname'];
        $dob12 = $r['dob'];
        $mname12 = $r['mname'];
        $phno12 = $r['phno'];
        $email12 = $r['email'];
        $profile12 = $r['profile'];

        $select_teach_query = "DELETE FROM STUDENT where adid='$adid1' ";
        $query=mysqli_query($con,$select_teach_query);
        



        $std_check_query = "SELECT `adid` FROM student WHERE adid = '$adid' ";
        $check_std_result = mysqli_query($con,$std_check_query);
        $num = mysqli_num_rows($check_std_result);
        echo $num;
        if($num != 0){
            $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name12','$adid12','$dob12','$fname12','$mname12','$phno12','$email12','$profile12')";
            $q = mysqli_query($con,$query123);
            $_SESSION['already_exist_adid']=$adid;

            echo "same";
            header("location: updatestd_reload.php?message=ADMISSION ALREADY EXIST&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");
        }else{
            echo"done done";
            // $adid1 =$_SESSION['update_std_adid'];
            // $select_teach_query = "SELECT profile FROM STUDENT where adid='$adid1' ";
            // $query=mysqli_query($con,$select_teach_query);
            // $r = mysqli_fetch_assoc($query);
            // $old_destination = $r['profile'];
            unlink($profile12);

            unset($_SESSION['update_std_adid']);

            $destination = "../student_profile/".$filename;
            move_uploaded_file($filelocation,$destination);
            echo $destination;
            $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name','$adid','$dob','$fname','$mname','$phno','$email','$destination')";
            $q = mysqli_query($con,$query123);
            echo mysqli_error($con);
            if($q){
                echo"vnbfdsbnvgd";
            }
    
            $_SESSION['std_update_sucess']="STUDENT ADDED SUCESSFULLY";
            $_SESSION['std_name']=$name;
            echo "not same";
            header("location: managestudent.php?meaasge=STUDENT ADDED SUCESSFULLY $name");
        
        }
    }else{
        $_SESSION['invalid_ext']="INVALID EXTENSION OF PROFILE";
        $_SESSION['file']=$profile;
        header("location: updatestd_reload.php?messageprofile=INVALID FILE EXTENSION&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email");
    }
}else{
    $adid1 =$_SESSION['update_std_adid'];
    $std_check_query = "SELECT * FROM student WHERE adid = '$adid1' ";
    $check_std_result = mysqli_query($con,$std_check_query);
    $num = mysqli_num_rows($check_std_result);
    $r = mysqli_fetch_assoc($check_std_result);
    $name12 = $r['name'];
    $adid12 = $r['adid'];
    $fname12 = $r['fname'];
    $dob12 = $r['dob'];
    $mname12 = $r['mname'];
    $phno12 = $r['phno'];
    $email12 = $r['email'];
    $profile12 = $r['profile'];

    $select_teach_query = "DELETE FROM STUDENT where adid='$adid1' ";
    $query=mysqli_query($con,$select_teach_query);
    



    $std_check_query = "SELECT `adid` FROM student WHERE adid = '$adid' ";
    $check_std_result = mysqli_query($con,$std_check_query);
    $num = mysqli_num_rows($check_std_result);
    echo $num;
    if($num != 0){
        $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name12','$adid12','$dob12','$fname12','$mname12','$phno12','$email12','$profile12')";
        $q = mysqli_query($con,$query123);
        $_SESSION['already_exist_adid']=$adid;

        echo "same";
        header("location: updatestd_reload.php?message=ADMISSION ALREADY EXIST&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");
    }else{
        echo"done done";
        // $adid1 =$_SESSION['update_std_adid'];
        // $select_teach_query = "SELECT profile FROM STUDENT where adid='$adid1' ";
        // $query=mysqli_query($con,$select_teach_query);
        // $r = mysqli_fetch_assoc($query);
        // $old_destination = $r['profile'];
        // unlink($profile12);

        unset($_SESSION['update_std_adid']);

        // $destination = "../student_profile/".$filename;
        // move_uploaded_file($filelocation,$destination);
        // echo $destination;
        $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name','$adid','$dob','$fname','$mname','$phno','$email','$profile12')";
        $q = mysqli_query($con,$query123);
        echo mysqli_error($con);
        if($q){
            echo"vnbfdsbnvgd";
        }

        $_SESSION['std_update_sucess']="STUDENT ADDED SUCESSFULLY";
        $_SESSION['std_name']=$name;
        echo "not same";
        header("location: managestudent.php?meaasge=STUDENT ADDED SUCESSFULLY $name");
    
    }


}


echo $profile_update;





// if(in_array($filecheck,$file_ext_valid)){
//     $std_check_query = "SELECT `adid` FROM student WHERE adid = '$adid' ";
//     $check_std_result = mysqli_query($con,$std_check_query);
//     // $teacher_already_exist = $check_std_result->fetch_array()[0] ?? '';
//     // $r = mysqli_fetch_array($check_teach_result);
//     $num = mysqli_num_rows($check_std_result);

//     if($num != 0){
//         $_SESSION['already_exist_adid']=$adid;
//         header("location: addstd_reload.php?message=ADMISSION ALREADY EXIST&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");


//     }else{
//         echo"done done";
//         $destination = "../student_profile/".$filename;
//         move_uploaded_file($filelocation,$destination);
//         echo $destination;
//         $query123 = "INSERT INTO `student`(`name`, `adid`, `dob`, `fname`, `mname`, `phno`, `email`, `profile`)VALUES ('$name','$adid','$dob','$fname','$mname','$phno','$email','$destination')";
//         $q = mysqli_query($con,$query123);
//         echo mysqli_error($con);
//         if($q){
//             echo"vnbfdsbnvgd";
//         }

//         $_SESSION['std_add_sucess']="STUDENT ADDED SUCESSFULLY";
//         $_SESSION['std_name']=$name;
//         header("location: addstudent.php?meaasge=STUDENT ADDED SUCESSFULLY $name");


//     }
    


    

// }else{
//     $_SESSION['invalid_ext']="INVALID EXTENSION OF PROFILE";
//     $_SESSION['file']=$profile;
//     header("location: addstd_reload.php?messageprofile=INVALID FILE EXTENSION&name=$name&adid=$adid&fname=$fname&mname=$mname&dob=$dob&phno=$phno&email=$email&file=$filelocation");
// }


?>