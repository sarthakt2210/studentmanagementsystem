<?php  include('databaseconfig.php'); 
include 'links.php';
$id12 = $_GET['name'];
$pass = $_GET['password'];
$id = str_replace("ADMIN ", "","$id12");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="adminupdate.css">
  <link rel="stylesheet" href="./admin_nav.css">
  

  <script src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>UPDATE ADMIN</title>
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
    <div class="container">
      <div class="img">
        <img  src="./img/update_admin.svg" alt="">
      </div>
      <div class="addteach">
        <form action="admin_update_database.php" method="POST">
          <h2>UPDATE ADMIN</h2>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-user-shield"></i>
            </div>
            <div>
              <h5>ADMIN NAME</h5>
              <input type="text" class="name" name='name' value = "<?php echo $id?>" required autocomplete="off">
            </div>
          </div>
          <div class="input-div focus">
            <div class="i">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div>
              <h5>PASSWORD</h5>
              <input type="text" class="userid" name='password'  value = "<?php echo $pass?>"required autocomplete="off">
            </div>
          </div>
          
          <input type="submit" class='btn' value='UPDATE'>
          <input type="button" class='btn' value='CANCEL' id='cancel'>
        </form>
      </div>
    </div>
    
    <script>
      swal("Admin With password '<?php echo $pass?>' Already Exists!!", "Try using another username and password", "error");
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
            $("#cancel").click(function(){
                window.location.assign("manageadmin.php");
        });
        });
    
    </script>
    
    
    
    
    
    
</body>
</html>