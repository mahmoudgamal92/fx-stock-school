<?php
function get_vlaue($title)
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
include_once './components/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fx Stock School - Admin Dashoard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include 'components/nav-header.php' ?>

        <!--************* Nav header end ***************-->

        <!--************** Header start ***********-->
        <?php include 'components/header.php' ?>
        <!--*********** Header end **************-->

        <!--******* Sidebar start *********-->
        <?php include 'components/sidebar.php' ?>
        <!--*********** Sidebar end ****************-->

        <!--**********************************
        
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">


                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                <span> تم تعديل البيانات بنجاح </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Home Slider 1
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="slider_1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Title AR
                                                    </label>
                                                    <input type="text" name="slider1_title_ar" class="form-control"
                                                    value="<?php echo get_vlaue('slider1_title_ar');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Title EN
                                                    </label>
                                                    <input type="text" name="slider1_title_en" class="form-control"
                                                    value="<?php echo get_vlaue('slider1_title_en');?>">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Description AR
                                                    </label>
                                                    <textarea name = "slider1_desc_ar" class="form-control" rows="3"><?php echo get_vlaue('slider1_description_ar');?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                    Description EN
                                                    </label>
                                                    <textarea name="slider1_desc_en" class="form-control" rows="3"><?php echo get_vlaue('slider1_description_en');?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>




                  
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Home Slider 2
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="slider_2">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Title AR
                                                    </label>
                                                    <input type="text" name="slider2_title_ar" class="form-control"
                                                    value="<?php echo get_vlaue('slider2_title_ar');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Title EN
                                                    </label>
                                                    <input type="text" name="slider2_title_en" class="form-control"
                                                    value="<?php echo get_vlaue('slider2_title_en');?>">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Description AR
                                                    </label>
                                                    <textarea name="slider2_desc_ar" class="form-control" rows="3"><?php echo get_vlaue('slider2_description_ar');?></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label name="slider2_desc_en" class="text-black font-w500">
                                                    Description EN
                                                    </label>
                                                    <textarea class="form-control" rows="3"><?php echo get_vlaue('slider2_description_en');?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Socail Media Links
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="social_media">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Instagram
                                                    </label>
                                                    <input type="text" name="instagram" class="form-control" 
                                                    value="<?php echo get_vlaue('instagram');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Facebook
                                                    </label>
                                                    <input type="text" name="facebook" class="form-control"
                                                    value="<?php echo get_vlaue('facebook');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Youtube
                                                    </label>
                                                    <input type="text" name="youtube" class="form-control"
                                                    value="<?php echo get_vlaue('youtube');?>"
                                                    >
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                       Telegram
                                                    </label>
                                                    <input type="text" name="telegram" class="form-control"
                                                    value="<?php echo get_vlaue('telegram');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Contact Information
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="contact_info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                        Official Address AR
                                                    </label>
                                                    <input type="text" name="office_address_ar" class="form-control"
                                                    value="<?php echo get_vlaue('office_address_ar');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                    Official Address EN
                                                    </label>
                                                    <input type="text" name="office_address_en" class="form-control"
                                                    value="<?php echo get_vlaue('office_address_en');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                    Official Email Address
                                                    </label>
                                                    <input type="text" name="contact_email" class="form-control"
                                                 value="<?php echo get_vlaue('contact_email');?>"
                                                    >
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                      Official Working Hours
                                                    </label>
                                                    <input type="text" name="working_hours" class="form-control"
                                                    value="<?php echo get_vlaue('working_hours');?>"
                                                    >
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                      Official Mobile Phone
                                                    </label>
                                                    <input type="text" name="mobile_phone" class="form-control"
                                                    value="<?php echo get_vlaue('mobile_phone');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Company Vision
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="company_vision">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                       Company Vision AR
                                                    </label>
                                                    <input type="text" name="company_vision_ar" class="form-control"
                                                    value="<?php echo get_vlaue('company_vision_ar');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                       Company Vision EN
                                                    </label>
                                                    <input type="text" name="company_vision_en" class="form-control"
                                                value="<?php echo get_vlaue('company_vision_en');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                #Tax Information
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/update.php">
                                    <input type="hidden" name="key" value="tax">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                 Tax Registration                          
                                                    </label>
                                                    <input type="text" name="tax_tegistration" class="form-control"
                                                    value="<?php echo get_vlaue('tax_tegistration');?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w500">
                                                    Commercial Register
                                                    </label>
                                                    <input type="text" name="commercial_register" class="form-control"
                                                    value="<?php echo get_vlaue('commercial_register');?>"
                                                    >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <button class="btn btn-primary">
                                                       Submit
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a>
                2021</p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>

    <!-- Vectormap -->
    <!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>

    <!-- Chartist -->
    <script src="vendor/chartist/js/chartist.min.js"></script>

    <!-- <script src="js/styleSwitcher.js"></script> -->

    <!-- Dashboard 1 -->
    <script src="js/dashboard/dashboard-1.js"></script>
    <script>
        function edit_val(id, value, date) {
            document.getElementById("value_input").value = value;
            document.getElementById("date_input").value = date;
            document.getElementById("id_input").value = id;
            $('#edit_chart').modal('show')
        }
    </script>
</body>

</html>