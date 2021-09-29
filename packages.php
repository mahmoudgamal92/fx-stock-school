<?php
include_once 'components/dbconnect.php';
include "lang/config.php";
?>

<!doctype html>
<html class="no-js" lang="en">
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
    </head>

<body>
<?php
//include 'components/navbar.php';
?>
    <!-- main-area -->
    <main>
    <div class="container" style="margin-top:20px">
    <div class="alert alert-success alert-dismissible" style="text-align:right">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <span> 
      تم تأكيد رقم الهاتف الخاص بك بنجااح </span>
    </div>
    </div>
    <section id="pricing" class="pricing-area pt-20 pb-90 pr-20 pl-20">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-title text-center mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <h2> أختر الباقة المناسبة لك</h2>
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
                                <h4><?php echo $row["name_".$_SESSION['lang']] ?></h4>
                                <div class="price-count mb-30">
                                    <h2>
                                    <small>USD</small>
                                <?php  echo $row['price']?>
                                    <span>  <?php echo "/".$row['subscribe_time']." Days"; ?></span>
                                    </h2>
                                </div>
                            </div>
                            <div class="pricing-body mb-40 text-left">
                                <ul>
                                    <li>AI Analysis</li>
                                    <li>Market Signals ( Limited )</li>
                                    <li>Economic Indicators</li>
                                    <li>Market Insights</li>
                                    <li>Patterns Recognition ( Limited )</li>
                                    <li> Live News Feed</li>
                                    <li> Instant Notifications </li>
                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <a onclick = proceed_to_pay(<?php echo $row['id'] ?>) class="btn">Choose Plan</a>
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
    </main>
    <!-- main-area-end -->

    <!-- footer -->
   <?php  
   //include 'components/footer.php';
   ?>
    <!-- footer-end -->
<script>
   
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
    <script src="js/custom.js"></script>
</body>
</html>