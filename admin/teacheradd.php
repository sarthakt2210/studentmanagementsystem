<?php  include('databaseconfig.php'); 
include 'links.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="teacheradd.css">
  <link rel="stylesheet" href="./admin_nav.css">
  

  <script src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>ADMIN-NEW TEACHER</title>
</head>
    
<body>
    
    <img src="./img/teacheraddback.jpg" class='back' alt="">
    <div class="nav_bar_admin">
      <div class="admin_logged">
          <h1 class='admin_log_nav'><?php echo $_SESSION['user'];?></h1>
          <button class="logout" id="logout">LOGOUT</button>
      </div>
      <ul>
        <li><a href="./admindash.php">HOME</a></li>
        <li><a href="./myaccount.php">MY ACCOUNT</a></li>
        <div class="active_link">
          <li><a href="./addteacher.php">ADD TEACHER</a></li>
        </div>
        <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
      </ul>
    </div>
    <div class="container">
      <div class="img">
        <img  src="./img/teacher_back.svg" alt="">
      </div>
      <div class="addteach">
        <form action="teacheradd_database.php" method="POST">
          <h2>NEW TEACHER</h2>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-user-plus"></i>
            </div>
            <div>
              <h5>TEACHER NAME</h5>
              <input type="text" class="name" name='name' required>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-id-card"></i>
            </div>
            <div>
              <h5>USER ID</h5>
              <input type="text" class="userid" name='userid' required>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>password</h5>
              <input type="text" class="password" name='password' required>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-sort-numeric-up-alt"></i>
            </div>
            <div>
              <h5>AGE</h5>
              <input type="text" class="age" name='age' required>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div>
              <h5>PHONE NUMBER</h5>
              <input type="text" class="phno" name='phno' required>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-at"></i>
            </div>
            <div>
              <h5>EMAIL ID</h5>
              <input type="text" class="email" name='email' required>
            </div>
          </div>
          <input type="submit" class='btn' value='addnew'>
        </form>
      </div>
    </div>
    
    <script>
      
      const inputs = document.querySelectorAll('input');

      function focusfunc(){
          let t = this.parentNode.parentNode;
          t.classList.add('focus');
      };

      function blurfunc(){
          let t = this.parentNode.parentNode;
          if(this.value ==""){
            t.classList.remove('focus');
          }
          
      };
      inputs.forEach(input =>{
        input.addEventListener('focus', focusfunc);
        input.addEventListener('blur', blurfunc);
      });
      $(function(){
            $("#logout").click(function(){
                window.location.assign("adminlogout.php");
        });
      });
      // $(function(){
      //     $("#logout").click(function(){
      //       window.location.assign("manageteacher.php");
      //   });
      // });
    </script>
    <?php
    if(isset($_SESSION['success'])){
      ?><script>swal("<?php echo $_SESSION['newteacher'];?>", "ADDED SUCESSFULLY", "success");</script>
      <?php
      unset($_SESSION['success']);
      unset($_SESSION['newteacher']);
    }
    ?>
    
    
    
    
</body>
</html>