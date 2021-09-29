<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>
<?php
$current_plan = $_SESSION['current_plan'];
$plan_cmd = "select * from packages where id = '$current_plan'";
$plan_result = mysqli_query($con,$plan_cmd);
$plan = mysqli_fetch_array($plan_result);

    if (strpos($plan['prev'],'signals') !== false)
    {
    $forbidden = true;
    } 
    else
    {
        $forbidden = false;
    }
?>


<?php
function get_plan($id) {
  $con= new mysqli('localhost','root','','fxstockschool') 
  or die ("connection erorr".mysqli_error($con));
  $con->query('SET NAMES UTF8');
  $con->query('SET CHARACTER SET UTF8');
    $cmd="select * from packages where id = '$id'";
    $result = mysqli_query($con,$cmd);
    $row = mysqli_fetch_array($result);
    $value = $row['name_en'];
    return $value;
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

   <style>
        .cat_btn{
          background-color:#FFF;
          padding-right:20px;
          padding-left:40px;
          padding-right:40px;
          padding-top:20px;
          padding-bottom:20px;
          border-radius:10px;
          border:none;

      }
      .cat_btn:hover {
        background-color:#F2F2F2;
        }
       </style>

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
                <div class="row" style="margin-bottom:50px">
					<div class="col-lg-3 col-sm-12">
                    <h1>
                        <?php  echo $lang['signals']; ?>
                    </h1>
                      </div>
                      <div class="col-lg-3 col-sm-12">
                      <button class="cat_btn">
                        <span>Active</span>
                        <img src="images/dot_open.png" width='20px' style="margin-left:10px"/>
                        </button>
                      </div>


                      <div class="col-lg-3 col-sm-12">
                      <button class="cat_btn">
                        <span>Closed </span>
                        <img src="images/dot_closed.png" width='20px' style="margin-left:10px"/>
                        </button>
                      </div>

                      <div class="col-lg-3 col-sm-12">
                      <button class="cat_btn">
                            <span>Pending</span>
                            <img src="images/dot_pending.png" width='20px' style="margin-left:10px"/>
                            </button>
                      </div>
				</div>

                <div class="row">
				  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Signals</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" style="overflow-x:'scroll'">
                                        <thead>
                                            <tr>
                                                <th><strong>Instrument</strong></th>
                                                <th><strong>Action</strong></th>
                                                <th><strong>Type</strong></th>
                                                <th><strong>Risk</strong></th>
                                                <th><strong>Open Price</strong></th>
                                                <th><strong>Take Profit</strong></th>
                                                <th><strong>Progress</strong></th>
                                                <th><strong>Date/Time</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>

										<?php 
										$cmd = "select * from signals";
										$result = mysqli_query($con,$cmd);
										while($row = mysqli_fetch_array($result)) {
										?>
                      
											<tr>
                                               
                                            <td><?php echo $row['instrument'] ?>	</td>

                                                <td><div class="d-flex align-items-center">
													<img src="images/up.png" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">
													<?php echo $row['action']; ?>
													</span>
												    </div></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['risk']; ?></td>
                                                <td><?php echo $row['open_price']; ?></td>
                                                <td><?php echo $row['take_profit_1']; ?></td>
                                                <td>
                                                <div class="progress ">
                                                <div class="progress-bar bg-success progress-animated" style="width: 85%; height:6px;" role="progressbar">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                                 </div>
                                                </td>
                                                <td><?php echo $row['date_time']; ?></td>
                                               
                                                
                                            </tr>

											<?php
										}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>

        
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