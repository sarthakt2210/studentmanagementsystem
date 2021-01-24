<?php
include 'links.php';
include 'databaseconfig.php';
$admin = $_SESSION['user'];
$query = "SELECT passwords FROM admin_pass WHERE id = '$admin' ";
$result = mysqli_query($con,$query); 
$r = mysqli_fetch_array($result);
$currentpass = $r['passwords'] ; 

$wrong_pass = $_GET['pass'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_nav.css">
    <link rel="stylesheet" href="myaccount.css">
    <!-- <link rel="stylesheet" href="teacherupdate.css"> -->
    <title>ADMIN-My Account</title>
</head>
<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;

    }
    .myaccount{
        height:80vh;
        position:fixed;
    }
    .admin{
    z-index: +1;
    top:52%;
    left:8%;
    position:fixed;
    padding:0;
    justfy-content:flex-start;
    width:auto;
    font-size:3rem;

    margin:0;
    }
    .admin_cont{
        width:50%;
        display:flex;
        
    }
    .change{
        left:60%;
        position:fixed;
        top:50%;
    }
    .password1 h2{
       position:fixed;
       width:50%;
       left:50%;
       font-size:3rem;
       text-align:center;

    }
    .password1{
        padding-right:20%;
    }
    span{
        color:#950F17 ;

    }
    .container{
        width: 100vw;
        height: 70vh;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap: 7rem;
        padding: 0 2rem;

    }
    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .img img{
        width: 400px;
    }

    .addteach{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        width: 350px;
    }

    .input-div{
        display: grid;
        grid-template-columns: 7% 93%;
        margin: 20px 0;
        padding:0;
        border-bottom: 2px solid #d9d9d9;
        margin-top: 0;
        position: relative;
    }

    .input-div::after , .input-div::before{
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0;
        height: 2px;
        background-color: #700DAD ;
        transition: .3s;

    }
    .input-div::after{
        right: 50%;
    }
    .input-div::before{
        left: 50%;
    }

    .input-div.focus .i i{
        color: #700DAD ;
    }
    .input-div.focus div h5{
        top: -5px;
        font-size: 15px;
        color:#700DAD;
    }

    .input-div.focus::after , .input-div.focus::before{
        width: 50%;
    }

    .i{
        justify-content: center;
        display: flex;
        align-items: center;
    }

    .i i{
        color: #d9d9d9;
        transition: .3s;

    }
    .input-div > div{
        position: relative;
        height: 40px;
    }
    .input-div > div h5{
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color:#ffff;
        font-size: 18px;
        transition: .3s;
    }


    .input-div input{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: none;
        outline: none;
        background: none;
        padding: 0.5rem;
        font-size: 1.2rem;
        font-family: 'Poppins',sans-serif;
        color: black;
    }

    .btn{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        margin: 1rem 0;
        font-size: 1.2rem;
        outline: none;
        border: none;
        background-image: linear-gradient(to right , #700DAD ,#8828C2 ,#700DAD );
        cursor:pointer;
        color: #ffffff;
        font-family: 'Poppins',sans-serif;
        background-size: 200%;
        transition: .5s;
        text-transform: uppercase;

    }
    .btn:hover{
        background-position: right;
    }

</style>
<body>
    <img src=".\img\myaccount_back.jpg" class="back" alt="">
    <div class="nav_bar_admin">
        <div class="admin_logged">
            <h1 class='admin_log_nav'><?php echo $_SESSION['user'];?></h1>
            <button class="logout" id='logout'>LOGOUT</button>
        </div>
        <ul>
            <li><a href="./admindash.php">HOME</a></li>
            <div class="active_link">
                <li><a href="./myaccount.php">MY ACCOUNT</a></li>
            </div>
            <li><a href="./teacheradd.php">ADD TEACHER</a></li> 
            <li><a href="./manageteacher.php">MANAGE TEACHERS</a></li>
            
        </ul>
    </div>
    <div class="admin_cont">
        <img src="./img/myaccount.svg"  class="myaccount" alt="">
        <h1 class="admin"><?php echo $_SESSION['user']?></h1>
        <div class="password1">
            <h2 id="password">CURRENT PASSWORD <br> <span id="admin_pass"><?php echo $currentpass ;?></span></h2>
        </div>
        <form class="change" action="admin_pass_change.php" method="post">
            <div class="input-div focus">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                <h5>NEW PASSWORD</h5>
                <input type="text" class="password" name='password' value="<?php echo $wrong_pass ?> " required>
                </div>
            </div>
            <input type="submit" class='btn' value='Change Password'>
        </form>
    </div>
    

</body>
    <script>
    swal(" '<?php echo $wrong_pass;?>' PASSWORD ALREADY EXISTS", "TRY USING ANOTHER PASSWORD", "error");
    $(function(){
            $("#logout").click(function(){
                window.location.assign("adminlogout.php");
        });
    });
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
    <?php
    if(isset($_SESSION['admin_no_change'])){
      ?><script>swal("<?php echo $_SESSION['user'];?> PASSWORD NOT UPDATED", "NO CHANGE IN PASSWORD.", "warning");</script>
      <?php
      unset($_SESSION['admin_no_change']);
    }
    if(isset($_SESSION['admin_new_pass'])){
        ?><script>swal("PASSWORD UPDATED SUCCESSFULLY.", "<?php echo $_SESSION['user'];?> AND PASSWORD <?php echo $_GET['newpass']?>", "success");</script>
        <?php
        unset($_SESSION['admin_new_pass']);
    }
    ?>
    
</html>