<?php

// if(isset($_SESSION['user'])){
    
// }else{
//   header("location: ../errorpage.php");
// }


include "links.php";
include 'databaseconfig.php';
$teacher = $_SESSION['user'];

$adid = $_GET['adid'];

$_SESSION['update_marks_std_adid']=$adid;

$select_teach_query = "SELECT * FROM STUDENT WHERE adid='$adid' ";
$query=mysqli_query($con,$select_teach_query);
$r = mysqli_fetch_assoc($query);

$name = $r['name'];
$adid = $r['adid'];

$_SESSION['update_marks_std_name']=$name;


$select_teach_query12 = "SELECT * FROM marks WHERE adid='$adid' ";
$query12=mysqli_query($con,$select_teach_query12);
$r12 = mysqli_fetch_assoc($query12);




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
    <title>STUDENT MARKS UPDATE</title>
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
        justify-content:center;
        

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
        transform:translateY(5%)
        
    }

    form h2{
        font-size: 5rem;
        text-transform: uppercase;
        margin: 0;
        color: #430745;
        padding:0;
        text-align:center;

    }
    form h3{
        font-size: 3rem;
        text-transform: uppercase;
        margin: 0;
        color: #5C0C68;
        padding:0;
        text-align:center;

    }
    form h3 span{
        color:black;
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
        padding-right:55%;
    }

    .i i{
        color: #d9d9d9;
        transition: .3s;
        font-size:3rem;
        transform:translateY(-30%);
        

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
    :root {
        --bg: #e3e4e8;
        --bgT: #e3e4e800;
        --fg: #17181c;
        --inputBg: #fff;
        --handleBg:#821264;
        --handleDownBg: #821264;
        --handleTrackBg: #821264;
        /* font-size: calc(16px + (32 - 16)*(100vw - 320px)/(2560 - 320)); */
    }
  
    .range, .range__counter {
        display: flex;
        transform:translateY(30%);
    }
    /* body {
        background-color: var(--bg);
        height: 100vh;
    } */
    input, .range__input, .range__counter-sr {
        width: 100%;
    }
    /* form {
        margin: auto;
        padding: 0 0.75em;
        max-width: 17em;
    } */
   
    .range:not(:last-child) {
        margin-bottom: 1em;
    }
    .range input[type=range],
    .range input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none; 
        appearance: none;
    }
    .range input[type=range], .range__input-fill {
        border-radius: 0.25em;
        height: 0.5em;
    }
    .range input[type=range] {
        background-color: var(--inputBg);
        display: block;
        margin: 0.5em 0;
        padding: 0;
    }
    .range input[type=range]:focus {
        outline: transparent;
    }
    .range input[type=range]::-webkit-slider-thumb {
        background-color: var(--handleBg);
        border: 0;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        transition: background 0.1s linear;
        width: 1.25em;
        height: 1.25em;
        z-index: 1;
    }
    .range input[type=range]::-moz-range-thumb {
        background-color: var(--handleBg);
        border: 0;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        transform: translateZ(1px);
        transition: background-color 0.1s linear;
        width: 1.5em;
        height: 1.5em;
        z-index: 1;
    }
    .range input[type=range]::-moz-focus-outer {
        border: 0;
    }
    .range__input, .range__input-fill, .range__counter-column, .range__counter-digit {
        display: block;
    }
    .range__input, .range__counter {
        position: relative;
    }
    .range__input {
        margin-right: 0.375em;
    }
    .range__input:active input[type=range]::-webkit-slider-thumb,
    .range input[type=range]:focus::-webkit-slider-thumb,
    .range input[type=range]::-webkit-slider-thumb:hover {
        background-color: var(--handleDownBg);
    }
    .range__input:active input[type=range]::-moz-range-thumb,
    .range input[type=range]:focus::-moz-range-thumb,
    .range input[type=range]::-moz-range-thumb:hover {
        background-color: var(--handleDownBg);
    }
    .range__input-fill, .range__counter-sr {
        position: absolute;
        left: 0;
    }
    .range__input-fill {
        background-color: var(--handleTrackBg);
        pointer-events: none;
        top: calc(50% - 0.5em);
    }
    .range__counter, .range__counter-digit {
        height: 1.5em;
    }
    .range__counter {
        margin: auto 0;
        overflow: hidden;
        text-align: center;
    }
    .range__counter-sr {
        background-image: linear-gradient(var(--bg),var(--bgT) 0.3em 1.2em,var(--bg));
        color: transparent;
        letter-spacing: 0.06em;
        top: 0;
        text-align: right;
        z-index: 1;
    }
    .range__counter-column {
        transition: transform 0.25s ease-in-out;
        width: 0.96em;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }
    .range__counter-column--pause {
        transition: none;
    }
    .column_grid > div{
        margin-left:5%;
        margin-right:5%;

    }

