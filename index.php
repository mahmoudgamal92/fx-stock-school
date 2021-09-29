<?php
session_start();
include_once 'components/dbconnect.php';
include "lang/config.php";
?>

<?php
$total_views;
$date = date("y-m-d");
$query1="select * from visitors where date ='$date'";
$result = mysqli_query($con,$query1);
if ($result->num_rows == 0)
{
$insert_query = "insert into visitors (date) values ('$date')";
mysqli_query($con,$insert_query);
}
else 
{
    $update_Query = "update visitors set today_views = today_views+1 where date = '$date'";
    mysqli_query($con,$update_Query);  
}
?>


<?php
function get_setting($title)
{
  $con= new mysqli('localhost','root','','fxstockschool') 
  or die ("connection erorr".mysqli_error($con));
  $con->query('SET NAMES UTF8');
  $con->query('SET CHARACTER SET UTF8');
  
  $cmd = "select * from settings where title = '$title'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  return $row['value'];
}
?>


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FX Stock School</title>
        <meta name="description" content="economy , eur , nzd,">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="css/dripicons.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
            <?php
            if($_SESSION['lang'] != "en")
            {
            ?>
                <link rel="stylesheet" type="text/css" href="css/css-rtl.css">
                <?php
            }
     ?>
<style>

#auth_a{
    display:none;
}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    #auth_a{
    display:inline-block;
}
}


   
#lang_a{
    display:none;
}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    #lang_a{
    display:inline-block;
}
}

</style>


     <style> 
    
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius:20px
}

/* Set a style for all buttons */


/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index:999999999999;

}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    .modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 100%;
   /* Could be more or less, depending on screen size */
}
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
     </style>
    </head>
