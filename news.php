<?php
session_start();
include_once 'components/dbconnect.php';
include "lang/config.php";
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
include 'components/navbar.php';
?>
    <!-- main-area -->
    <main>
       
      
        <!-- blog-area -->
        <section id="blog" class="blog-area  p-relative pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <h2><?php echo $lang['latest_news'] ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                <?php
                $cmd = "select * from news order by id desc limit 20 ";
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
                                <h4 style="text-align:right">
                                <a href="details.php?id=<?php echo $row['id'] ?>">
                                  <?php echo $row['title_'.$_SESSION['lang']] ?>
                                </a>
                                    </h4>
                                <p style="text-align:right">
                                <?php echo $row['subtitle_'.$_SESSION['lang']] ?></p>
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

    <?php include 'components/footer.php'; ?>


    
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
</body>
</html>