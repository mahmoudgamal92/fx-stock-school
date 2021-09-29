<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>


<?php
$current_plan = $_SESSION['current_plan'];
$plan_cmd = "select * from packages where id = '$current_plan'";
$plan_result = mysqli_query($con,$plan_cmd);
$plan = mysqli_fetch_array($plan_result);

    if (strpos($plan['prev'],'indicators') !== false)
    {
    $forbidden = true;
    } 
    else
    {
        $forbidden = false;
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
        <?php
        if($forbidden == true)
        {
        ?>

        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
               
			<div class="row">
			       <?php 
                    $cmd = "select * from indicators";
                    $result = mysqli_query($con,$cmd);
                    while($row = mysqli_fetch_array($result)) {
                      ?>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" 
										src="<?php echo "./../Admin/uploads/indicators/images/".
										$row['thumbnail']; ?>" alt="">


                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <a href="indicator.php?id=<?php echo $row['id'] ?>">
                                            <h4><?php echo $row['title_ar']; ?></h4>
                                        </a>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <p> Striped Dress Striped DressStriped DressStriped Dress</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					<?php
					}
					?>

				

   
                 
                </div>

				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <?php
        }
        else
        {
        ?>
          <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
               <div class="row" style="margin-top:15vh">
                  <div class="col-xl-3 col-lg-12 col-xxl-3 col-sm-12"></div>
                     <div class="col-xl-6 col-lg-12 col-xxl-6 col-sm-12">
						<div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
								<img id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" src="images/padlock.png"/>
								<h4 class="my-2">
                                <?php echo $lang['page_not_avalible'] ?> 
                                </h4>
								<a href="profile.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i>
                                <?php echo $lang['go_change_plan'] ?> 
                                </a>
							</div>
						</div>
                      </div>
					</div>
                 </div>
               </div>
        <?php
                }
        ?>

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