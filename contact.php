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


<?php
if(isset($_POST['full_name']))
{
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $subject  = $_POST['subject'];
  $message = $_POST['message'];

  $cmd = "insert into contact (full_name,email,subject,message) 
  values ('$full_name','$email','$subject','$message')";
  $result = mysqli_query($con,$cmd);
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
        <!-- contact-area -->
        <section id="contact" class="contact-area contact-bg pt-120 pb-120 p-relative fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-title text-center mb-80 wow fadeInDown animated"
                            data-animation="fadeInDown animated" data-delay=".2s">
                            <h2><?php  echo $lang['get_in_tuch']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-map"></i>
                            </div>
                            <h5> <?php echo $lang['office']; ?></h5>
                            <p>380 St Kilda Road, Melbourne <br>
                                VIC 3004,</p>
                        </div>
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <h5> <?php echo $lang['working_hours']; ?></h5>
                            <p>Monday to Friday 09:00 to 18:30 and <br>
                                Saturday we work until 15:30</p>
                        </div>
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <h5> <?php echo $lang['message_us']; ?></h5>
                            <p>We are always with you to solve your problem
                                mail us : <a href="#">support@gmail.com</a></p>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <form action="contact.php" method="POST"
                        class="contact-form wow fadeInUp animated" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-name mb-40">
                                        <input type="text" 
                                        name="full_name"
                                        placeholder="<?php echo $lang['full_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-email mb-40">
                                        <input type="text"
                                        name="email"
                                        placeholder="<?php echo $lang['email'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-40">
                                        <input type="text" 
                                        name="subject"
                                        placeholder="<?php echo $lang['subject']; ?>">
                                    </div>
                                </div>
                              
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-45">
                                        <textarea name="message" id="message" cols="30" rows="10"
                                            placeholder="Write comments"></textarea>
                                    </div>
                                    <button class="btn" type="submit">Send Message</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </section>
        <!-- contact-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer -->
   <?php  
    include 'components/footer.php';
   ?>
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