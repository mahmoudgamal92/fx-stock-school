<?php
include_once './components/dbconnect.php';
?>
<?php
function get_cat($id) {
$con= new mysqli('localhost','root','','fxstockschool') 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
  $cmd="select * from chart_cats where id = '$id'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  $value = $row['name'];
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

                <!-- Add New Chart -->
                <div class="modal fade" id="addChartModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Chart</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" 
                                action="Action/trading_chart/insert_chart.php">
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Chart Code
                                        </label>
                                        <input type="text" class="form-control" name="code">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Chart Name 
                                        </label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                           Choose Chart Categorey
                                        </label>
                         <select class="form-control" name="categorey">
                          <?php
                           $cmd = "select * from chart_cats";
                           $result = mysqli_query($con,$cmd);
                           while($row = mysqli_fetch_array($result))
                           {
                          ?>
                          <option value="<?php echo $row['id'];?>"> 
                          <?php echo $row['name'];?> 
                          </option>
                         <?php
                           }
                         ?>
                        </select>
                        </div>
                         
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Add New Categorey -->
                <div class="modal fade" id="addCatModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Categorey</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" 
                                action="Action/trading_chart/insert_cat.php">
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Categorey Name
                                        </label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                                <!-- Edit Categorey -->
                <div class="modal fade" id="editCatModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Categorey</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" 
                                action="Action/trading_chart/update_cat.php">
                                    <div class="form-group">

                                        <label class="text-black font-w500">
                                            Enter Categorey Name
                                        </label>
                                        <input type="hidden" name="id" id="cat_id">
                                    <input type="text" class="form-control" name="title" id="cat_name">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
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
                                <h4 class="card-title">Charts Categories</h4>      

               <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addCatModal">
                          New Categorey + </a>
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
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Edit</strong></th>
                                                <th><strong>Delete</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>              
                                        <?php
                                        $cmd = "select * from chart_cats";
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
                                                <td><strong><?php echo $row['id'] ?></strong></td>
                                                <td>
                                                <?php echo $row['name'] ?>
                                                </td>
                                                <td><?php echo $row['date_added'] ?></td>
                                                <td>

                                                    <a href="#" 
                                                    onclick="edit_cat(
                                 <?php echo $row['id'].','.'\''.$row['name'].'\''?>)" 
                                                    class="btn btn-primary shadow  sharp mr-1"><i
                                                        class="fa fa-pencil" style="font-size:25px"></i></a>
                                                    </td>
                                                <td>
                                                      
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة الفئة؟')"
                                                        href="Action/trading_chart/delete_cat.php?id=<?php  echo $row['id']?>" 
                                                        class="btn btn-danger shadow sharp">
                                                            <i class="fa fa-trash" style="font-size:25px"></i></a>
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




                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Charts List</h4>      
                   <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#addChartModal">
                        New Chart + </a>
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
                                                <th><strong>Code</strong></th>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Categorey</strong></th>
                                                <th><strong>Edit</strong></th>
                                                <th><strong>Delete</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>              
                                        <?php
                                        $cmd = "select * from charts";
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
                                                <td><strong><?php echo $row['id'] ?></strong></td>
                                                <td>
                                                <?php echo $row['code'] ?>
                                                </td>
                                                <td>
                                                <?php echo $row['name'] ?>
                                                </td>
                                                <td><?php echo get_cat($row['cat_id']) ?></td>
                                                <td>

                                            <a href="edit_chart.php?id=<?php echo $row['id']?>" 
                                                class="btn btn-primary shadow sharp mr-1">
                                                    <i class="fa fa-pencil" style="font-size:25px"></i>
                                                </a>
                                                    </td>
                                                <td>
                                                      
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذا الشارت ؟')"
                                                        href="Action/trading_chart/delete_chart.php?id=<?php  echo $row['id']?>" 
                                                        class="btn btn-danger shadow sharp">
                                                            <i class="fa fa-trash" style="font-size:25px"></i></a>
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


    </div>
    <!--********Main wrapper end*****-->

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
        function edit_cat(id,name)
        {
            document.getElementById("cat_id").value = id;
            document.getElementById("cat_name").value  = name;
            $('#editCatModal').modal('show');
                }
        </script>


</body>

</html>