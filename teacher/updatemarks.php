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
    <link href="https://fonts.googleapis.com/css2?family=Nova+Cut&display=swap" rel="stylesheet">
    <title>MANAGE STUDENT MARKS</title>
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
        overflow-y:scroll;
    }
    .container{
        justify-content:center;
        font-family: 'Nova Cut', cursive;
    }
    .heading{
    font-weight: 800;
    font-size: 2rem;
    position:relative;
    text-align:center;
    
    }
    .content-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    padding:1.2rem;
    
    text-align: center;
    }

    .content-table thead tr {
    background-color: #801C8F;
    color: #ffffff;
    text-align: center;
    font-weight: bold;
    justify-content:center;
    }

    .content-table th,
    .content-table td {
    padding: 12px 15px;
    text-align:center;
    }

    .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    opacity:0.7;
    }

    .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #801C8F;
    }
    .fa-trash-alt {
        color: #DF1F2D;
        font-size:2rem;
    }
    .fa-user-edit{
        color:#197313;
        font-size:2rem;
    }
    .img img{
        position: fixed;
        top: 25%;
        left: 50%;
        width:50%;
        z-index:-1;
    }
    

</style>
<body>
<div class="bootstrap">
        <div class="back">
            <img src="./img/add_std_back123.jpg" alt="">
        </div>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" >
                <div class="sidebar-header">
                    <h3>Teacher <br><?php echo $_SESSION['user'];?></h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="options"><i class="fas fa-school"></i> OPTIONS</p>
                    <li >
                        <a href="teacherdash.php"  aria-expanded="false"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="addstudent.php"><i class="fas fa-user-graduate"></i> Add Student</a>
                    </li>
                    <li>
                        <a href="managestudent.php"><i class="fas fa-tasks"></i> Manage Student</a>
                    </li>
                    <li class="active">
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
                        <div class="navbar-brand mx-auto" href='#'>MANAGE STUDENTS MARKS</div>

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
                    <div class="container">
                        <h2 class='heading'>STUDENTS MARKS</h2>
                        <table class="content-table">
                            <thead>
                                <tr>
                                <th rowspan="2">ADMISSION ID</th>
                                <th rowspan="2">NAME</th>
                                <th colspan="2" >ENGLISH</th>
                                <th colspan="2">HINDI/MATHS</th>
                                <th colspan="2">CS/BIOLOGY</th>
                                <th colspan="2">PHYSICS</th>
                                <th colspan="2">CHEMISTRY</th>
                                <th rowspan="2">PERCENTAGE</th>
                                <th rowspan="2">ACTIONS</th>
                                </tr>
                                <tr>
                                <!-- <th>ADMISSION ID</th>
                                <th>NAME</th> -->
                                <th>TERM 1</th>
                                <th>TERM 2</th>
                                <th>TERM 1</th>
                                <th>TERM 2</th>
                                <th>TERM 1</th>
                                <th>TERM 2</th>
                                <th>TERM 1</th>
                                <th>TERM 2</th>
                                <th>TERM 1</th>
                                <th>TERM 2</th>
                                
                                
                                </tr>
                            </thead>
                            <tbody>
                            <!-- <tr>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                <td>12</td>
                                
                                <td>12</td>
                            </tr> -->


                    <?php
                    $select_teach_query12 = 'SELECT * FROM marks ORDER BY `adid` ';
                    $query12=mysqli_query($con,$select_teach_query12);
                    $r1 = mysqli_fetch_assoc($query12);
              
                    while ($r1 = mysqli_fetch_assoc($query12) ) {
                    ?> 
                    
                            <tr>
                                <td><?php echo $r1['name'] ?></td>
                                <td><?php echo $r1['adid'] ?></td>
                                <td><?php echo $r1['english1'] ?></td>
                                <td><?php echo $r1['english2'] ?></td>
                                <td><?php echo $r1['hindi_maths1'] ?></td>
                                <td><?php echo $r1['hindi_maths2'] ?></td>
                                <td><?php echo $r1['cs_bio1'] ?></td>
                                <td><?php echo $r1['cs_bio2'] ?></td>
                                <td><?php echo $r1['physics1'] ?></td>
                                <td><?php echo $r1['physics2'] ?></td>
                                <td><?php echo $r1['chemistry1'] ?></td>
                                <td><?php echo $r1['chemistry2'] ?></td>
                                <td><?php echo $r1['percentage'] ?></td>
                                
                                <td><a href="update_marks_std.php?adid=<?php echo $r1['adid'] ?>"><i class="fas fa-user-edit" title="edit"></i></a></td>
                            </tr>
                    <?php
                        }



                    ?>
                            </tbody>
                        </table>
                        </div>
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

        if(isset($_SESSION['marks_update_success'])){
            $name = $_GET['name'];
            $adid = $_GET['adid'];
            ?><script>swal("STUDENT <?php echo $adid ?> <?php echo $name?> ", "Marks Updated successfully", "success");</script>
            <?php
            unset($_SESSION['marks_update_success']);
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
            // $(document).ready(function () {
            //     $('#sidebarCollapse').on('click', function () {
            //         $('#sidebar').toggleClass('active');
            //         $(this).removeClass('active');
            //     });
            // });
            // $(document).ready(function () {
            //     $("#sidebar").click(function(){
            //         $(this).toggleClass('active');
            //         if($("#sidebar").hasClass('active')){
            //             $(this).removeClass('active');
            //         }
            //     })
            // });
            
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