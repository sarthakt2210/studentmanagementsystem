<?php include 'links.php';
        include 'databaseconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacheradd.css">
    <link rel="stylesheet" href="./admin_nav.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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
          <button class="logout">LOGOUT</button>
      </div>
      <ul>
        <li><a href="./admindash.php">HOME</a></li>
        <li><a href=",/myacount.php">MY ACCOUNT</a></li>
        <div class="active_link">
          <li><a href="./addteacher.php">ADD TEACHER</a></li>
        </div>
        <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
      </ul>
    </div>
    <?php
        
        $name1 = $_GET['name'];
        $userid1 = $_GET['userid'];
        $password1 = $_GET['password'];
        $age1 = $_GET['age'];
        $phno1 = $_GET['phno'];
        $email1 = $_GET['email'];
          
    ?>
    <div class="container">
      <div class="img">
        <img  src="./img/teacher_back.svg" alt="">
      </div>
      <div class="addteach">
        <form action="teacheradd_database.php" method="POST">
          <h2>NEW TEACHER</h2>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-user-plus"></i>
            </div>
            <div>
              <h5>TEACHER NAME</h5>
              <input type="text" class="name" name='name' value="<?php echo $name1;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-id-card"></i>
            </div>
            <div>
              <h5>USER ID</h5>
              <input type="text" class="userid" name='userid' value="<?php echo $userid1?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>password</h5>
              <input type="text" class="password" name='password' value="<?php echo $password1?>"required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-sort-numeric-up-alt"></i>
            </div>
            <div>
              <h5>AGE</h5>
              <input type="text" class="age" name='age' value="<?php echo $age1;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div>
              <h5>PHONE NUMBER</h5>
              <input type="text" class="phno" name='phno' value="<?php echo $phno1;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-at"></i>
            </div>
            <div>
              <h5>EMAIL ID</h5>
              <input type="text" class="email" name='email' value="<?php echo $email1;?>" required>
            </div>
          </div>
          <input type="submit" class='btn' value='addnew'>
        </form>
      </div>
    </div>
    
    <script>
      swal("USER ID <?php echo $userid1?> ALREADY EXISTS !", "Try using another userid and password", "warning");
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