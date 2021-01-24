<?php
include 'databaseconfig.php';
$new_pass=$_POST['password'];
echo $new_pass;
$admin = $_SESSION['user'];
echo $admin;


$admin_query = "SELECT passwords FROM admin_pass WHERE id = '$admin' ";
$c = mysqli_query($con,$admin_query);
$t = $c->fetch_array()[0] ?? '';
// $r = mysqli_fetch_assoc($c);
// $num = mysqli_num_rows($c);



if($t == $new_pass){
    $_SESSION['admin_no_change']="no change";
    header("location: myaccount.php?status=NO CHANGE");
}else{
    $query_2 = "DELETE FROM admin_pass WHERE id = '$admin' "; 
    $delete = mysqli_query($con,$query_2);

    $admin_check_query = "SELECT id FROM admin_pass WHERE passwords = '$new_pass' ";
    $pass_valid = mysqli_query($con,$admin_check_query);
    $r = mysqli_fetch_array($pass_valid);
    $num = mysqli_num_rows($pass_valid);
    $master = "MASTER";

    if($num != 0 ){
        $query = "INSERT INTO admin_pass(id,passwords,id2) VALUES('$admin','$t','$master')";
        $result = mysqli_query($con,$query);
        echo $t;
        header("location: admin_pass_reload.php?pass=$new_pass");
    }
    else{
        $query = "INSERT INTO admin_pass(id,passwords,id2) VALUES('$admin','$new_pass','$master')";
        $result = mysqli_query($con,$query);
        $message = "ADMIN PASSWORD UPDATED.";
        $_SESSION["admin_new_pass"]="success";
        header("location: myaccount.php?result=$message&newpass=$new_pass"); 
    }

}


?>