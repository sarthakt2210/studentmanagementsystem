<?php
include "links.php";
include 'databaseconfig.php';
$teacher = $_SESSION['user'];
$userid = $_SESSION['userid'];
$q = "SELECT * FROM teacher WHERE userid='$userid' ";
$query = mysqli_query($con,$q);
$r = mysqli_fetch_assoc($query);

$username = $r['userid'];
$pass = $r['password'];

$currentphno = $r['phone_no'];
$currentemail = $r['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="teacherdash.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" 
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sidebar.css">
    <title>TEACHER-MY ACCOUNT</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        /* font-family: "montserrat",sans-serif; */

        box-sizing: border-box;
    }




    .back123{
        position: fixed;
        height: 100vh;
        fill: none;
        top: 0;
        left: 0;
        width: 100%;
        object-fit: cover;
        z-index: -1;
        overflow: hidden;
        
    }
    .myaccount{
        height:70vh;
        position:fixed;
    }
    .admin{
        z-index: +1;
        
        position:absolute;
        padding-left:5%;
        justfy-content:center;
        text-align:center;
        padding-top:16%;
        width:50% inherit;
        font-size:3rem;

        margin:0;
    }
    .admin label{
        font-size:1.2rem;
        color:grey;
        text-align:center;
        font-weight:900;
        padding-top:5%;
        text-transform:uppercase;
    }
    .admin_cont{
        width:50%;
        display:flex;
        font-family: 'Courgette', cursive;
        
    }
    .change{
        left:60%;
        position:fixed;
        top:50%;
        font-family: 'Courgette', cursive;
    }
    
    span{
        color:#950F17 ;

    }
    .container{
        width: 100vw;
        height: 70vh;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap: 7rem;
        padding: 0 2rem;

    }
    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .img img{
        width: 400px;
    }

    .addteach{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        width: 400px;
    }
    form > h2{
        padding-bottom:1%;
        font-family: 'Courgette', cursive;
    }
    .input-div{
        display: grid;
        grid-template-columns: 7% 93%;
        margin: 20px 0;
        padding:0;
        border-bottom: 2px solid #d9d9d9;
        margin-top: 0;
        position: relative;
    }
    .changename{
        position:relative;
        /* top:20% !important; */
        
        left:180%;
    }
    .change{
        position:relative;
        transform:translateY(-60%);
        top:58% ;
        padding-bottom:7%;
        left:180%;
    }
    .input-div::after , .input-div::before{
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0;
        height: 2px;
        background-color: #700DAD ;
        transition: .3s;

    }
    .input-div::after{
        right: 50%;
    }
    .input-div::before{
        left: 50%;
    }

    .input-div.focus .i i{
        color: #700DAD ;
    }
    .input-div.focus div h5{
        top: -5px;
        font-size: 15px;
        color:#700DAD;
    }

    .input-div.focus::after , .input-div.focus::before{
        width: 50%;
    }

    .i{
        justify-content: center;
        display: flex;
        align-items: center;
        font-size:1.5rem;
    }

    .i i{
        color: #d9d9d9;
        transition: .3s;

    }
    .input-div > div{
        position: relative;
        height: 40px;
    }
    .input-div > div h5{
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color:#ffff;
        font-size: 18px;
        transition: .3s;
        padding-bottom:6%;
    }


    .input-div input{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: none;
        outline: none;
        background: none;
        padding: 0.5rem;
        font-size: 1.2rem;
        font-family: 'Poppins',sans-serif;
        color: black;
    }

    .btn{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        margin: 1rem 0;
        font-size: 1.2rem;
        outline: none;
        border: none;
        background-image: linear-gradient(to right , #700DAD ,#8828C2 ,#700DAD );
        cursor:pointer;
        color: #ffffff;
        font-family: 'Courgette', cursive;
        background-size: 200%;
        transition: .5s;
        text-transform: uppercase;

    }
    .btn:hover{
        background-position: right;
    }

    .star{
        display:grid;
        grid-template-columns: 1fr;
    }



</style>
<body>
        <div class="back123" >
            <img src="./img/dash.png" alt="">
        </div>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Teacher <br><?php echo $_SESSION['user'];?></h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="options"><i class="fas fa-school"></i> OPTIONS</p>
                    <li>
                        <a href="teacherdash.php"  aria-expanded="false"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="addstudent.php"><i class="fas fa-user-graduate"></i> Add Student</a>
                    </li>
                    <li>
                        <a href="managestudent.php"><i class="fas fa-tasks"></i> Manage Student</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-pencil-alt"></i> Marks Add and Update</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="updatemarks.php"><i class="fas fa-sort-numeric-up-alt"></i> Term 1</a></li>
                            <li><a href="updatemarks.php"><i class="fas fa-sort-numeric-up-alt"></i> Term 2</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fas fa-user-shield"></i> My Account</a>
                    </li>
                    
                </ul>

                
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
                        <div class="navbar-brand mx-auto" href='#'><i class="fas fa-user-circle"></i> MY ACCOUNT</div>

                        <!-- <div class="page_name"><h1>ADMIN DASH</h1></div> -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <div class="teacher_logged">
                                <li class='teacher_logged_name'>Teacher <?php echo $_SESSION['user'];?></li>
                                <li><button class="logout" id="logout">LOGOUT</button></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <div class="admin_cont">
                    <img src="./img/myaccount.svg"  class="myaccount" alt="">
                    <h1 class="admin">TEACHER <?php echo $_SESSION['user']?>
                    <br><br><span id="f">USERNAME : </span><?php echo $username?>
                    <br><span id="f">PASSWORD : </span><?php echo $pass?>
                    <br><label class="msg123" for="">username and password edit denied by admin.<br>ask your admin for any changes</label>
                    </h1>
                    <div class="star">
                        <form class="change" action="teacher_email_change.php" method="post">
                            <h2 >CURRENT E-MAIL. <br> <span id="admin_pass"><?php echo $currentemail ;?></span></h2>
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div>
                                <h5>NEW E-MAIL</h5>
                                <input type="text" class="email" name='email' required autocomplete="off">
                                </div>
                            </div>
                            <input type="submit" class='btn' value='Change Email'>
                        </form>
                        <form class="changename" action="teacher_phno_change.php" method="post">
                            <h2 >CURRENT PHONE NO. <br> <span id="admin_pass"><?php echo $currentphno ;?></span></h2>
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <div>
                                <h5>NEW PHONE No.</h5>
                                <input type="text" class="phno" name='phno' required autocomplete="off">
                                </div>
                            </div>
                            <input type="submit" class='btn' value='Update Phone No.'>
                        </form>
                    </div>
                </div>
                
        
        




        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <?php
         if(isset($_SESSION['update_email'])){
            $email = $_GET['email'];
            ?><script>swal("EMAIL UPDATED SUCESSFULLY","Email updated to '<?php echo $email?>'","success")</script>
            <?php
            unset($_SESSION['update_email']);
         }elseif(isset($_SESSION['update_phno'])){
            $phno = $_GET['phno'];
            ?><script>swal("PHONE NO. UPDATED SUCESSFULLY","Phone No. updated to '<?php echo $phno?>'","success")</script>
            <?php
            unset($_SESSION['update_phno']);
         }
         ?>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
             $(function(){
                $('#sidebarCollapse').trigger('click');
             });
             $(function(){
                $("#logout").click(function(){
                    window.location.assign("teacherlogout.php");
                });
            });
            const inputs = document.querySelectorAll('input');

            function focusfunc(){
                let t = this.parentNode.parentNode;
                t.classList.add('focus');
            }

            function blurfunc(){
                let t = this.parentNode.parentNode;
                if(this.value ==""){
                t.classList.remove('focus');
                }
                
            }



            inputs.forEach(input =>{
                input.addEventListener('focus', focusfunc);
                input.addEventListener('blur', blurfunc);
            });
            
         </script>
</body>
</html>