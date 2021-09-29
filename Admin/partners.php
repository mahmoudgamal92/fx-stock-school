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
                <div class="form-head d-flex mb-3  mb-lg-5">

    
                </div>
                <!-- Add Doctor -->
                <div class="modal fade" id="addUserModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Partner</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="Action/settings/partner-insert.php"
                                enctype="multipart/form-data"
                                >
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                           Enter Partner Name
                                        </label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Partner URL 
                                        </label>
                                        <input type="text" class="form-control" name="url">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                           Choose Partner Logo
                                        </label>
                                        <input type="file" name="logo" class="btn form-control" accept=".png, .jpg, .jpeg">
                                    </div>
                         
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                 <!-- Edit  -->
                    <div class="modal fade" id="edit_chart">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Chart</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="Action/main_chart/edit.php">
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                             Edit Chart Value
                                        </label>
                                        <input id="value_input" type="number" class="form-control" name="value">
                                        <input id="id_input" type="hidden" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Chart Date </label>
                                        <input  id="date_input" type="text" class="form-control" name="date">
                                    </div>
                         
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
                             <h4 class="card-title">Partners List</h4>
                             <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">New Partner</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">
                                                    <div
                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkAll" required="">
                                                        <label class="custom-control-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th><strong>ROLL NO.</strong></th>
                                                <th><strong>Value</strong></th>
                                                <th><strong>URL</strong></th>
                                                <th><strong>Edit</strong></th>
                                                <th><strong>Delete</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $cmd = "select * from partners";
                                        $result = mysqli_query($con,$cmd);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheckBox2" required="">
                                                        <label class="custom-control-label"
                                                            for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td><strong><?php echo $row['partner_id'] ?></strong></td>
                                                <td><div class="d-flex align-items-center">
													<img src="images/avatar/3.jpg" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">
                                                    <?php echo $row['name']; ?>
													</span>
												    </div></td>
                                                <td><?php echo $row['url'] ?></td>
                                               
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" 
                                                            onclick="edit_val(
                                                            <?php echo $row['id'].','.$row['value'].','.'\''.$row['date'].'\''?>
                                                            )" 
                                                        class="btn btn-primary shadow sharp mr-1">
                                                            <i class="fa fa-pencil" style="font-size:25px"></i>
                                                        </a>
                                                      
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                    <a 
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا العنصر ؟ ')"
                                                    href="Action/settings/partner-delete.php?id=
                                                    <?php echo $row['partner_id']; ?>" 
                                                    class="btn btn-danger shadow  sharp">
                                                        <i class="fa fa-trash" style="font-size:25px"></i>
                                                    </a>
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