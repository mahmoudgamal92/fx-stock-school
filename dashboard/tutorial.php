<?php
    include_once './components/dbconnect.php';
    include "../lang/config.php";
    ?>
    <?php 
    // $id = $_GET['id'];
    // $cmd = "select * from tutorials where id = '$id'";
    // $result = mysqli_query($con,$cmd);
    // $row = mysqli_fetch_array($result);
    ?>

    <?php
    $key = $_GET['key'];
    $cmd = "select * from tutorials where view_key = '$key'";
    $result= mysqli_query($con,$cmd);
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
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="player/plyr.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <?php
            if($_SESSION['lang'] != "en")
            {
            ?>
                <link rel="stylesheet" type="text/css" href="css/style-rtl.css">
                <?php
            }
     ?>

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
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-body px-3 pt-2">
                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                <h3 class="text-black">
                                <?php echo $row['title_'.$_SESSION['lang']]; ?>
                                </h3>

                                <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                        <video id="player" width="100%" playsinline controls>
                                            <source src="<?php echo $row['url'] ?>" type="video/mp4" />
                                        </video>
                                </div>
                                </div>

                                    <a class="post-title">
                                        <h3 class="text-black">
                                        <?php echo $row['title_'.$_SESSION['lang']]; ?>
                                        </h3>
                                    </a>

                                    <p>         
                                        <?php echo $row['descreption_'.$_SESSION['lang']]; ?>
                                       </p>

                                    <!-- <button class="btn btn-primary mr-2"><span class="mr-2">
                                            <i class="fa fa-heart"></i></span>
                                        Like
                                    </button>

                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#replyModal">
                                        <span class="mr-2">
                                            <i class="fa fa-reply"></i>
                                        </span>
                                        Reply
                                    </button> -->
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
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/"
                        target="_blank">DexignZone</a> 2021</p>
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

    <script type="text/javascript" src="player/plyr.js"></script>
    <script>
				const player = new Plyr('#player');
	</script>

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