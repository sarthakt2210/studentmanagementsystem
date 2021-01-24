<?php
include 'links.php';
include 'databaseconfig.php';

$admin = $_SESSION['user'];
$s = mysqli_commit($con);
$con -> close();
session_unset();
session_destroy();

header("location: logout.php?teacher_logout=$admin");

?>