<body>
<?php
include 'components/navbar.php';
?>
    <!-- main-area -->
    <main>

    <!--- Login Modal ---->
    <div id="id01" class="modal">
    <form class="modal-content animate" action="signin.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname" style="width:100%"><span> <?php echo $lang['email']; ?> </span></label>
      <input type="text" placeholder="<?php echo $lang['email']; ?>" name="email" required>

      <label for="psw" style="width:100%"><b><?php echo $lang['password']; ?></b></label>
      <input type="password" placeholder="<?php echo $lang['password']; ?>" name="password" required>
        
      <button class="btn" type="submit" style="width:100%;margin-top:20px;margin-bottom:30px">
      <?php echo $lang['signin']; ?>
    </button>
 
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn">Cancel</button>
      <span class="psw">
        Don't Have Account 
      <a href="#" onclick="switch_modals()">
        SignUp?
      </a>
      </span>
    </div>
    </form>
    </div>


    <!--- Registration Modal ---->
    <div id="id02" class="modal">
    <form class="modal-content animate" action="signup.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <div class="row">

    <div class="col-md-6">
    <label for="uname"><b>Frist Name</b></label>
      <input type="text" placeholder="Frist Name" name="f_name" required>
    </div>

    <div class="col-md-6">
    <label for="uname"><b>Last Name</b></label>
      <input type="text" placeholder="Last Name" name="l_name" required>
    </div>

    </div>

      <div class="row">
      <div class="col-md-12">
      <label for="psw"><b>Email Address</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      </div>
      </div>

      <div class="row">

      <div class="col-md-4">
      <label for="psw" style="margin-bottom: 20px;"><b>Code</b></label>
        <select class="form-control" 
        name="code" 
        style="
        border-radius: 50px;
        width: 100%;
        padding: 7px 10px 7px 10px">
        <?php
        $cmd = "select * from country_codes";
        $result = mysqli_query($con,$cmd);
        while($country = mysqli_fetch_array($result))
          {
        ?>
        <option value="<?php echo $country['key']?>">
        <?php echo "(+".$country['code'].")".$country['name'];?>
    </option>
      <?php
          }
      ?>

        </select>
      </div>

      <div class="col-md-8">
      <label for="psw"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="phone" required>
      </div>

      </div>


      <div class="row">
      <div class="col-md-12">
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" required>
      </div>
      </div>
      <!-- https://www.w3schools.com/howto/howto_js_display_checkbox_text.asp -->

      <div class="row">
      <div class="col-md-12">
      <label>
        <input type="checkbox" name="is_broker" value="1" id="BrokerCheck" onclick="check_borker()"> 
        <span style="font-size:20px;margin-top:100px">Broker Member</span>
      </label>
      </div>
    </div>


    <div id="broker_info" style="display:none">
    <div class="row" >

    <div class="col-md-6">
    <label for="uname"><b>Company Name</b></label>

      <select class="form-control" 
        name="broker_name" 
        style="border-radius:50px;height:50px;margin-top:10px">
      <?php
      $cmd = "select * from brokers";
      $res = mysqli_query($con,$cmd);
      while($row= mysqli_fetch_array($res))
      {
      ?>
      <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
        <?php
      }
        ?>
        </select>

    </div>

    <div class="col-md-6">
    <label for="uname"><b>Account number</b></label>
      <input type="text" placeholder="Account Number" name="acc_number">
    </div>
    </div>
   </div>
    
      <button class="btn" type="submit" style="width:100%;margin-top:20px;margin-bottom:30px">
      Create Account
      </button>
    
    </div>

    </form>
    </div>
        <!-- slider-area -->
        <section id="home" class="slider-area fix p-relative">

            <div class="slider-active">
                <div class="single-slider slider-bg d-flex align-items-center"
                    style="background-image:url(img/back3.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2">
                            </div>
                            <div class="col-xl-8">
                                <div class="slider-content s-slider-content text-center">
                                    <h2 data-animation="fadeInUp" data-delay=".4s"><span>
                                            FXStock </span>School.</h2>
                                    <p data-animation="fadeInUp" data-delay=".6s">
                                        Sample text For Description Sample text For Description Sample text For
                                        Description
                                        Sample text For Description Sample text For Description
                                    </p>
                                    <div class="mt-55">

                                    <?php
                                    if(isset($_SESSION['user_id']))
                                    {                                    
                                    ?>

                                        <a href="dashboard/" class="btn" data-animation="fadeInRight" data-delay=".8s">
                                          <?php echo $lang['to_dashboard'] ?>
                                        </a>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>

                                          <a onclick="document.getElementById('id01').style.display='block'"  class="btn" data-animation="fadeInRight" data-delay=".8s">
                                            <?php echo $lang['get_started'] ?>
                                        </a>

                                        <?php
                                    }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-bg d-flex align-items-center"
                    style="background-image:url(img/back2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2">
                            </div>
                            <div class="col-xl-8">
                                <div class="slider-content s-slider-content text-center">
                                    <h2 data-animation="fadeInUp" data-delay=".4s">   
                                        <span>FXStock </span>
                                           School.
                                    </h2>
                                    <p data-animation="fadeInUp" data-delay=".6s">
                                    هذا النص هو نص تجريبي يعبر عن وصف الشركه و يتم اضافتة من لوحة التحكم باللغتين المتاح بهما الموقع
                                       
                                    </p>
                                    <div class="mt-55">
                                        <a href="dashboard/" class="btn" data-animation="fadeInRight" data-delay=".8s">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a href="#about" class="down-arrow smoth-scroll"><i class="fas fa-long-arrow-alt-down"></i></a>
        </section>
        <!-- slider-area-end -->
        <!-- services-area -->
        <section id="about" class="services-area services-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center pl-40 pr-40 mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <h2>
                            <?php  echo $lang['our_services']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">  
                <?php
                $cmd = "select * from services order by id limit 3";
                $result = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_array($result))
                {
                ?>                
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="s-single-services wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="services-icon">
                                <i class="fal fa-users-crown"></i>
                            </div>
                            <div class="second-services-content">
                                <h5><?php echo $row['title_'.$_SESSION['lang']]?></h5>
                                <p>
                                <?php echo $row['desc_'.$_SESSION['lang']]?>
                                </p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>

                    <?php
                   }
                    ?>

                </div>

            </div>
        </section>
        <!-- services-area-end -->
     <!-- pricing-area -->
     <section id="pricing" class="pricing-area pt-113 pb-90 pr-20 pl-20">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-title text-center mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <span> <?php  echo $lang['pricing_list']; ?> </span>
                            <h2>   <?php  echo $lang['packages']; ?> </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php  
                    $cmd = "select * from packages";
                    $result = mysqli_query($con,$cmd);
                    while($row=mysqli_fetch_array($result))
                  {
                    ?>  
                    <div class="col-lg-3 col-md-6">
                        <div class="pricing-box active text-center mb-60 wow fadeInUp animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="pricing-head">
                                <h4 style="text-align:center">
                                <?php echo $row["name_".$_SESSION['lang']] ?>
                                </h4>
                                <div class="price-count mb-30">
                                    <h2>
                                    <small>USD</small>
                                   <?php echo $row['price'] ?>
                                    <span>  <?php echo "/".$row['subscribe_time']." Days"; ?></span>
                                    </h2>
                                </div>
                            </div>
                            <div class="pricing-body mb-40 text-left" style="min-height:200px">
                                <ul>

                                    <?php
                                    $arr =  explode(",",$row['prev']);
                                    // if(strlen($arr) > 0)
                                    // {
                                    foreach ($arr as $value):
                                    echo "<li><span>".$lang[$value]."</span></li>";
                                    endforeach;
                                   //}
                                    ?>
                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <a href="#" class="btn">Choose Plan</a>
                            </div>
                        </div>
                    </div>

                 <?php
                  }
                 ?>

                </div>
            </div>
        </section>
        <!-- pricing-area-end -->
        <!-- services-area -->
        <section id="services" class="services-area services-bg services-two pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center pl-40 pr-40 mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <span><?php  echo $lang['s&a']; ?></span>
                            <h2><?php  echo $lang['markets']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="services-icon">
                                <img src="img/002-exchange.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                                <h5>
                                <?php  echo $lang['forex']; ?>  
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".5s">
                            <div class="services-icon">
                                <img src="img/001-finance.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                                <h5>
                                <?php  echo $lang['stocks']; ?>  
                                </h5>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".5s">
                            <div class="services-icon">
                                <img src="img/033-money.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                            <h5 style="text-align:center">
                                    CFDS
                                </h5>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".5s">
                            <div class="services-icon">
                                <img src="img/032-Gold Ingots.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                                <h5 style="text-align:center">
                                <?php  echo $lang['metals']; ?>  
                                </h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".5s">
                            <div class="services-icon">
                                <img src="img/cryptocurrency.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                                <h5>
                                <?php // echo $lang['crypto']; ?>  
                                </h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="s-single-services active wow fadeInUp animated" style="text-align:center"
                            data-animation="fadeInDown animated" data-delay=".5s">
                            <div class="services-icon">
                                <img src="img/egypt.png" width="30%" />
                            </div>
                            <div class="second-services-content">
                                <h5>
                                <?php  echo $lang['egyptian_market']; ?>  
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- services-area-end -->
     
       <!-- brand-area -->
       <div class="brand-area pt-120 pb-120" style="background-color:#000026">
            <div class="container">
                <div class="row">                  
                <?php 
                $cmd = "select * from partners";
                $result = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="single-brand">
                            <a href="<?php echo $row['url']?>" target="_blank">
                            <img src="<?php echo "uploads/partners/".$row['logo'] ?>" style="width:100%;border-radius:15px;margin-bottom:50px">
                        </a>
                        </div>
                    </div>

                    <?php
                }
                    ?>


                </div>
            </div>
        </div>
        <!-- brand-area-end -->


        <!-- blog-area -->
        <section id="blog" class="blog-area  p-relative pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <span> 
                             <?php  echo $lang['new_every_day']; ?>  
                            </span>
                            <h2>
                            <?php  echo $lang['latest_nenws']; ?>  
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                $cmd = "select * from news order by id desc limit 3 ";
                $result = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post mb-30 wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="blog-thumb">
                                <a href="details.php?id=<?php echo $row['id'] ?>">
                                    <img src="Admin/uploads/news/<?php echo $row['poster'] ?>" alt="img"></a>
                            </div>
                            <div class="blog-content">
                                <div class="b-meta mb-20">
                                <ul>
                                        <li><a href="#">FX Stock School</a></li>
                                        <li><a href="#"><?php echo $row['date_added'] ?></a></li>
                                    </ul>
                                </div>
                                <h4>
                                <a href="details.php?id=<?php echo $row['id'] ?>">
                                  <?php echo $row['title_'.$_SESSION['lang']] ?>
                                </a>
                                    </h4>
                                <p><?php echo $row['subtitle_'.$_SESSION['lang']] ?></p>
                                    <a href="details.php?id=<?php echo $row['id'] ?>" 
                                    class="btn blog-btn">
                                    Read More
                                    </a>
                            </div>
                        </div>
                    </div>
                    <?php
                  }
                    ?>

                </div>
            </div>
        </section>
        <!-- blog-area-end -->
  
       
    </main>
    <!-- main-area-end -->

    <!-- footer -->
   <?php  
