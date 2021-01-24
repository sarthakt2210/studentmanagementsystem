<?php

include "databaseconfig.php";

include "links.php";

$adid = $_GET['StudentID'];

$q1 = "SELECT * FROM student WHERE adid = '$adid' ";
$r1 = mysqli_query($con,$q1);
$r12 = mysqli_fetch_assoc($r1);

$q2 = "SELECT * FROM marks WHERE adid = '$adid' ";
$r2 = mysqli_query($con,$q2);
$r22 = mysqli_fetch_assoc($r2);

$orgDate = $r12['dob'];  
$dob = date("d-m-Y", strtotime($orgDate));  

$per = (int)$r22['percentage'];




if($per <= '100' and $per >= 90){
    $grade = "A+";
    $remark = "Brilliant Student";
    $tr ="Keep going!! Hard work always pays off. ";
}elseif($per < 90 and $per >= 75){
    $grade = "A";
    $remark = "Execellent Student";
    $tr ="Keep going!! Hard work always pays off. ";
}elseif($per < 75 and $per >= 65){
    $grade = "B";
    $remark = "Good Student";
    $tr ="Good !! But still chances of Improvement ";
}elseif($per < 65 and $per >= 45){
    $grade = "C";
    $remark = "Average Student";
    $tr ="Need to Work hard!! Not Satisfactory. ";
}elseif($per < 45 and $per >= 0){
    $grade = "D";
    $remark = "Poor Student";
    $tr ="Need to Work very hard!! Not  up to the mark ";
};





?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <title><?php echo $r12['name']?></title>
  </head>


<style>
    #sidebar img{
        position:fixed;
        top: 0;
        left: 0;
        background-color:white;
    }

</style>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        
        <div class="navbar__left">
          <a class="active_link" href="#"><?php echo $r12['adid']?> __ <?php echo $r12['name']?></a>
        </div>
        
        <div class="navbar__right">
          
          <a href="teacherlogout.php">
            <i class="fas fa-power-off" aria-hidden="true"title="Logout"></i>
          </a>
          <a href="#">
            <img width="30" src="avtar.svg" alt="" />
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Father Name</p>
                <span class="font-bold text-title"><?php echo $r12['fname']?></span>
              </div>
            </div>

            <div class="card">
              <i class="fa fa-user-o fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Mother Name</p>
                <span class="font-bold text-title"><?php echo $r12['mname']?></span>
              </div>
            </div>

            <div class="card">
              <i
                class="far fa-calendar-alt fa-2x text-yellow"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Date Of Birth</p>
                <span class="font-bold text-title" style="font-size:1rem;"><?php echo $dob;?> </span>
              </div>
            </div>

            <div class="card">
              <i
                class="fas fa-at fa-2x text-green"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">E_Mail</p>
                <span class="font-bold text-title" style="font-size:1rem;"><?php echo $r12['email'];?></span>
              </div>
            </div>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Academic Report</h1>
                  <p><?php echo $r12['name']?> <?php echo $r12['adid']?></p>
                </div>
                <i class="fa fa-award" aria-hidden="true"></i>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Overall Remark</h1>
                  <p><?php echo $r12['name']?> <?php echo $r12['adid']?></p>
                </div>
                <i class="fas fa-user-graduate" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <p>Percentage</p>
                  <h1><?php echo $r22['percentage']?>%</h1>
                </div>

                <div class="card2">
                  <p>Grade</p>
                  <h1>"<?php echo $grade?>"</h1>
                </div>

                <div class="card3">
                    <p>Remark</p>
                    <h1>"<?php echo $remark?>"</h1>
                </div>

                <div class="card4">
                    <p>Teacher Remarks</p>
                    <h1 style="font-size:1.2rem;">"<?php echo $tr?>"</h1>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>

      <div id="sidebar">
          <img src="<?php echo $r12['profile']?>" width="227.5px" alt="" srcset="">
          <img src="https://media.giphy.com/media/YmzO3P2e4qYkitoVcF/giphy.gif" class="gif" id="gif" alt="" srcset="">
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
    // This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
    var options = {
        series: [
        {
            name: "TERM 1",
            data: [<?php echo (int)$r22['english1'];?>, 
            <?php echo (int)$r22['hindi_maths1'];?>,
            <?php echo (int)$r22['cs_bio1'];?>,
            <?php echo (int)$r22['physics1'];?> ,
            <?php echo (int)$r22['chemistry1'];?>],
        },
        {
            name: "TERM 2",
            data: [<?php echo (int)$r22['english2'];?>, 
            <?php echo (int)$r22['hindi_maths2'];?>,
            <?php echo (int)$r22['cs_bio2'];?>,
            <?php echo (int)$r22['physics2'];?> ,
            <?php echo (int)$r22['chemistry2'];?>],
        },
        
        ],
        chart: {
        type: "bar",
        height: 250, // make this 250
        sparkline: {
            enabled: true, // make this true
        },
        },
        plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
        },
        },
        dataLabels: {
        enabled: false,
        },
        stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
        },
        xaxis: {
        categories: ["English", "Hindi/Maths", "Computer ScienceS/Biology", "Physics", "Chemistry"],
        },
        yaxis: {
        },
        fill: {
        opacity: 1,
        },
        
    };
    
    var chart = new ApexCharts(document.querySelector("#apex1"), options);
    chart.render();
    
    // Sidebar Toggle Codes;
    
    var sidebarOpen = false;
    var sidebar = document.getElementById("sidebar");
    var sidebarCloseIcon = document.getElementById("sidebarIcon");
    
    function toggleSidebar() {
        if (!sidebarOpen) {
        sidebar.classList.add("sidebar_responsive");
        sidebarOpen = true;
        }
    }
    
    function closeSidebar() {
        if (sidebarOpen) {
        sidebar.classList.remove("sidebar_responsive");
        sidebarOpen = false;
        }
    }
    </script>
  </body>
</html>