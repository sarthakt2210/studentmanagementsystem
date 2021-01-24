<?php
include "links.php";
include 'databaseconfig.php';
$teacher = $_SESSION['user'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="teacherdash.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" 
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sidebar.css">
    <title>TEACHER DASH</title>
</head>
<style>
   .options{
        font-size: 3.5rem;
    }
    .list-unstyled{
        font-size:1.5rem;
    }
    /* .slider123{
        position: fixed;
        top: 0;
        left: 0;
        background: #0a667a;
        height: 100%;
        width: 100%;
    } 
     */
    .intro123{
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: +3;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .slider123{
        background-color: #0A0D4B;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: +3;
        transform: translateY(100%);

    }

    .intro-text123{
        color:  white;
        font-family: 'Redressed', cursive;
        font-size: 15rem;
        z-index:+4;
    }

    .hide123{
        background: black;
        overflow: hidden;
    }

    .hide123 span{
        transform: translateY(100%);
        display: inline-block;
    }



</style>
<body>
        <div class="back">
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
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-home"></i> Home</a>
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
                    <li>
                        <a href="myaccount.php"><i class="fas fa-user-shield"></i> My Account</a>
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
                        <div class="navbar-brand mx-auto" href='#'>TEACHER DASH</div>

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
                

                <div class="services-section">
                    <div class="inner-width">
                        <div class="services-container">

                        <div class="service-box" id="addstudent">
                            <div class="service-icon">
                            <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="service-title">ADD STUDENT</div>
                            <div class="service-desc">
                            Add a new student to the school.
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-icon" id="managestudent">
                            <i class="fas fa-tasks"></i>
                            </div>
                            <div class="service-title">MANAGE STUDENTS</div>
                            <div class="service-desc">
                            Update Or delete Student ID........!!
                            </div>
                        </div>

                        <div class="service-box" id="updatemarks">
                            <div class="service-icon">
                            <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="service-title">UPDATE MARKS</div>
                            <div class="service-desc">
                                Add and update marks of <br>Term 1 , Term 2 and Term 3 .
                            </div>
                        </div>

                        <div class="service-box" id="myaccount">
                            <div class="service-icon">
                            <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="service-title">My Account</div>
                            <div class="service-desc">
                                Manage your account details.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="intro123">
            <div class="intro-text123">
                <h1 class="hide123"><span class="text123">WELCOME</span></h1>
                <h1 class="hide123"><span class="text123">TEACHER  <?php echo $_SESSION['user'];?></span></h1>    
            </div>
        </div>
        <div class="slider123"></div>
        




        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
             $(function(){
                $("#logout").click(function(){
                    window.location.assign("teacherlogout.php");
                });
            });
            $(function(){
                $("#myaccount").click(function(){
                    window.location.assign("myaccount.php");
                });
            });
            $(function(){
                $("#addstudent").click(function(){
                    window.location.assign("addstudent.php");
                });
            });
            $(function(){
                $("#updatemarks").click(function(){
                    window.location.assign("updatemarks.php");
                });
            });
            $(function(){
                $("#managestudent").click(function(){
                    window.location.assign("managestudent.php");
                });
            });
            // window.location.assign("faltu.php");
            const tl = gsap.timeline({defaults: {ease: "power1.out"}});
            tl.to(".text123",{y: '0%',duration : 1,stagger:0.25});
            tl.to(".slider123",{y: "-100%", duration:1.5,delay:0.5});
            tl.to(".intro123",{y: '-100%',duration:1},"-=1");
         </script>
</body>
</html>