</style>
<body>
<div class="bootstrap">
        <div class="back">
            <img src="./img/add_std_back123.jpg" alt="">
        </div>
        
            
                <div class="contaner123">
                    <!-- <div class="img">
                        <img  src="./img/teacher_back.svg" alt="">
                    </div> -->
                    <div class="addstd">
                        <form action="student_marks_update_database.php" method="POST" enctype="multipart/form-data">
                        <h2>UPDATE MARKS  </h2>
                        <h3><i class="fas fa-id-card"></i> Admission Code:<span> <?php echo $adid; ?></span></h3>
                        <h3><i class="fas fa-user-graduate"></i> Name :<span><?php echo $name?></span></h3>
                        <div class="column_grid">
                            <div class="firstcolumn">
                                <h3>TERM 1</h3>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fab fa-acquisitions-incorporated"></i>
                                    </div>
                                    <div>
                                    <h5>ENGLISH</h5>
                                    <input id="english1" name="english1" type="range" min="0" max="100" value="<?php echo $r12['english1']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fab fa-500px"></i>
                                    </div>
                                    <div>
                                    <h5>HINDI/MATHS</h5>
                                    <input id="hindi_maths1" name="hindi_maths1" type="range" min="0" max="100" value="<?php echo $r12['hindi_maths1']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-laptop-medical"></i>
                                    </div>
                                    <div>
                                    <h5>COMPUTER SCIENCE/BIOLOGY</h5>
                                    <!-- <div class="dates" style="margin-top:100px;color:#2471a3;"> -->
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    <input id="cs_bio1" name="cs_bio1" type="range" min="0" max="100" value="<?php echo $r12['cs_bio1']?>">
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    </div>
                                    
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-atom"></i>
                                    </div>
                                    <div>
                                    <h5>PHYSICS</h5>
                                    <input id="physics1" name="physics1" type="range" min="0" max="100" value="<?php echo $r12['physics1']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-vials"></i>
                                    </div>
                                    <div>
                                    <h5>CHEMISTRY</h5>
                                    <input id="chemistry1" name="chemistry1" type="range" min="0" max="100" value="<?php echo $r12['chemistry1']?>">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="second" style="jusitfy-content:center;">
                                <h3>TERM 2</h3>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fab fa-acquisitions-incorporated"></i>
                                    </div>
                                    <div>
                                    <h5>ENGLISH</h5>
                                    <input id="english2" name="english2" type="range" min="0" max="100" value="<?php echo $r12['english2']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fab fa-500px"></i>
                                    </div>
                                    <div>
                                    <h5>HINDI/MATHS</h5>
                                    <input id="hindi_maths2" name="hindi_maths2" type="range" min="0" max="100" value="<?php echo $r12['hindi_maths2']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-laptop-medical"></i>
                                    </div>
                                    <div>
                                    <h5>COMPUTER SCIENCE/BIOLOGY</h5>
                                    <!-- <div class="dates" style="margin-top:100px;color:#2471a3;"> -->
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    <input id="cs_bio2" name="cs_bio2" type="range" min="0" max="100" value="<?php echo $r12['cs_bio2']?>">
                                        <!-- <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" > -->
                                    </div>
                                    
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-atom"></i>
                                    </div>
                                    <div>
                                    <h5>PHYSICS</h5>
                                    <input id="physics2" name="physics2" type="range" min="0" max="100" value="<?php echo $r12['physics2']?>">
                                    </div>
                                </div>
                                <div class="input-div focus">
                                    <div class="i">
                                    <i class="fas fa-vials"></i>
                                    </div>
                                    <div>
                                    <h5>CHEMISTRY</h5>
                                    <input id="chemistry2" name="chemistry2" type="range" min="0" max="100" value="<?php echo $r12['chemistry2']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class='btn' value='update student'>
                        <input type="button" class='btn' value='cancel' id="cancel">
                        </form>
                    </div>
                </div>
            
            
        </div>
        
