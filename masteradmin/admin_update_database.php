<?php

include 'links.php';
include 'databaseconfig.php';
$name12 =mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['password']);
echo $name12;
$name = "ADMIN ".strtoupper($name12);
echo $name;
echo $password;

$id = $_SESSION['updating_admin'];
$pass = $_SESSION['updating_admin_pass'];



$teach_check_query = "SELECT * FROM admin_pass WHERE passwords = '$pass' AND id = '$id' ";
$check_teach_result = mysqli_query($con,$teach_check_query);
$r = mysqli_fetch_assoc($check_teach_result);
echo $r['id'];
echo $r['passwords'];

try{
    if($r['id'] == $name and $r['passwords'] == $password){
        echo"yaha pr hu mai";
        $_SESSION['nothing_updated']="NOTHING HAS UPDATED";
        unset($_SESSION['updating_admin']);
        unset($_SESSION['updating_admin_pass']);
        header("location: manageadmin.php?message=NOTHING HAS UPDATED&id=".$name);
    
    }else{
        echo"hgfdfghjhgfdfghjkjhgfghj";
        $deletequery = "DELETE FROM admin_pass WHERE id='$id' AND passwords='$pass' ";
        $query = mysqli_query($con,$deletequery);

        $teach_check_query = "SELECT passwords FROM admin_pass WHERE passwords = '$password' ";
        $check_teach_result = mysqli_query($con,$teach_check_query);
        $teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
        $r = mysqli_fetch_assoc($check_teach_result);
        $num = mysqli_num_rows($check_teach_result);

        if($num != 0){
            $query = "INSERT INTO `admin_pass`(`id`, `passwords`) VALUES ('$id','$pass')";
            $result = mysqli_query($con,$query);
            header("location: reload_update_admin_add.php?name=$name12&password=$password");
        }else{

            $query = "INSERT INTO `admin_pass`(`id`, `passwords`) VALUES ('$name','$password')";
            $result = mysqli_query($con,$query);
            $message = "ADMIN UPDATE SUCESSFULLY";
            $_SESSION["update"]="sucess";
            unset($_SESSION['updating_teacher']);
            unset($_SESSION['updating_teacher_pass']);
            header("location: manageadmin.php?result=$message&name=$name"); 
        }




//         $teach_check_query_update = "SELECT * FROM teacher WHERE password = '$password' AND userid = '$userid' ";
//         $check_teach_update_result = mysqli_query($con,$teach_check_query_update);
//         $teacher_already_exist = $check_teach_update_result->fetch_array()[0] ?? '';
//         // $re = mysqli_fetch_assoc($teach_check_query_update);
//         $num1 = mysqli_num_rows($check_teach_update_result);

//         echo $num1;
//         if($num1 != 0){
//             echo"kuch na kuch mila";
//             $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$id','$pass','$age','$phno','$email')";
//             $result = mysqli_query($con,$query);
//             header("location: update_reload.php?userid=$userid&password=$password&name=$name&age=$age&phno=$phno&email=$email");
//         }else{
//             echo"hum to insert kregee";
//             $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$userid','$password','$age','$phno','$email')";
//             $result = mysqli_query($con,$query);
//             $message = "Teacher update";
//             $_SESSION['update']="SUCCESS";
//             unset($_SESSION['updating_teacher']);
//             unset($_SESSION['updating_teacher_pass']);
//             header("location: manageteacher.php?result=$message&name=$name");
//         }






        
    }
    
} catch (e) {
    //throw $th;
    echo"hgfghjhgtry wala";
}


// $teach_check_query = "SELECT passwords FROM admin_pass WHERE passwords = '$password' ";
// $check_teach_result = mysqli_query($con,$teach_check_query);
// $teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
// $r = mysqli_fetch_assoc($check_teach_result);
// $num = mysqli_num_rows($check_teach_result);

// echo $num;
// if($num != 0){
//    header("location: reload_admin_add.php?name=$name12&password=$password");

// }else{
//     $query = "INSERT INTO `admin_pass`(`id`, `passwords`) VALUES ('$name','$password')";
//     $result = mysqli_query($con,$query);
//     $message = "New Admin is added";
//     $_SESSION["success"]="ADMIN ADDED SUCESSFULLY";
//     $_SESSION['newadmin'] =$name;
//     header('location: adminadd.php?result='.$message); 
// }


?>