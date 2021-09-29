<?php
include_once './components/dbconnect.php';
?>
<?php
function constant_count($name) {
    $con= new mysqli('localhost','root','','fxstockschool') 
    or die ("connection erorr".mysqli_error($con));
    $con->query('SET NAMES UTF8');
    $con->query('SET CHARACTER SET UTF8');
      $cmd="select count(value) as val_count from signals_constants where name = '$name'";
      $result = mysqli_query($con,$cmd);
      $row = mysqli_fetch_array($result);
      $count = $row['val_count'];
      return $count;
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

    <!--******** Preloader start **********-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--******* Preloader End *********-->

    <!--**** Main wrapper start *********-->
    <div id="main-wrapper">

        <!--******** Nav header start ****************-->
        <?php include 'components/nav-header.php' ?>
        <!--************* Nav header end *************-->

        <!--************** Header start ***********-->
        <?php include 'components/header.php' ?>
        <!--*********** Header end **************-->

        <!--******* Sidebar start *********-->
        <?php include 'components/sidebar.php' ?>
        <!--*********** Sidebar end ***********-->

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
                                <h5 class="modal-title" id="constant_title"></h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="Action/signals/insert_constant.php">
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Edit Chart Value
                                        </label>
                                        <input type="text" class="form-control" name="value">
                                        <input type="hidden" name="name" id="signal_type">
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
                                <h4 class="card-title">Instrument List</h4>
                                <a href="#" onclick="set_type('instrument')" class="btn btn-primary">
                                     New Instrument + 
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                            <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'instrument'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href=" Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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






                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Action List</h4>
                                <a href="#" 
                                onclick="set_type('action')"
                                    class="btn btn-primary">
                                     New Action + 
                                    </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'action'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href=" Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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



                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Code List</h4>
                                <a href="#" 
                                onclick="set_type('code')"
                                class="btn btn-primary">
                                     New Code + 
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                        $cmd = "select * from signals_constants where name ='code'";
                                        $result = mysqli_query($con,$cmd);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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


                 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Status List</h4>
                                <a href="#" 
                                    onclick="set_type('status')"
                                    class="btn btn-primary">
                                     New Status + 
                                    </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'status'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Progress List</h4>
                                <a href="#"
                                    onclick="set_type('progress')" 
                                    class="btn btn-primary">
                                     New Progress Value + 
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'progress'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">

                                                        <a
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Risk Size List</h4>
                                <a
                                href="#" 
                                onclick="set_type('risk')"
                                class="btn btn-primary">
                                     New Risk Size Value + 
                                    </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'risk'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Signal Type List</h4>
                                <a href="#" onclick="set_type('type')" class="btn btn-primary">
                                     New Type Value + 
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'type'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>
                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Risk Size List</h4>
                                <a href="#"
                                onclick="set_type('risk')" 
                                class="btn btn-primary">
                                     New Risk Size Value + 
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                    $cmd = "select * from signals_constants where name = 'risk'";
                                    $result = mysqli_query($con,$cmd);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                            <tr>

                                                <td>
                                                    <span>
                                                        <?php echo $row['value'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <?php echo $row['date'] ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a 
                                                        onclick="return confirm('هل أنت متأكد من حذف هذة القيمة')"
                                                        href="Action/signals/delete_constant.php?id=
                                                    <?php echo $row['id']; ?>" class="btn btn-danger shadow  sharp">
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
        <!--***** Content body end *************-->

        <!--******* Footer start ************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/"
                        target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--******** Footer end ****************-->

       

    </div>
    <!--********* Main wrapper End ************-->

    <!--********** Scripts ************-->

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
    <script src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
    <script src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
    <script>
        function set_type(val) {
            document.getElementById("signal_type").value = val;
            document.getElementById("constant_title").innerHTML = val;
            // document.getElementById("id_input").value = id;
            $('#addUserModal').modal('show')
        }
    </script>

</body>

</html>