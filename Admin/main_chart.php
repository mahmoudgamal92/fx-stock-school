<?php
include_once './components/dbconnect.php';
?>
<?php
$cmd1 = "select value from main_chart";
$cmd2 = "select date from main_chart";
$value = mysqli_query($con,$cmd1);
$date = mysqli_query($con,$cmd2);
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
                                <h5 class="modal-title">Add New Chart</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="Action/main_chart/insert.php">
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Edit Chart Value
                                        </label>
                                        <input type="number" class="form-control" name="value">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Chart Date </label>
                                        <input type="text" class="form-control" name="date">
                                    </div>
                         
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                                <!-- Edit Chart Modal -->
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



                <div class='row'>
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Results</h4>
                                <div class="dropdown ml-auto">
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                               Add New Chart + </a>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-2">
                            <canvas id="canvas" style="display: block; width: 100%; height: 60vh;" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                             <h4 class="card-title">Main Chart List</h4>
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
                                                <th><strong>Date</strong></th>
                                                <th><strong>Edit</strong></th>
                                                <th><strong>Delete</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $cmd = "select * from main_chart";
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
                                                <?php echo $row['value'] ?>
                                                </td>
                                                <td><?php echo $row['date'] ?></td>
                                               
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
                                                    <a href="Action/main_chart/delete.php?id=
                                                    <?php echo $row['id']; ?>" 
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
    <script  src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
        <script  src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
    <script>
        function edit_val(id,value,date)
        {
            document.getElementById("value_input").value = value;
            document.getElementById("date_input").value  = date;
            document.getElementById("id_input").value  = id;
            $('#edit_chart').modal('show')
                }
        </script>



<script>
  var config = {
		type: 'line',
		data: {
			labels:  <?php 
                echo "[";
                while($data = mysqli_fetch_array($date))
                {
                echo "'".$data['date']."'".",";
                }
                echo "]";
                ?>  ,
			datasets: [{
				label: 'FX Total PIPS',
				backgroundColor:'#000026',
				borderColor: '#000026',
				fill: false,
				data: <?php 
                echo "[";
                while($data = mysqli_fetch_array($value))
                {
                echo $data['value'].",";
                }
                echo "]";
                ?> ,
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Signals Performance'
			},
			scales: {
				xAxes: [{
					display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          },
				}],
				yAxes: [{
					display: true,
          scaleLabel: {
							display: false,
							labelString: 'FX Total PIPS'
						},
						ticks: {
							min: 0,
							// forces step size to be 5 units
							stepSize: 5000
						}
				}]
			}
		}
	};


	window.onload = function() {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
	};

	document.getElementById('randomizeData').addEventListener('click', function() {
		config.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactor();
			});

		});

		window.myLine.update();
	});
  
  </script>
</body>

</html>