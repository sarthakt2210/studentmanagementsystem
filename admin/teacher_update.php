<?php

include 'databaseconfig.php';
$name =mysqli_real_escape_string($con,$_POST['name']);
$userid = mysqli_real_escape_string($con,$_POST['userid']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$age = mysqli_real_escape_string($con,$_POST['age']);
$phno = mysqli_real_escape_string($con,$_POST['phno']);
$email = mysqli_real_escape_string($con,$_POST['email']);

$id = $_SESSION['updating_teacher'];
$pass = $_SESSION['updating_teacher_pass'];

// $deletequery = "DELETE FROM teacher WHERE userid='$id' AND password='$pass' ";

// $query = mysqli_query($con,$deletequery);


$teach_check_query = "SELECT * FROM teacher WHERE password = '$pass' AND userid = '$id' ";
$check_teach_result = mysqli_query($con,$teach_check_query);
$r = mysqli_fetch_assoc($check_teach_result);
try{
    if($r['name'] == $name and $r['userid']==$userid and $r['password']==$password and $r['age']==$age and $r['phone_no']==$phno and $r['email']==$email){
        $_SESSION['nothing_updated']="NOTHING HAS UPDATED";
        unset($_SESSION['updating_teacher']);
        unset($_SESSION['updating_teacher_pass']);
        header("location: manageteacher.php?message=NOTHING HAS UPDATED&id=".$name);
    }else{
        echo"hgfdfghjhgfdfghjkjhgfghj";
        $deletequery = "DELETE FROM teacher WHERE userid='$id' AND password='$pass' ";
        $query = mysqli_query($con,$deletequery);
        $teach_check_query_update = "SELECT * FROM teacher WHERE password = '$password' AND userid = '$userid' ";
        $check_teach_update_result = mysqli_query($con,$teach_check_query_update);
        $teacher_already_exist = $check_teach_update_result->fetch_array()[0] ?? '';
        // $re = mysqli_fetch_assoc($teach_check_query_update);
        $num1 = mysqli_num_rows($check_teach_update_result);

        echo $num1;
        if($num1 != 0){
            echo"kuch na kuch mila";
            $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$id','$pass','$age','$phno','$email')";
            $result = mysqli_query($con,$query);
            header("location: update_reload.php?userid=$userid&password=$password&name=$name&age=$age&phno=$phno&email=$email");
        }else{
            echo"hum to insert kregee";
            $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$userid','$password','$age','$phno','$email')";
            $result = mysqli_query($con,$query);
            $message = "Teacher update";
            $_SESSION['update']="SUCCESS";
            unset($_SESSION['updating_teacher']);
            unset($_SESSION['updating_teacher_pass']);
            header("location: manageteacher.php?result=$message&name=$name");
        }






        
    }
    
} catch (e) {
    //throw $th;
    echo"hgfghjhgtry wala";
}
// if($r['name'] == $name and $r['userid']==$userid and $r['password']==$password and $r['age']==$age and $r['phone_no']==$phno and $r['email']==$email){
//     $_SESSION['nothing_updated']="NOTHING HAS UPDATED";
//     unset($_SESSION['updating_teacher']);
//     unset($_SESSION['updating_teacher_pass']);
//     header("location: manageteacher.php?message=NOTHING HAS UPDATED&id=".$name);
// }else{
//     echo"hgfdfghjhgfdfghjkjhgfghj";
// }





// $teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
// $r = mysqli_fetch_array($check_teach_result);
// $num = mysqli_num_rows($check_teach_result);
// echo $num;

// if($num == 0 ){
//     // $deletequery = "DELETE FROM teacher WHERE userid='$id' AND password='$pass' ";
//     // $query = mysqli_query($con,$deletequery);
//     echo"if";

    
//     // $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$userid','$password','$age','$phno','$email')";
//     // $result = mysqli_query($con,$query);
//     // $message = "Teacher update";
//     // $_SESSION['update']="SUCCESS";
//     // unset($_SESSION['updating_teacher']);
//     // unset($_SESSION['updating_teacher_pass']);
//     // header("location: manageteacher.php?result=$message&name=$name"); 
//     // echo "jhgfdfghj";
//     // header("location: update_reload.php?userid1=$userid&pass12=$password");

// }else{
//     echo"out";
//     // $deletequery = "DELETE FROM teacher WHERE userid='$id' AND password='$pass' ";
//     // $query = mysqli_query($con,$deletequery);


    
//     // $query = "INSERT INTO teacher(name,userid,password,age,phone_no,email) VALUES('$name','$userid','$password','$age','$phno','$email')";
//     // $result = mysqli_query($con,$query);
//     // $message = "Teacher update";
//     // $_SESSION['update']="SUCCESS";
//     // unset($_SESSION['updating_teacher']);
//     // unset($_SESSION['updating_teacher_pass']);
//     // header("location: manageteacher.php?result=$message&name=$name"); 
// }







?>