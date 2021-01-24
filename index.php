<?php session_start();
include 'links.php';?>


<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./styles.css">
  <title>STUDENT MANAGEMENT SYSTEM</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Romanesco&display=swap" rel="stylesheet"> 
<style>
  .btn1 button{
    position: absolute;
    top:75%;
    left: 0.6%;
    font-style: italic;
  
    font-weight: 500;
    font-size: 25px;

}
.btn1 button {
    background: none;
    color: blue;
    width: 120px;
    height: 140px;
    border: 1px solid #020347;
    font-size: 18px;
    border-radius: 20%;
    transition: .6s;
    font-family: 'Poppins',sans-serif;
    overflow: hidden;
}
.btn1 button:focus{
    outline: none;
}
.btn1 button::before{
    content: '';
    display: block;
    position: absolute;
    background: blue;
    width: 60px;
    height: 100px;
    left: 0;
    top: 0;
    opacity: 0.5;
    filter: blur(30px);
    transform: translateX(-130px) skewX(-15deg);
}

.btn1 button::after{
    content: '';
    display: block;
    position: absolute;
    background: blue;
    width: 30px;
    height: 100%;
    left: 30;
    top: 0;
    opacity: 0;
    filter: blur(30px);
    transform: translateX(-130px) skewX(-15deg);
}
.btn1 button:hover {
    background: darkblue;
    cursor: pointer;
    color: white;
}
.btn1 button:hover::after{
    transform: translateX(300px) skewX(-15deg);
    opacity: 0.6;
    transition: .7s;
}
.btn1 button:hover::before{
    transform: translateX(300px) skewX(-15deg);
    opacity: 1;
    transition: .4s;
}
</style>
    
