<?php
session_start();
include_once 'components/dbconnect.php';
include "lang/config.php";
?>

    <?php
        $id = $_GET['id'];
        $cmd = "select * from news where id = '$id' ";
        $result = mysqli_query($con,$cmd);
        $row = mysqli_fetch_array($result);
    ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FX Stock School</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
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
#auth_a{display:none;}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {#auth_a{display:inline-block;}}

#lang_a{display:none;}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {#lang_a{display:inline-block;}}
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
        <!-- header -->
        <?php
        include 'components/navbar.php';
        ?>
        <!-- header-end -->
        <main style="direction:rtl">
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
                <!-- inner-blog -->
            <section class="inner-blog b-details-p pt-120 pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-details-wrap">
							<div class="bsingle__post-thumb mb-30">
                                    <img src="<?php echo'Admin/uploads/news/'.$row['poster'];?>" alt="">
                                </div>
                                <div class="meta__info">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user"></i>
                                        fX Stock School
                                        </a></li>
                                        <li>
                                        <i class="far fa-comments"></i>
                                        <?php echo $row['date_added'] ?>
                                    </li>
                                    </ul>
                                </div>
                                <div class="details__content pb-50">
                                    <h2 style="text-align:right"> 
                                    <?php echo $row['title_'.$_SESSION['lang']] ?>
                                   </h2>
                                    <p style="text-align:right"> 
                                    <?php echo $row['subtitle_'.$_SESSION['lang']] ?>
                                    </p>
                                    <div style="text-align:right"> 
                                    <?php 
                    echo htmlspecialchars_decode($row['content_'.$_SESSION['lang']]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside>
                                <div class="widget mb-40">
                                    <div class="widget-title text-center">
                                        <h4>Feeds</h4>
                                    </div>
                                    <div class="widget__post">
                                        <ul>

                                            <?php
                                        $cmd = "select * from news order by id desc limit 5 ";
                                        $result = mysqli_query($con,$cmd);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>

                                            <li>
                                                <div class="widget__post-thumb">
                                         <img src="uploads/<?php echo $row['poster'] ?>" alt="">
                                                </div>
                                                <div class="widget__post-content">

                                                    <h6 style="text-align:right">
                                             <a href="details.php?id=<?php echo $row['id'] ?>" >
                                            <?php echo $row['title_'.$_SESSION['lang']] ?>
                                                        </a>
                                                    </h6>

                                                    <span style="text-align:right">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo $row['date_added'] ?>
                                                    </span>
                                                </div>
                                            </li>

                                            <?php
                                             }
                                            ?>
                                          
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget mb-40">
                                    <div class="widget-title text-center">
                                        <h4>Follow Us</h4>
                                    </div>
                                    <div class="widget-social text-center">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-wordpress"></i></a>
                                    </div>
                                </div>
                                                       
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- inner-blog-end -->
        </main>
         <!-- footer -->
         <?php  include 'components/footer.php'; ?>
        <!-- footer-end -->

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
        <script src="js/parallax.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/parallax-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/element-in-view.js"></script>
        <script src="js/main.js"></script>
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
    </body>

</html>