<?php
include_once './components/dbconnect.php';
?>
    <?php 
                    $id = $_GET['id'];
                    $cmd = "select * from contact where id = '$id'";
                    $result = mysqli_query($con,$cmd);
                    $row = mysqli_fetch_array($result);
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
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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

        <!--****************Nav header start******-->
		<?php include 'components/nav-header.php' ?>

         <!--****************** Nav header End ********-->
		
        <!--******** Header start *************-->
		<?php include 'components/header.php' ?>

		<!--********** Header End **************-->

		<!--********** Sidebar start ***********-->
		<?php include 'components/sidebar.php' ?>
		<!--*********  Sidebar end **************-->

		<!--************** Content body start ******************-->
		<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>Email</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Read</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
      
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="right-box-padding">
                                   
                                                <div class="read-content">
                                                    <div class="media pt-3 d-sm-flex d-block justify-content-between">
														<div class="clearfix mb-3 d-flex">
															<img class="mr-3 rounded" width="50" alt="image" src="images/avatar.png">
															<div class="media-body mr-2">
																<h5 class="text-primary mb-0 mt-1">
                                                                    <?php echo $row['full_name']  ?>
                                                                </h5>
																<p class="mb-0">
                                                                <?php echo $row['date_sent']  ?>
                                                                </p>
															</div>
														</div>
														<div class="clearfix mb-3">
															<a href="javascript:void()" class="btn btn-primary px-3 light"><i class="fa fa-reply"></i> </a>
															<a href="javascript:void()" class="btn btn-primary px-3 light ml-2"><i class="fa fa-long-arrow-right"></i> </a>
															<a href="javascript:void()" class="btn btn-primary px-3 light ml-2"><i class="fa fa-trash"></i></a>
														</div>
													</div>
                                                    <hr>
                                                    <div class="media mb-2 mt-3">
                                                        <div class="media-body"><span class="pull-right">07:23 AM</span>
                                                            <h5 class="my-1 text-primary"> 
                                                            <?php echo $row['subject']  ?>
                                                            </h5>
                                                            <p class="read-content-email">
                                                            <?php echo $row['email']  ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="read-content-body">
                                                        <h5 class="mb-4"> <?php echo $row['subject']  ?></h5>
                                                        <p class="mb-2">
                                                        <?php echo $row['message']  ?>
                                                        </p>
                                                       
                                                        <hr>
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
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>



    <script src="js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from mediqu.dexignzone.com/xhtml/email-read.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 19:05:22 GMT -->
</html>