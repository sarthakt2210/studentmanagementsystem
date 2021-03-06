<?php

// if(isset($_SESSION['user'])){
    
// }else{
//   header("location: ../errorpage.php");
// }


include "links.php";
include 'databaseconfig.php';
$teacher = $_SESSION['user'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stdadd.css">
    <!-- <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/3.3.7/iso_bootstrap3.3.7min.css"> -->
    <script type="text/javascript" src="./bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="./bootstrap-datepicker.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" 
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Imbue:wght@700&display=swap" rel="stylesheet">
    <title>ADD STUDENT</title>
</head>
<style>
    
    .back img{
        position: fixed;
        height: 100vh;
        fill: none;
        top: 0;
        left: 0;
        width: 100%;
        object-fit: cover;
        z-index: -1;
        overflow: hidden;
        
    }
   
    .list-unstyled{
        font-size:1.5rem;
    }
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;

    }

    body{
        font-family: 'Imbue', serif;
        overflow-y: hidden;
    }
    .back{
        position: fixed;
        height: 100vh;
        fill: none;
        top: 0;
        left: 0;
        width: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .container123{
        width: 100vw;
        height: 70vh;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap: 7rem;
        padding: 0 2rem;
        font-family: 'Imbue', serif;

    }
    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .img img{
        width: 400px;
    }
    .avatar{
        width: 100px;
        justify-self: center;
    }
    .addstd{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        width: 1000px;
        margin:0;
        padding:0;
        transform:translateY(-5%)
    }

    form h2{
        font-size: 3rem;
        text-transform: uppercase;
        margin: 0;
        color: #430745;
        padding:0;
        text-align:center;

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
        background-color: #942F97;
        transition: .3s;

    }
    .input-div::after{
        right: 50%;
    }
    .input-div::before{
        left: 50%;
    }

    .input-div.focus .i i{
        color: #A82BBB;
    }
    .input-div.focus div h5{
        top: -5px;
        font-size: 15px;
        color:#942F97;
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
        font-size:1.8rem;

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
        color: white;
        font-size: 18px;
        transition: .3s;
        padding-bottom:4% !important;
        opacity:1 !important;
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
        font-size: 1.8rem;
        font-family: 'Imbue', serif;
        color: black ;
    }

    .btn{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        margin: 1rem 0;
        font-size: 2.5rem;
        outline: none;
        border: none;
        background-image: linear-gradient(to right , #7F0C91,#AB1CC1,#7F0C91);
        cursor:pointer;
        color: #ffffff;
        font-family: 'Imbue', serif;
        background-size: 200%;
        transition: .5s;
        text-transform: uppercase;
        transform:translateY(-20%);

    }
    .btn:hover{
        background-position: right;
    }
    .drop-zone123 {
    max-width: 200px;
    height: 200px;
    padding: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-family: "Quicksand", sans-serif;
    font-weight: 500;
    font-size: 20px;
    cursor: pointer;
    color: #cccccc;
    border: 4px dashed #009578;
    border-radius: 10px;
    /* position:absolute;
    top:25%;
    left:0%; */
    }

    .drop-zone--over {
    border-style: solid;
    }

    .drop-zone__input123 {
    display: none;
    }

    .drop-zone__thumb {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    background-color: #cccccc;
    background-size: cover;
    position: relative;
    }

    .drop-zone__thumb::after {
    content: attr(data-label);
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 5px 0;
    color: #ffffff;
    background: rgba(0, 0, 0, 0.75);
    font-size: 14px;
    text-align: center;
    }
    .column_grid{
        display:flex;
        width:100%;
        padding-top:1%;


        /* grid-column:1fr 1fr; */
    }
    .column_grid div{
        -ms-flex: 1;  /* IE 10 */  
        flex: 1;
    }
    input[type=date]:required:invalid::-webkit-datetime-edit {
        color: transparent;
    }
    input[type=date]:focus::-webkit-datetime-edit {
        color: black !important;
    }
    /* input[type=date]::-webkit-inner-spin-button,
    input[type=date]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type=date] {
        -moz-appearance: textfield;
    } */

</style>
<body>
<div class="bootstrap">
        <div class="back">
            <img src="./img/add_std_back123.jpg" alt="">
        </div>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Teacher <br><?php echo $_SESSION['user'];?></h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="options"><i class="fas fa-school"></i> OPTIONS</p>
                    <li >
                        <a href="teacherdash.php"  aria-expanded="false"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fas fa-user-graduate"></i> Add Student</a>
                    </li>
                    <li>
                        <a href="managestudent.php"><i class="fas fa-tasks"></i> Manage Student</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-pencil-alt"></i> Marks Add and Update</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="updatemarks.php"><i class="fas fa-sort-numeric-up-alt"></i> Term 1</a></li>
                            <li><a href="updatemarks.php"><i class="fas fa-sort-numeric-up-alt"></i> Term 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="myaccount.php"><i class="fas fa-user-shield"></i> My Account</a>
                    </li>
                    
                </ul>

                
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
                        <div class="navbar-brand mx-auto" href='#'>ADD STUDENT</div>

                        <!-- <div class="page_name"><h1>ADMIN DASH</h1></div> -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <div class="teacher_logged">
                                <li class='teacher_logged_name'>Teacher <?php echo $_SESSION['user'];?></li>
                                <li><button class="logout" id="logout">LOGOUT</button></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>    
            
                <div class="contaner123">
                    <!-- <div class="img">
                        <img  src="./img/teacher_back.svg" alt="">
                    </div> -->
                    <div class="addstd">
                        <form action="studentadd_database.php" method="POST" enctype="multipart/form-data">
                        <h2>NEW STUDENT</h2>
                        <div class="column_grid">
                            <div class="firstcolumn">
                                <div class="input-div">
                                    <div class="i">
                                    <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div>
                                    <h5>STUDENT NAME</h5>
                                    <input type="text" class="name" name='name' required >
                                    </div>
                                </div>
                                <div class="input-div">
                                    <div class="i">
                                    <i class="fas fa-id-card"></i>
                                    </div>
                                    <div>
                                    <h5>ADMISSION ID</h5>
                                    <input type="text" class="adid" name='adid' required>
                                    </div>
                                </div>
                                <div class="input-div">
                                    <div class="i">
                                    <i class="fas fa-calendar-week"></i>
                                    </div>
                                    <div>
                                    <h5>DATE OF BIRTH</h5>
                                    <!-- <div class="dates" style="margin-top:100px;color:#2471a3;"> -->
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    <input type="date" class="dob" name='dob'  format="dd-mm-yyyy" required>
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    </div>
                                    
                                </div>
                                <div class="input-div">
                                    <div class="i">
                                    <i class="far fa-user"></i>
                                    </div>
                                    <div>
                                    <h5>MOTHER NAME</h5>
                                    <input type="text" class="mname" name='mname' required>
                                    </div>
                                </div>
                                <div class="input-div">
                                    <div class="i">
                                    <i class="far fa-user"></i>
                                    </div>
                                    <div>
                                    <h5>FATHER NAME</h5>
                                    <input type="text" class="fname" name='fname' required>
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
                            </div>
                            <div class="second">
                                <div class="drop-zone" style="      min-width: 400px;
                                                                    height: 370px;
                                                                    padding-left: 25px;
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    text-align: center;
                                                                    font-weight: 500;
                                                                    font-size: 20px;
                                                                    cursor: pointer;
                                                                    padding:10%;
                                                                    color: #cccccc;
                                                                    border: 4px dashed #490454 ;
                                                                    border-radius: 10px;">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="profile" id="profile" class="drop-zone__input" style="display: none;"  accept="image/*">
                                    
                                </div>
                                <label for="">Click again to update the image</label>
                            </div>
                        </div>
                        <input type="submit" class='btn' value='addnew student'>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
</div>     




        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php

        if(isset($_SESSION['std_add_sucess'])){
            $name = $_SESSION['std_name'];
            ?><script>swal("STUDENT <?php echo $name?>", "Added successfully", "success");</script>
            <?php
            unset($_SESSION['std_add_sucess']);
            unset($_SESSION['std_name']);
        }
        ?>
         <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
            $(function(){
                $('#sidebarCollapse').trigger('click');
            });
            document.getElementById("sidebar").classList.remove("active");
            $(function(){
                $("#logout").click(function(){
                    window.location.assign("teacherlogout.php");
                });
            });
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
            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

            
         </script>
</body>
</html>