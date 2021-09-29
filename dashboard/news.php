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
                <div class="form-head d-flex mb-3  mb-lg-5   align-items-start">
					<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addTutorialModal">Add News</a>
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
				<!-- Add Doctor -->
				<div class="modal fade bd-example-modal-lg" id="addTutorialModal">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add News</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method = "POST" action="Action/news/insert.php"  enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Arbic Title</label>
										<input type="text" name="title_ar" class="form-control">
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">English Title</label>
										<input type="text" name="title_en" class="form-control">
									</div>
									</div>
									</div>


									<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Arbic Subtitle</label>
										<textarea class="form-control" name="subtitle_ar" rows="5" id="comment"></textarea>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">English Subtitle</label>
										<textarea class="form-control" name="subtitle_en" rows="5" id="comment"></textarea>
									</div>
									</div>
									</div>

                                    <div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Arbic Content</label>
										<textarea id="editor1" rows="6" class="form-control"   name="content_ar" id="comment"></textarea>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">English Content</label>
										<textarea id="editor2" rows="6" class="form-control"  name="content_en"  id="comment"></textarea>
									</div>
									</div>
									</div>
									
									<div class="col-md-12">
									<div class="form-group">
									<label class="text-black font-w500"> Choose Photo </label>
									</br>
									<input type="file" name="image" class="btn form-control" accept=".png, .jpg, .jpeg">
                                                
									</div>
									</div>
								
									<div class="form-group">
										<button type="submit" class="btn btn-primary">
											CREATE NEW
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
                                <h4 class="card-title">Last News List</h4>
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
                                                <th><strong>Title AR</strong></th>
                                                <th><strong>Title EN</strong></th>
                                                <th><strong>Date Added</strong></th>
                                                <th><strong>Edit</strong></th>
												<th><strong>Delete</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$cmd = "select * from news";
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
														<?php echo $row['id'] ?>
													</strong>
												</td>
                                                <td><?php echo $row['title_ar']; ?></td>
                                                <td><?php echo $row['title_en'] ?>	</td>
                                                <td><?php echo $row['date_added']; ?></td>
           
                                                <td>
												<div class="d-flex align-items-center">
														<a href="#" class="btn btn-primary shadow  sharp mr-1">
															<i class="fa fa-pencil" style="font-size:25px"></i>
														</a>
										</div>
														
												</td>

												<td>
												<div class="d-flex align-items-center">
														<a href="Action/news/delete.php?id=
														<?php echo $row['id'] ?>" class="btn btn-danger shadow  sharp">
															<i class="fa fa-trash" 
															style="font-size:25px"
															></i></a>
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
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    </script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
</body>
</html>