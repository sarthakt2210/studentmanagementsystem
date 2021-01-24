<?php
include('databaseconfig.php');
include 'links.php';?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_nav.css">
    <link rel="stylesheet" href="manageteacher.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>ADMIN-MANAGE TEACHERS</title>
</head>
<style>
    .container{
        justify-content:center;
    }
    .heading{
    font-weight: 800;
    font-size: 2rem;
    position:relative;
    text-align:center;
    font-family: 'Poppins', cursive;
    }
    .content-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    padding:1.2rem;
    font-family: 'Poppins', cursive;
    }

    .content-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
    font-weight: bold;
    }

    .content-table th,
    .content-table td {
    padding: 12px 15px;
    }

    .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    opacity:0.8;
    }

    .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
    }
    .fa-trash-alt {
        color: #DF1F2D;
    }
    .fa-user-edit{
        color:#197313;
    }
    .img img{
        position: fixed;
        top: 25%;
        left: 50%;
        width:50%;
        z-index:-1;
    }
    .nav_bar_admin.modeon{
        display: flex;

        margin: 1%;
        padding-top:0;
        justify-content: left;
        width: 32%;
        height: 8vh;
        align-items: center;
        text-transform:uppercase;
        font-size: 0.85rem;
        border-width: 15PX;
        border-bottom: black solid;
        font-family: 'Nova Square', cursive;
    }
</style>
<body>
    <img src="./img/manage_teacher_back.jpg" class='back' alt="">
    <div class="img">
        <img src="./img/manage_teacher.svg" alt="">
    </div>
    <div class="nav_bar_admin">
        <div class="admin_logged">
            <h1 class='admin_log_nav'><?php echo $_SESSION['user'];?></h1>
            <button class="logout" id='logout'>LOGOUT</button>
        </div>
        <ul>
            <li><a href="./admindash.php">HOME</a></li>
            <li><a href="./myaccount.php">MY ACCOUNT</a></li>
            <li><a href="./manageadmin.php">MANAGE ADMINS</a></li>
                <div class="active_link">
            <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
            </div>
        </ul>
    </div>
    <div class="nav_bar_admin modeon">
        <ul>
            <li><a href="./teacheradd.php">ADD TEACHER</a></li>
            <div class="active_link">
                <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
            </div>
        </ul>
    </div>
        <div class="container">
          <h2 class='heading'>TEACHERS</h2>
          <table class="content-table">
            <thead>
                <tr>
                <th>NAME</th>
                <th>USER ID</th>
                <th>PASSWORD</th>
                <th>AGE</th>
                <th>PHONE NO</th>
                <th>EMAIL ID</th>
                <th colspan='2'>ACTIONS</th>
                </tr>
            </thead>
            <tbody>


    <?php
    $select_teach_query = 'SELECT * FROM teacher ORDER BY `name`';
    $query=mysqli_query($con,$select_teach_query);
    $result_teacher = mysqli_fetch_assoc($query);
    while ($result_teacher = mysqli_fetch_array ($query)) {
    ?> 
    
            <tr>
                <td><?php echo $result_teacher['name'] ?></td>
                <td><?php echo $result_teacher['userid'] ?></td>
                <td><?php echo $result_teacher['password'] ?></td>
                <td><?php echo $result_teacher['age'] ?></td>
                <td><?php echo $result_teacher['phone_no'] ?></td>
                <td><?php echo $result_teacher['email'] ?></td>
                <td><a href="update_teach.php?id=<?php echo $result_teacher['userid'] ?>&pass=<?php echo $result_teacher['password']?>"><i class="fas fa-user-edit" title="edit"></i></a></td>
                <td><a href="delete_teacher.php?id=<?php echo $result_teacher['userid'] ?>&password=<?php echo $result_teacher['password']?>"><i class="fas fa-trash-alt" title="delete"></i></a></td>
            </tr>
    <?php
        }



    ?>
            </tbody>
          </table>
        </div>
</body>
   <?php
   
   if(isset($_SESSION['update'])){
        $result = $_GET['result'];
        $name = $_GET['name'];
        ?><script>swal("TEACHER <?php echo $name;?>", "UPDATE SUCESSFULLY", "success");</script>
        <?php
        unset($_SESSION['update']);
    };
    if(isset($_SESSION['delete'])){
        $name = $_GET['id'];
        ?><script>swal("TEACHER <?php echo $name;?>", "DELETED SUCESSFULLY", "success");</script>
        <?php
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['nothing_updated'])){
        $name = $_GET['id'];
        ?><script>swal("TEACHER <?php echo $name;?>", "NOTHING UPDATED.....RECORDS UNTOUCHED!!", "success");</script>
        <?php
        unset($_SESSION['nothing_updated']);
    }
    ?>
    <script>
    $(function(){
            $("#logout").click(function(){
                window.location.assign("adminlogout.php");
        });
    });
    </script>
    
</html>