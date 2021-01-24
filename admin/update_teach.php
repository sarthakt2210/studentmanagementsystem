

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacherupdate.css">
    <title>Document</title>
</head>
<style>
    .img img{
        width:100%;
    }
</style>
<body>
<img src="./img/teacheraddback.jpg" class='back' alt="">
<div class="container">
      <div class="img">
        <img  src="./img/update_teacher.svg" alt="">
      </div>
      <div class="addteach">
        <form action="teacher_update.php" method='post'>
          <h2>TEACHER UPDATE</h2>
          <?php
          include 'links.php';
          include 'databaseconfig.php';
          $id = $_GET['id'];
          $pass = $_GET['pass'];

          $_SESSION['updating_teacher']= $id;
          $select = "SELECT * FROM teacher WHERE userid='$id' AND password='$pass' ";
          $query = mysqli_query($con,$select); 
          $result = mysqli_fetch_assoc($query);
          $_SESSION['updating_teacher_pass']=$pass;


          ?>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-user-plus"></i>
            </div>
            <div>
              <h5>TEACHER NAME</h5>
              <input type="text" class="name" name='name' value="<?php echo $result['name'];?>"required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-id-card"></i>
            </div>
            <div>
              <h5>USER ID</h5>
              <input type="text" class="userid" name='userid' value="<?php echo $result['userid'];?>"required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>password</h5>
              <input type="text" class="password" name='password' value="<?php echo $result['password'];?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-sort-numeric-up-alt"></i>
            </div>
            <div>
              <h5>AGE</h5>
              <input type="text" class="age" name='age' value="<?php echo $result['age'];?>"required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div>
              <h5>PHONE NUMBER</h5>
              <input type="text" class="phno" name='phno' value="<?php echo $result['phone_no'];?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-at"></i>
            </div>
            <div>
              <h5>EMAIL ID</h5>
              <input type="text" class="email" name='email' value="<?php echo $result['email'];?>" required>
            </div>
          </div>
          <input type="submit" class='btn' value='update'>
          <input type="button" class='btn' value='cancel' id='cancel'>
        </form>
      </div>
    </div>
    
    <script>
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
      $(function(){
            $("#cancel").click(function(){
                window.location.assign("manageteacher.php");
        });
        });
    </script>
</body>
</html>