</div>     




        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
         <script type="text/javascript">
            $(function(){
                $("#cancel").click(function(){
                    window.location.assign("updatemarks.php");
                });
            });
           
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
            window.addEventListener("DOMContentLoaded", () => {
                let range1 = new RollCounterRange("#range1"),
                    range2 = new RollCounterRange("#english1"),
                    range21 = new RollCounterRange("#hindi_maths1"),
                    range22 = new RollCounterRange("#cs_bio1"),
                    range23 = new RollCounterRange("#physics1"),
                    range24 = new RollCounterRange("#chemistry1");
                    range25 = new RollCounterRange("#english2"),
                    range26 = new RollCounterRange("#hindi_maths2"),
                    range27 = new RollCounterRange("#cs_bio2"),
                    range28 = new RollCounterRange("#physics2");
                    range29 = new RollCounterRange("#chemistry2");
            });

            class RollCounterRange {
                constructor(id) {
                    this.el = document.querySelector(id);
                    this.srValue = null;
                    this.fill = null;
                    this.digitCols = null;
                    this.lastDigits = "";
                    this.rollDuration = 0; // the transition duration from CSS will override this
                    this.trans09 = false;

                    if (this.el) {
                        this.buildSlider();
                        this.el.addEventListener("input", this.changeValue.bind(this));
                    }
                }
                buildSlider() {
                    // create a div to contain the <input>
                    let rangeWrap = document.createElement("div");
                    rangeWrap.className = "range";
                    this.el.parentElement.insertBefore(rangeWrap, this.el);

                    // create another div to contain the <input> and fill
                    let rangeInput = document.createElement("span");
                    rangeInput.className = "range__input";
                    rangeWrap.appendChild(rangeInput);

                    // range fill, place the <input> and fill inside container <span>
                    let rangeFill = document.createElement("span");
                    rangeFill.className = "range__input-fill";
                    rangeInput.appendChild(this.el);
                    rangeInput.appendChild(rangeFill);

                    // create the counter
                    let counter = document.createElement("span");
                    counter.className = "range__counter";
                    rangeWrap.appendChild(counter);

                    // screen reader value
                    let srValue = document.createElement("span");
                    srValue.className = "range__counter-sr";
                    srValue.textContent = "0";
                    counter.appendChild(srValue);

                    // column for each digit
                    for (let D of this.el.max.split("")) {
                        let digitCol = document.createElement("span");
                        digitCol.className = "range__counter-column";
                        digitCol.setAttribute("aria-hidden", "true");
                        counter.appendChild(digitCol);

                        // digits (blank, 0–9, fake 0)
                        for (let d = 0; d <= 11; ++d) {
                            let digit = document.createElement("span");
                            digit.className = "range__counter-digit";

                            if (d > 0) digit.textContent = d == 11 ? 0 : `${d - 1}`;

                            digitCol.appendChild(digit);
                        }
                    }

                    this.srValue = srValue;
                    this.fill = rangeFill;
                    this.digitCols = counter.querySelectorAll(".range__counter-column");
                    this.lastDigits = this.el.value;

                    while (this.lastDigits.length < this.digitCols.length)
                        this.lastDigits = " " + this.lastDigits;

                    this.changeValue();

                    // use the transition duration from CSS
                    let colCS = window.getComputedStyle(this.digitCols[0]),
                        transDur = colCS.getPropertyValue("transition-duration"),
                        msLabelPos = transDur.indexOf("ms"),
                        sLabelPos = transDur.indexOf("s");

                    if (msLabelPos > -1) this.rollDuration = transDur.substr(0, msLabelPos);
                    else if (sLabelPos > -1)
                        this.rollDuration = transDur.substr(0, sLabelPos) * 1e3;
                }
                changeValue() {
                    // keep the value within range
                    if (+this.el.value > this.el.max) this.el.value = this.el.max;
                    else if (+this.el.value < this.el.min) this.el.value = this.el.min;

                    // update the screen reader value
                    if (this.srValue) this.srValue.textContent = this.el.value;

                    // width of fill
                    if (this.fill) {
                        let pct = this.el.value / this.el.max,
                            fillWidth = pct * 100,
                            thumbEm = 1 - pct;

                        this.fill.style.width = `calc(${fillWidth}% + ${thumbEm}em)`;
                    }

                    if (this.digitCols) {
                        let rangeVal = this.el.value;

                        // add blanks at the start if needed
                        while (rangeVal.length < this.digitCols.length) rangeVal = " " + rangeVal;

                        // get the differences between current and last digits
                        let diffsFromLast = [];
                        if (this.lastDigits) {
                            rangeVal.split("").forEach((r, i) => {
                                let diff = +r - this.lastDigits[i];
                                diffsFromLast.push(diff);
                            });
                        }

                        // roll the digits
                        this.trans09 = false;
                        rangeVal.split("").forEach((e, i) => {
                            let digitH = 1.5,
                                over9 = false,
                                under0 = false,
                                transY = e === " " ? 0 : -digitH * (+e + 1),
                                col = this.digitCols[i];

                            // start handling the 9-to-0 or 0-to-9 transition
                            if (e == 0 && diffsFromLast[i] == -9) {
                                transY = -digitH * 11;
                                over9 = true;
                            } else if (e == 9 && diffsFromLast[i] == 9) {
                                transY = 0;
                                under0 = true;
                            }

                            col.style.transform = `translateY(${transY}em)`;
                            col.firstChild.textContent = "";

                            // finish the transition
                            if (over9 || under0) {
                                this.trans09 = true;
                                // add a temporary 9
                                if (under0) col.firstChild.textContent = e;

                                setTimeout(() => {
                                    if (this.trans09) {
                                        let pauseClass = "range__counter-column--pause",
                                            transYAgain = -digitH * (over9 ? 1 : 10);

                                        col.classList.add(pauseClass);
                                        col.style.transform = `translateY(${transYAgain}em)`;
                                        void col.offsetHeight;
                                        col.classList.remove(pauseClass);

                                        // remove the 9
                                        if (under0) col.firstChild.textContent = "";
                                    }
                                }, this.rollDuration);
                            }
                        });
                        this.lastDigits = rangeVal;
                    }
                }
            }

         </script>
</body>
</html>