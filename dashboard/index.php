
<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
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
  
		<?php include 'components/header.php' ?>

        <!--*********  Sidebar start *************-->
         <?php include 'components/sidebar.php' ?>
        <!--*********** Sidebar end *******-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
                
						
						<div class='row'>
                       <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Results</h4>
                                <div class="dropdown ml-auto">
                              
                                </div>
                            </div>
                            <div class="card-body px-3 pt-2">
                            <canvas id="canvas" style="display: block; width: 100%; height: 60vh;" class="chartjs-render-monitor"></canvas>
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
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
    <script  src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
        <script  src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
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