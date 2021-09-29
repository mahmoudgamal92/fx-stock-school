
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
  
		<?php include 'components/header.php' ?>

        <!--*********  Sidebar start *************-->
         <?php include 'components/sidebar.php' ?>
        <!--*********** Sidebar end *******-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
                <div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-sm-6">
								<div class="widget-stat card bg-danger">
									<div class="card-body  p-4">
										<div class="media">
											<span class="mr-3">
												<i class="flaticon-381-user"></i>
											</span>
											<div class="media-body text-white text-right">
												<p class="mb-1">Total Users</p>
												<h3 class="text-white">76</h3>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="col-xl-4 col-lg-4 col-sm-6">
								<div class="widget-stat card bg-success">
									<div class="card-body p-4">
										<div class="media">
											<span class="mr-3">
												<i class="flaticon-381-user"></i>
											</span>
											<div class="media-body text-white text-right">
												<p class="mb-1">Today Visits</p>
												<h3 class="text-white">
												<?php
                            $sql = "SELECT today_views FROM visitors ORDER BY date DESC LIMIT 1";
                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()) {
                                $Today_visits = $row["today_views"];
                            }
                            echo  $Today_visits;
                            ?>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-sm-6">
								<div class="widget-stat card bg-info">
									<div class="card-body p-4">
										<div class="media">
											<span class="mr-3">
												<i class="flaticon-381-user"></i>
											</span>
											<div class="media-body text-white text-right">
												<p class="mb-1">Total Visits</p>
												<h3 class="text-white">
												<?php 
                            $sql = "SELECT sum(today_views) as total_views from visitors";
                            $result = $con->query($sql);
                            $row = $result->fetch_assoc();
                            $total_views = $row["total_views"];
                            echo  $total_views;
                            ?>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>

						
						<div class='row'>
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Visitors</h4>
                                <div class="dropdown ml-auto">
                              
                                </div>
                            </div>
                            <div class="card-body px-3 pt-2">
                                <div id="chartStrock"></div>
                            </div>
                        </div>
                    </div>
                </div>

						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Revenue</h4>
										<select class="form-control style-1 default-select ">
											<option>2021</option>
											<option>2020</option>
											<option>2019</option>
										</select>
									</div>
									<div class="card-body pt-2">
										<h3 class="text-primary font-w600">$41,512k <small class="text-dark ml-2">$25,612k</small></h3>
										<div id="chartBar"></div>
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
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	
	
    <script src="js/styleSwitcher.js"></script>
</body>
</html>