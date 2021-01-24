<?php
include 'databaseconfig.php';
$new_name=$_POST['newname'];
$new = strtoupper("MASTER ADMIN ".$new_name);
echo $new;
$admin = $_SESSION['user'];
echo $admin;

$admin = $_SESSION['user'];
$query = "SELECT passwords FROM admin_pass WHERE id = '$admin' ";
$result = mysqli_query($con,$query); 
$r = mysqli_fetch_array($result);
$currentpass = $r['passwords'] ; 





$admin_query = "SELECT id FROM admin_pass WHERE id = '$admin' ";
$c = mysqli_query($con,$admin_query);
$t = $c->fetch_array()[0] ?? '';
// $r = mysqli_fetch_assoc($c);
// $num = mysqli_num_rows($c);



if($t == $new){
    $_SESSION['admin_no_change_in_name']="no change";
    header("location: myaccount.php?status=NO CHANGE");
}else{
    
    $query_2 = "DELETE FROM admin_pass WHERE id = '$admin' "; 
    $delete = mysqli_query($con,$query_2);

    $query = "INSERT INTO admin_pass(id,passwords,id2) VALUES('$new','$currentpass','MASTER')";
    $result = mysqli_query($con,$query);
    echo $t;
    $_SESSION['user'] = $new;
    $_SESSION['admin_name_change']="NAME UPDATE SUCCESSFUL!!";
    header("location: myaccount.php?pass=$new&status=NAME UPDATE SUCCESSFUL!!");
   

}


?>