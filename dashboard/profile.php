<?php
session_start();
include_once '../components/dbconnect.php';
include "../lang/config.php";
?>
<?php
$user_id = $_SESSION['user_id'];
$cmd = "select * from users where user_id = '$user_id'";
$result = mysqli_query($con,$cmd);
$row = mysqli_fetch_array($result);
?>

<?php
function get_plan($id)
{
  include '../components/dbconnect.php';
  $cmd = "select * from packages where id = '$id'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  return $row['name_ar'];
}
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                       <?php echo $lang['profile_settings']?>         
                                </h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i> 
                                            <?php echo $lang['profile'] ?>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#password"><i class="la la-lock mr-2"></i>  <?php echo $lang['password'] ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-cc-mastercard mr-2"></i>  <?php echo $lang['subscription'] ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-bell-o mr-2"></i> 
                                            <?php echo $lang['notification'] ?>
                                        </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                            <div class="pt-4">
                                            <div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">
                                           <?php echo $lang['f_name'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control" value="<?php echo $row['f_name'] ?>">
									</div>
									</div>

                                    <div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['l_name'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control" value="<?php echo $row['l_name'] ?>">
									</div>
									</div>

                                    <div class="col-md-12">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['email'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control" value="<?php echo $row['email'] ?>">
									</div>
									</div>

                                    <div class="col-md-12">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['phone_num'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control" value="<?php echo $row['phone'] ?>">
									</div>
									</div>


                                    <div class="col-md-12">
									<div class="form-group">
										
										<button class="btn btn-primary" style="width:100%">
                                            Save
                                        </button>
									</div>
									</div>
                                 </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="password">
                                            <div class="pt-4">
                                            <div class="row">
									<div class="col-md-12">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['old_pwd'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control">
									</div>
									</div>

                                    <div class="col-md-12">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['new_pwd'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control">
									</div>
									</div>


                                    <div class="col-md-12">
									<div class="form-group">
										<label class="text-black font-w500">
                                        <?php echo $lang['confirm_pwd'] ?>
                                        </label>
										<input type="text" name="title_ar" class="form-control">
									</div>
									</div>
   
                                    <div class="col-md-12">
									<div class="form-group">
										
										<button class="btn btn-primary" style="width:100%">
                                            Save
                                        </button>
									</div>
									</div>

                                    </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact">
                                            <div class="pt-4">
                                            <?php
                                            $id = $_SESSION['user_id'];
                                            $cmd = "select * from users where user_id = '$id'";
                                            $result = mysqli_query($con,$cmd);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                  
                                  <div class="row">
                                     <div class="col-md-12">
                                    <p>
                                      <?php 
                                    if($row['current_plan'] == 0 )
                                    {
                                      echo "Curent Plan : None";
                                    }
                                    else
                                    {
                                      echo "Curent Plan : ". get_plan($row['current_plan']);
                                    }
                                      ?>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                   <p>
                             <?php echo "Subscription Date : ". $row['current_plan_start']; ?>
                                  </p>
                                  </div>

                                  <div class="col-md-12">
                                   <p>
                             <?php echo "Expiration Date : ". $row['current_plan_end']; ?>
                                  </p>
                                  </div>

                                 

                                  <div class="col-md-12">
                                  <a href="../packages.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i>
                                <?php echo $lang['go_change_plan'] ?> 
                                </a>
                                  </div>
                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="message">
                                            <div class="pt-4">
                                                <h4>طبيعة ارسال الأشعارات</h4>
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                                </p>

                                               
                                            </div>
                                        </div>
                                    </div>
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
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
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
	
	
	
    <?php
            if($_SESSION['lang'] != "en")
            {
            ?>
                <script>
                html.attr('dir', 'rtl');
                html.attr('class', '');
                html.addClass('rtl');
                body.attr('direction', 'rtl');
            </script>
                <?php
            }
     ?>
</body>
</html>