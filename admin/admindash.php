<?php

include 'links.php';
include 'databaseconfig.php';
$_SESSION['user'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user']?></title>
    <link rel="stylesheet" href="admindash.css">
    <link rel="stylesheet" href="admin123.css">
    <link rel="stylesheet" href="admin_nav_admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" 
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" 
    crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@500&display=swap" 
    rel="stylesheet">
</head>
<style>
    *{
        font-family: 'Nova Flat', cursive;
    }
</style>
<body>
    <header>
        <div class="container_admin">
            <img src=".\img\admin_dash_back.jpg" class='back' alt="">
            <div class="nav_bar_admin">
                <div class="admin_logged">
                    
                    <button class="logout" id="logout">LOGOUT</button>
                    <h1 class='admin_log_nav'><?php echo $_SESSION['user'];?></h1>
                </div>
            </div>
            <div class="admin-trans">
                <div class="admin_dash">
                    <h1>ADMIN DASHBOARD</h1>
                    <img src="./img/admin_dash.svg" class="admin_dashimg" alt="">
                </div>
                <div class="container">
                    <div class="box" id="myaccount">
                        <div class="icon">My Account</div>
                        <div class="content">
                            <h3><img src="./img/myaccount_admin.svg" alt="" srcset=""></h3>
                            <p>Here you can manage your account password.</p>
                        </div>
                    </div>
                    
                    <div class="box" id="addteach">
                        <div class="icon">Add Teachers</div>
                        <div class="content">
                            <h3><img src="./img/addteacher_admindash.svg" alt="" srcset=""></h3>
                            <p>Add A new teacher in your Institution.</p>
                        </div>
                    </div>
                    <div class="box" id="manage_teach">
                        <div class="icon">Manage Teachers</div>
                        <div class="content">
                            <h3><img src="./img/manage_teacher.svg" class ="myaccount"alt="" srcset=""></h3>
                            <p>You can manage your Teachers <br>!Update   !Delete</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro">
                <div class="intro-text">
                    <h1 class="hide"><span class="text">WELCOME</span></h1>
                    <h1 class="hide"><span class="text"><?php echo $_SESSION['user'];?></span></h1>    
                </div>
            </div>
        </div>
        <div class="slider"></div>

    </header>
    
   

</body>
    <script >
        const myaccount = document.getElementById('myaccount');
        const addteach = document.getElementById('addteach');
        const manage_teach = document.getElementById('manage_teach');


        $(function(){
                $("#logout").click(function(){
                    window.location.assign("adminlogout.php");
            });
        });
        $(function(){
                $(manage_teach).click(function(){
                    window.location.assign("manageteacher.php");
            });
        });
        $(function(){
                $(addteach).click(function(){
                    window.location.assign("teacheradd.php");
            });
        });
        $(function(){
                $(myaccount).click(function(){
                    window.location.assign("myaccount.php");
            });
        });

        const tl = gsap.timeline({defaults: {ease: "power1.out"}});
        tl.to(".text",{y: '0%',duration : 1,stagger:0.25});
        tl.to(".slider",{y: "-100%", duration:1.5,delay:0.5});
        tl.to(".intro",{y: '-100%',duration:1},"-=1");
        tl.fromTo('.nav_bar_admin',{opacity:0},{opacity:1,duration:1},"-=0.2");
        tl.fromTo('.admin-trans',{opacity:0},{opacity:1,duration:1},"-=1.2");
    </script>
</html>