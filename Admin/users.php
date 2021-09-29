<?php
include_once './components/dbconnect.php';
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
	<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
                <div class="form-head d-flex mb-3  mb-lg-5   align-items-start">
					<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">New User</a>
					<div class="input-group search-area ml-auto d-inline-flex">
						<input type="text" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<a href="javascript:void(0)" class="input-group-text"><i class="flaticon-381-search-2"></i></a>
						</div>
					</div>
				
					<select class="form-control style-2 ml-3 default-select ">
						<option>Newest</option>
						<option>Old</option>
					</select>
					<a href="javascript:void(0);" class="btn btn-outline-primary ml-3"><i class="flaticon-381-menu-1 mr-0"></i></a>
				</div>

				<!-- Add User -->
				<div class="modal fade bd-example-modal-lg" id="addUserModal">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">New User</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method = "POST" action="Action/users/insert.php">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Frist Name</label>
										<input type="text" name="f_name" class="form-control">
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Last Name</label>
										<input type="text" name="l_name" class="form-control">
									</div>
									</div>
									</div>


									<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Email</label>
										<input type="text" name="email" class="form-control">
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Password</label>
										<input type="password" name="pwd" class="form-control">
									</div>
									</div>
									</div>

									
									<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">
											Subscription Plan
										</label>
										<select 
										class="form-control" name="plan">
										<option value="1"> Premuim </option>
										<option value="2"> Paltinum </option>
										<option value="3"> Brokerage </option>
										<option value="4"> Egyptian Market </option>
										</select>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Phone</label>
										<br>
										<div  style="width:100%">
										<input id="phone" type="tel" name="phone" class="form-control" 
										style="width:100%;font-size:100%;" />
										</div>

									</div>
									</div>
									</div>

									
									<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">
											Subscription Start Date
										</label>
										<input type="date" name="start_date" class="form-control">
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">
											Subscription End Date
										</label>
										<input type="date" name="end_date" class="form-control">
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
								<label class="text-black font-w500"> 
									Payment Verified 
								</label>
								<select id="inputState"
								class="form-control" name="payment_verified">
								<option value="1"> YES </option>
								<option value="0"> NO </option>
								</select>
									</div>
									</div>
									</div>

								
									<div class="form-group">
										<button type="submit" class="btn btn-primary">
											CREATE USER
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="row">

				  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">
													<div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
														<input type="checkbox" class="custom-control-input" id="checkAll" required="">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
												</th>
                                                <th><strong>ROLL NO.</strong></th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Status</strong></th>
												<th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

										<?php 
										$cmd = "select * from users";
										$result = mysqli_query($con,$cmd);
										while($row = mysqli_fetch_array($result)) {
										?>
                      
											<tr>
                                                <td>
													<div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
														<input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
														<label class="custom-control-label" for="customCheckBox4"></label>
													</div>
												</td>
                                                <td>
													<strong>
														<?php echo $row['user_id'] ?>
													</strong>
												</td>
                                                <td><div class="d-flex align-items-center">
													<img src="images/avatar.png" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">
													<?php echo $row['f_name']." ".$row['l_name']; ?>
													</span>
												    </div></td>
                                                <td><?php echo $row['phone'] ?>	</td>
                                                <td><?php echo get_plan($row['current_plan']) ?></td>
                                                <td>
												<?php
													if($row['status'] == 0)
													{
													?>

													<div class="d-flex align-items-center">
									                <i class="fa fa-circle text-danger mr-1"></i> 
													Suspeded
												   </div>
												   <?php
													}
													else
													{
													?>
													<div class="d-flex align-items-center">
									                <i class="fa fa-circle text-success mr-1"></i> 
													Active
												   </div>
												   <?php
													}
													?>
											  </td>
                                                <td>
													<div class="d-flex">
												<?php
													if($row['status'] == 0)
													{
													?>
														<a  
														onclick="return confirm('هل أنت متأكد من تفعيل صلاحيات هذ المستخدم ؟')"
														href="Action/users/activate.php?id=<?php echo $row['user_id'] ?>"
														class="btn btn-success shadow sharp mr-1">
															<i class="fa fa-eye" style="font-size:25px"></i>
														</a>
													<?php
													}
													else{
													?>
														<a 
														onclick="return confirm('هل أنت متأكد من ايقاف صلاحيات هذ المستخدم ؟')"
														href="Action/users/suspend.php?id=<?php echo $row['user_id'] ?>" 
														class="btn btn-danger shadow sharp mr-1">
															<i class="fa fa-eye-slash" style="font-size:25px"></i>
														</a>

														<?php
													}
														?>
													</div>
												</td>
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
	
	
	
    <script src="js/styleSwitcher.js"></script>
	<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
</body>
</html>