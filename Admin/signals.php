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
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

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
             
				<!-- Add Doctor -->
				<div class="modal fade bd-example-modal-lg" id="addTutorialModal">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Signal Information</h5>

								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body" id="modal_content">
					      
							</div>
						</div>
					</div>
				</div>
                <div class="row">
				  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                         <h4 class="card-title">Recent Signals</h4>
                            <a href="add_signal.php" class="btn btn-primary">
                                New Signal + 
                            </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" style="overflow-x:'scroll'">
                                        <thead>
                                            <tr>
                                                <th><strong>Instrument</strong></th>
                                                <th><strong>Action</strong></th>
                                                <th><strong>Open Price</strong></th>
                                                <th><strong>Date/Time</strong></th>
                                                <th><strong>Visible</strong></th>
                                                <th><strong>Edit</strong></th>
                                                <th><strong>Delete</strong></th>
                                                <th><strong>View</strong></th>
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
                                              
                                                <td><?php echo $row['open_price']; ?></td> 
                                                <td><?php echo $row['date_time']; ?></td>


                                             

                                                <td>
                                                <?php
                                                if($row['visible'] == 0 )
                                                {
                                               ?>

                                                <a class="btn btn-danger shadow sharp mr-1" 
                                                href="Action/signals/activate_signal.php?id=<?php echo $row['signal_id'] ?>"
                                                        onclick="return confirm('هل أنت متأكد من تفعيل هذة الأشارة ؟ سيتم ارسال اشعار لكل المشتركين بأضافة الأشارة')"
                                                        >

                
															<i class="fa fa-eye-slash" style="font-size:25px"></i>
														</a>

                                               <?php
                                                }
                                                else
                                                echo "<p style='color:green'>Visible</p>";
                                                ?>
                                                
                                                </td>

                                               
                                                <td>
                                                    <a 
                                                    href="edit_signal.php?id=<?php echo $row['signal_id']; ?>" 
                                                    class="btn btn-primary shadow sharp">
                                                        <i class="fa fa-edit" style="font-size:25px"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                <a 
                                                onclick="return confirm('هل انت متأكد من حذف هذة الأشارة ؟')"
                                                    href="Action/signals/delete.php?id=<?php echo $row['signal_id']; ?>" 
                                                    class="btn btn-danger shadow sharp">
                                                        <i class="fa fa-trash" style="font-size:25px"></i>
                                                    </a>
                                        </td>
                                        <td>

                                     
                                                <a href="#" onclick="get_signal(<?php echo $row['signal_id'] ?>)" data-toggle="modal" data-target="#addTutorialModal" 
                                                class="btn btn-success shadow  sharp">
                                                        <i class="fa fa-eye" style="font-size:25px">
                                                    </i>
                                                    </a>
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
                <p>Copyright © Designed &amp; Developed by 
                    <a href="http://dexignzone.com/" target="_blank">
                    DexignZone
                </a> 
                2021
            </p>
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
   function get_signal(id){
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("modal_content").innerHTML =
            this.responseText;
       }
    };
    xhr.open("POST", "get_signal.php", true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("id="+ id);
}
</script>

</body>
</html>