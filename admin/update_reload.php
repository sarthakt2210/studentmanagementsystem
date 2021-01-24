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
<style>
    .img img{
        width:100%;
    }
</style>
<body>
    
    <img src="./img/teacheraddback.jpg" class='back' alt="">
    <?php
        $id12 = $_GET['userid'];
        $pass12 = $_GET['password'];
        $name = $_GET['name'];
        $age = $_GET['age'];
        $phno = $_GET['phno'];
        $email = $_GET['email'];
        $id = $_SESSION['updating_teacher'];
        
        
        // $teach_check_query = "SELECT * FROM teacher WHERE password = '$pass' AND userid = '$id' ";
        // $check_teach_result = mysqli_query($con,$teach_check_query);
        // $teacher_already_exist = $check_teach_result->fetch_array()[0] ?? '';
        // $r = mysqli_fetch_array($check_teach_result);
        // $num = mysqli_num_rows($check_teach_result);
        // echo $teacher_already_exist;
        

        // $select = "SELECT * FROM teacher WHERE userid = '$id' and password = '$pass' ";
        // $query = mysqli_query($con,$select); 
        // $result = mysqli_fetch_assoc($query);
        // echo $result['name'];
        
       
        // $name1 = $result['name'];
        // $userid1 = $result['userid'];
        // $password1 = $result['password'];
        // $age1 = $result['age'];
        // $phno1 = $result['phone_no'];
        // $email1 = $result['email'];
          
    ?>
    <div class="container">
      <div class="img">
      <img  src="./img/update_teacher.svg" alt="">
      </div>
      <div class="addteach">
        <form action="update_reload2.php" method="POST">
          <h2>UPDATE TEACHER</h2>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-user-plus"></i>
            </div>
            <div>
              <h5>TEACHER NAME</h5>
              <input type="text" class="name" name='name' value="<?php echo $name;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-id-card"></i>
            </div>
            <div>
              <h5>USER ID</h5>
              <input type="text" class="userid" name='userid' value="<?php echo $id12 ;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>password</h5>
              <input type="text" class="password" name='password' value="<?php echo $pass12?>"required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-sort-numeric-up-alt"></i>
            </div>
            <div>
              <h5>AGE</h5>
              <input type="text" class="age" name='age' value="<?php echo $age;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div>
              <h5>PHONE NUMBER</h5>
              <input type="text" class="phno" name='phno' value="<?php echo $phno;?>" required>
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-at"></i>
            </div>
            <div>
              <h5>EMAIL ID</h5>
              <input type="text" class="email" name='email' value="<?php echo $email;?>" required>
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
        swal("Teacher <?php echo $id12;?> With password <?php echo $pass12?> Already Exists!!", "Try using another username and password", "error");
    </script>
    
    
    
</body>
</html>