<body>
    <div class="fullpage"></div>
      <section class="section1">
        <header>
          <nav>
            <h3 id="logo" style="font-family: 'Romanesco', cursive;">ABCDEFG PUBLIC SCHOOL</h3>
            <h3><img src="./img/school.png" id="bps" height="120" width="120" alt=""></h3>
          </nav>
          <section class="s1">
            <div class="hero">
              <img src="./img/intro.png" alt="">
              <h1 class="headline">Student Management System</h1>
  

            </div>
            <div class="btn" id="btn">
              <button class="button" id="but">TEACHER LOGIN</button>
            </div>
            <div class="btn1" id="btn1">
              <button class="button" id="but1">STUDENT LOGIN</button>
            </div>
            

          </section>
          
        </header>

        <div class="slider"></div>
        <div class="back"></div>

       
      </section>
      <section class="section2"  id="sec2">
        <div class="container teacher_mode">
          <div class="forms-container">
            <img src="./img/back21.png"  id='backgroung2'alt="">
              <div class="form-admin-teach">
                  <form action="logincheck_admin.php" method="POST" class="admin">
                      <h2 class="titleadmin">Admin Login</h2>
                      <div class="input-field">
                          <i class="fas fa-user-lock"></i>
                          <input type="password" name='adminpass' placeholder="password" required autocomplete='off'>
                      </div>
                      <input type="submit" value="login" class="adminbtn solid">
                  </form>
                  <form action="logincheck_teacher.php" method="POST" class="teacher">
                      <h2 class="titleadmin">Teacher Login</h2>
                      <div class="input-field">
                          <i class="fas fa-user-tie"></i>
                          <input type="text" placeholder="username" name="userid" required autocomplete='off'>
                      </div>
                      <div class="input-field">
                          <i class="fas fa-unlock-alt"></i>
                          <input type="password" placeholder="password" name="password" required autocomplete='off'>
                      </div>
                      <input type="submit" value="login" class="adminbtn solid">
                      <h4 class="remark">For first time login, Enter username and password given by admin at time of registration
                        <br>Forget password ?? Contact your administrator for reseting password
                      </h4>
                  </form>
              </div>
          </div>
          <div class="panel-container">
              <div class='panel left-panel'>
                  <div class="content">
                      <h3>TEACHER ?</h3>
                      <p>Are you one of the best educator in our institution!!</p>
                      <button class="bttn transparent" id="teacher-btn">teacher login</button>
                  </div>
                  <img src="./img/teacher.svg" alt="">
              </div>
              <div class='panel right-panel'>
                  <div class="content">
                      <h3>ADMIN ?</h3>
                      <p>Are you in the admin team ????</p>
                      <button class="bttn transparent" id="admin-btn">admin login</button>
                  </div>
                  <img src="./img/administrator.svg" alt="">
  
              </div>
          </div>
      </div>
      <section class="section3"  id="sec3">
        <div class="container">
          <div class="forms-container">
            <img src="./img/back21.png"  id='backgroung2'alt="">
              <div class="form-admin-teach">
                  <form action="logincheck_student.php" method="POST" class="admin">
                      <h2 class="titleadmin">Student Login</h2>
                      <div class="input-field">
                          <i class="fas fa-user-lock"></i>
                          <input type="text" name='adid' placeholder="Admission Code" required autocomplete='off'>
                      </div>
                      <input type="submit" value="login" class="adminbtn solid">
                  </form>
                  
              </div>
          </div>
          <div class="panel-container">
              <div class='panel left-panel'>
                  <div class="content">
                      <h3>STUDENT</h3>
                      <p>Login with your Admission Code to know your result.</p>
                  </div>
                  <img src="./img/std.svg" alt="" style="padding-top: 0%;width: 150%; transform:translateX(30%);">
              </div>
              
          </div>
      </div>
        
        

      </section>
    </div>


    <!-- You can also require other files to run in this process -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" 
    integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" 
    integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw=="
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
     integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
     crossorigin="anonymous"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="index.js"></script> -->
    <script type="text/javascript">
        const hero = document.querySelector('.hero');
        const slider = document.querySelector('.slider');
        const logo = document.querySelector('#logo');
        const headline = document.querySelector('.headline');
        const bps = document.querySelector('#bps');
        const back = document.querySelector('#back');
        const btn = document.querySelector('#but');
        const btn1 = document.querySelector('#but1');
        const sec2 = document.getElementById('sec2');
        const sec3 = document.getElementById('sec3');


        const t1 = new TimelineMax();

        t1.fromTo(hero,2,{height:'0%'},{height:'80%', ease : Power2.easeInOut})
        .fromTo(hero,1.5,{width:'100%' } ,{width:'80%' ,ease : Power2.easeInOut})
        .fromTo(slider,1.2,{x:'-100%'},{x:'0%',ease : Power2.easeInOut},'-=1.5')
        .fromTo(bps,1,{opacity:0,x:'0%'},{opacity:1,x:'350%',ease : Power2.easeInOut},'-=1')
        .fromTo(logo,1,{opacity:0,x:40},{opacity:1,x:0,ease : Power2.easeInOut},'-=1')
        .fromTo(headline,1,{opacity:0},{opacity:1,ease : Power2.easeInOut},'-=1.5')
        .fromTo(btn,1,{opacity:0},{opacity:1,ease : Power2.easeInOut})
        .fromTo(btn1,1,{opacity:0},{opacity:1,ease : Power2.easeInOut},'-=1');

        btn.addEventListener('click',(ev)=>{
            sec2.scrollIntoView(true);
        });
        btn1.addEventListener('click',(ev)=>{
            sec3.scrollIntoView(true);
        });


        const teachbtn = document.querySelector("#teacher-btn");
        const adminbtn = document.querySelector("#admin-btn");
        const container = document.querySelector(".container");

        teachbtn.addEventListener("click",() =>{
            container.classList.add('teacher_mode');
        });

        adminbtn.addEventListener("click",() =>{
            container.classList.remove('teacher_mode');
        });
    </script>
    <?php
    if(isset($_SESSION['status'])){
      ?><script>$(document).scrollTop(700);
      swal("WRONG PASSWORD!!","Please enter a valid password.", "error");</script>
      <?php
      unset($_SESSION['status']);
      session_destroy();
    }elseif(isset($_SESSION['status1'])){
      ?><script>$(document).scrollTop(700);
      swal("INVALID USERNAME OR PASSWORD!!","Please enter a valid username or password.", "error");</script>
      <?php
      unset($_SESSION['status1']);
      session_destroy();
    }elseif(isset($_SESSION['status_student'])){
      ?><script>$(document).scrollTop(1400);
      swal("INVALID ADMISSION CODE!!","Please enter a Admission Code.", "error");</script>
      <?php
      unset($_SESSION['status_student']);
      session_destroy();
    }
    ?>
    <!-- <script>Swal.fire('Any fool can use a computer');</script> -->
  </body>
  
</html>
