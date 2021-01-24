<?php  include('databaseconfig.php'); 
include 'links.php';
$name = $_GET['name'];
$pass = $_GET['password'];?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="adminadd.css">
  <link rel="stylesheet" href="./admin_nav.css">
  

  <script src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>ADMIN-NEW TEACHER</title>
</head>
<style>
    .nav_bar_admin.modeon{
      position:fixed;
      display: flex;
      margin: 0%;
      padding-top:0;
      justify-content: left;
      width: 30%;
      height: 8vh;
      align-items: center;
      text-transform:uppercase;
      font-size: 0.85rem;
      border-width: 15PX;
      border-bottom: black solid;
      font-family: 'Nova Square', cursive;
    }
    .img img{
        width: 500px;
    }
</style>  
<body>
    
    <img src="./img/adminaddback.jpg" class='back' alt="">
    <div class="nav_bar_admin">
        <div class="admin_logged">
            <h1 class='admin_log_nav'><?php echo $_SESSION['user'];?></h1>
            <button class="logout" id='logout'>LOGOUT</button>
        </div>
        <ul>
            <li><a href="./admindash.php">HOME</a></li>
            <li><a href="./myaccount.php">MY ACCOUNT</a></li>
            <div class="active_link">
                <li><a href="./manageadmin.php">MANAGE ADMINS</a></li>
            </div> 
            <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
        </ul>
    </div>
    <div class="nav_bar_admin modeon">
        <ul>
            <div class="active_link">
                <li><a href="./adminadd.php">ADD ADMIN</a></li>
            </div>
            <li><a href="./manageadmin.php">MANAGE ADMINS</a></li>
            
        </ul>
    </div>
    <div class="container">
      <div class="img">
        <img  src="./img/addadmin.svg" alt="">
      </div>
      <div class="addteach">
        <form action="adminadd_database.php" method="POST">
          <h2>NEW ADMIN</h2>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-user-shield"></i>
            </div>
            <div>
              <h5>ADMIN NAME</h5>
              <input type="text" class="name" name='name' value="<?php echo $name?>" required autocomplete="off">
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>PASSWORD</h5>
              <input type="text" class="userid" name='password' value="<?php echo $pass?>" required autocomplete="off">
            </div>
          </div>
          
          <input type="submit" class='btn' value='addnew ADMIN'>
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
      swal("ADMIN WITH PASS '<?php echo $pass ?>'' ALREADY EXISTS !!", "Try using another password", "error");
    </script>
    
    
    
    
    
    
</body>
</html>