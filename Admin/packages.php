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

                <?php 
            
            $cmd = "select * from packages";
            $result = mysqli_query($con,$cmd);
            while($row = mysqli_fetch_array($result))
            {
            ?>

                   <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                <?php echo $row['name_en'] ?> 
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" 
                                    action="Action/settings/package_update.php">
                                    <input type="hidden" name="id"
                                    value=" <?php echo $row['id'];?>">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                Name EN
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" 
                                                class="form-control"
                                                name="name_en"
                                                value=" <?php echo $row['name_en'];?>"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name AR</label>
                                            <div class="col-sm-9">
                                                <input type="text" 
                                                class="form-control"
                                                name="name_ar" 
                                                value = "<?php echo $row['name_ar'] ?>" 
                                                >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Price In $ :</label>
                                            <div class="col-sm-9">
                                                <input type="text" 
                                                class="form-control"
                                                name="price" 
                                                value = "<?php echo $row['price'] ?>" 
                                                >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                Days :
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" 
                                                class="form-control"
                                                name="days" 
                                               value = "<?php echo $row['subscribe_time'] ?>" 
                                                >
                                            </div>
                                        </div>
                              
                                        <div class="form-group row">
                                            <div class="col-sm-3">Signals</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input 
                                                    class="form-check-input" 
                                                    type="checkbox"
                                                    value="signals"
                                                    name="perv[]"
                                                    <?php
                                     if (strpos($row['prev'], 'signals') !== false)
                                                   {
                                                       echo "checked";
                                                   } 
                                                   ?>
                                                    >
                                                    <label class="form-check-label">
                                                        Check to Include In This Plan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-3">Charts</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                    type="checkbox"
                                                    value="charts"
                                                    name="perv[]"
                                                    <?php
                                  if (strpos($row['prev'], 'charts')  !== false)
                                                   {
                                                       echo "checked";
                                                   } 
                                                   ?>
                                                    >
                                                    <label class="form-check-label">
                                                        Check to Include In This Plan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3">Economy</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input 
                                                    class="form-check-input" 
                                                    type="checkbox"
                                                    value="economy"
                                                    name="perv[]"
                                                    <?php
                                 if (strpos($row['prev'], 'economy')  !== false)
                                                   {
                                                       echo "checked";
                                                   } 
                                                   ?>
                                                    >
                                                    <label class="form-check-label">
                                                        Check to Include In This Plan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-3">Tutorials</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                    type="checkbox"
                                                    value="tutorials"
                                                    name="perv[]"
                                                    <?php
                                      if (strpos($row['prev'], 'tutorials')  !== false)
                                                   {
                                                       echo "checked";
                                                   } 
                                                   ?>
                                                    >
                                                    <label class="form-check-label">
                                                        Check to Include In This Plan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3">Indicators</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input 
                                                    class="form-check-input" 
                                                    type="checkbox"
                                                    value="indicators"
                                                    name="perv[]"
                                                    <?php
                                if (strpos($row['prev'], 'indicators')  !== false)
                                                   {
                                                       echo "checked";
                                                   } 
                                                   ?>
                                                    >
                                                    <label class="form-check-label">
                                                        Check to Include In This Plan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>


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

    <!-- <script src="js/styleSwitcher.js"></script> -->

    <!-- Dashboard 1 -->
    <script src="js/dashboard/dashboard-1.js"></script>
    <script>
        function edit_val(id,value,date)
        {
            document.getElementById("value_input").value = value;
            document.getElementById("date_input").value  = date;
            document.getElementById("id_input").value  = id;
            $('#edit_chart').modal('show')
                }
        </script>
</body>

</html>