<?php session_start();
include 'links.php';?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles.css">
    <title>STUDENT MANAGEMENT SYSTEM</title>
  </head>
  <body>
    <div class="fullpage"></div>
      <section class="section1">
        <header>
          <nav>
            <h3 id="logo">BANASTHALI PUBLIC SCHOOL</h3>
            <h3><img src="./img/bps.png" id="bps" alt=""></h3>
          </nav>
          <section class="s1">
            <div class="hero">
              <img src="./img/intro.png" alt="">
              <h1 class="headline">Student Management System</h1>
  

            </div>
            <div class="btn" id="btn">
              <button class="button" id="but">PROCEED</button>
            </div>
            

          </section>
          
        </header>

        <div class="slider"></div>
        <div class="back"></div>

       
      </section>
      <section class="section2"  id="sec2">
        <div class="container">
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
                  <form action="teacher.php" method="POST" class="teacher">
                      <h2 class="titleadmin">Teacher Login</h2>
                      <div class="input-field">
                          <i class="fas fa-user-tie"></i>
                          <input type="text" placeholder="username" required autocomplete='off'>
                      </div>
                      <div class="input-field">
                          <i class="fas fa-unlock-alt"></i>
                          <input type="password" placeholder="password" required autocomplete='off'>
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
    <script src="index.js"></script>
    <?php
    if(isset($_SESSION['status'])){
      ?><script>$(document).scrollTop(700);
      swal("WRONG PASSWORD!!","Please enter a valid password.", "error");</script>
      <?php
      unset($_SESSION['status']);
      session_destroy();
    }
    ?>
    <!-- <script>Swal.fire('Any fool can use a computer');</script> -->
  </body>
  
</html>