include 'components/footer.php';
   ?>
    <!-- footer-end -->
<script>
function check_borker() {
  // Get the checkbox
  var checkBox = document.getElementById("BrokerCheck");
  // Get the output text
  var broker_div = document.getElementById("broker_info");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    broker_div.style.display = "block";
  } else {
    broker_div.style.display = "none";
  }
}
</script>
<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
function switch_modals(){

var signin = document.getElementById('id01');
var signup = document.getElementById('id02');
if(signin.style.display = "block")
{
    signin.style.display = "none";
    signup.style.display = "block";
}
else if(signup.style.display = "block")
{
    signup.style.display = "none";
    signin.style.display = "block";
}
}
</script>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/paroller.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/js_isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/parallax-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/element-in-view.js"></script>
    <script src="js/main.js"></script>

        <?php
        if(isset($_SESSION['user_id']))
        {
        ?>

       <script>
     document.getElementById('auth_a').innerHTML="<?php 
     echo $lang['welcome'].$_SESSION['first_name']." ". $_SESSION['last_name'] ?>";
        // document.getElementById('auth_a').onclick= function(){ document.getElementById('id01').style.display='block';};

    </script>
        <?php
        }
        else{
        ?>
          <script>
     document.getElementById('auth_a').innerHTML="<?php echo $lang['signin'] ?>";
     document.getElementById('auth_a').onclick= function(){ document.getElementById('id01').style.display='block';};
    
    </script>

    <?php
        }
    ?>


<script>
setInterval(
function() {
   const last_access = new XMLHttpRequest();
   var token = "<?php echo $_SESSION['user_token']; ?>";
   last_access.open('POST', 'update_lastaccess.php', true);
   last_access.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   last_access.send("user_token="+token);
        },1000);
</script>
</body>
</html>