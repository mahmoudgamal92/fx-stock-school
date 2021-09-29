<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>
<?php
function get_val($code) {
$con= new mysqli('localhost','root','','fxstockschool') 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
  $cmd="select * from economy where code = '$code'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  $value = $row['value'];
  return $value;
}
?>
<?php 
$cmd1 = "select * from settings where id = 1";
$result1 = mysqli_query($con,$cmd1);
$ar_desc = mysqli_fetch_array($result1);
$cmd2 = "select * from settings where id = 2";
$result2 = mysqli_query($con,$cmd2);
$en_desc = mysqli_fetch_array($result2);
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
    <link href="vendor/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/8.9.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4"
        rel="stylesheet" type="text/css">
    <link href="https://playground.anychart.com/docs/samples/GAUGE_Circular_10/iframe" rel="canonical">
    <link href="https://cdn.anychart.com/releases/8.9.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4"
        rel="stylesheet" type="text/css">

       <style>
            .chart_container {
    width: 100%;
    height: 50vh;
    margin-bottom:20px
  }
           </style>
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

        <!--************* Nav header start *************-->
        <?php include 'components/nav-header.php' ?>

        <!--*********** Nav header end *******-->
		
		
        <!--******** Header start *************-->
		<?php include 'components/header.php' ?>

        <!--********** Header End **************-->

        <!--********** Sidebar start ***********-->
		<?php include 'components/sidebar.php' ?>
        <!--*********  Sidebar end **************-->

        <!--************* Content body start ***********-->
        <div class="content-body">
            <div class="container-fluid">
            <div class="modal fade" id="editEconomyModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Economy Chart</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="Action/economy/update.php">
                                    <h1 id="code_title" style="text-transform:uppercase"></h1>
                                    <div class="form-group">
                                        <label class="text-black font-w500">
                                            Enter Economy Chart Value </label>
                                        <input id="economy_val" type="text" class="form-control" name="value">
                                        <input id="code_val" type="hidden" class="form-control" name="code">
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
            <h1 class="c-grey-900 mT-10 mB-30" style="margin-right:100px">Economy</h1>

                <!-- row -->
                          <form method = "POST" action="Action/economy/update_desc.php">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">English Description</label>
										<input type="text" name="description_en" class="form-control"
                                        value="<?php echo $en_desc['value']; ?>"
                                        >
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<label class="text-black font-w500">Arbic Description</label>
										<input type="text" name="description_ar" class="form-control"
                                        value="<?php echo $ar_desc['value']; ?>"
                                        >
									</div>
									</div>

                                    <div class="col-md-12">
									<div class="form-group" style="text-align:center">
									<button type="submit" class="btn btn-primary"
                                    style="padding-left:20px;padding-right:20px;"
                                    >Update Description</button>
									</div>
									</div>
									</div>
</form>

<div class="row">

    <!---- 1 - NZD---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            NZD
            <a href="#" onclick="edit_economy('nzd');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="nzd" class="chart_container"></div>
    </div>

    <!---- 2 - EUR---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            EUR
            <a href="#" onclick="edit_economy('eur');">
            <img src="images/edit.png" width="30px" /></a>
        </h1>
        <div id="eur" class="chart_container"></div>
    </div>

    <!---- 3 - CHF---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            CHF
            <a href="#" onclick="edit_economy('chf');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="chf" class="chart_container"></div>
    </div>


    <!---- 4 - CAD---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            CAD
            <a href="#" onclick="edit_economy('cad');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="cad" class="chart_container"></div>
    </div>

    <!---- 5 - AUD---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            AUD
            <a href="#" onclick="edit_economy('aud');">
                <img src="images/edit.png" width="30px" /></a>
        </h1>
        <div id="aud" class="chart_container"></div>
    </div>
    <!---- 6 - GBP ---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            GBP
            <a href="#" onclick="edit_economy('gbp');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="gbp" class="chart_container"></div>
    </div>


    <!---- 7- USD---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            USD
            <a href="#" onclick="edit_economy('usd');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="usd" class="chart_container"></div>
    </div>
    <!---- 8- JPY---->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <h1>
            JPY
            <a href="#" onclick="edit_economy('jpy');">
                <img src="images/edit.png" width="30px" />
            </a>
        </h1>
        <div id="jpy" class="chart_container"></div>
    </div>


</div> 
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
      
        
    </div>
   
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script src="vendor/dropzone/dist/dropzone.js"></script>

    <script src="js/styleSwitcher.js"></script>
    <script
        src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script
        src="https://cdn.anychart.com/releases/8.9.0/js/anychart-circular-gauge.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script
        src="https://cdn.anychart.com/releases/8.9.0/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>

   <script>
    function edit_economy(code){
        document.getElementById("code_title").innerHTML = code;
        document.getElementById("code_val").value = code;
        
        $('#editEconomyModal').modal('show')
    }
    </script>

<script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('eur'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("eur").draw();
    });
    </script>



    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('nzd'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("nzd").draw();
    });
    </script>



    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('chf'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("chf").draw();
    });
    </script>





    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('cad'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("cad").draw();
    });
    </script>




    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('aud'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("aud").draw();
    });
    </script>





    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('gbp'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("gbp").draw();
    });
    </script>



    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('usd'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("usd").draw();
    });
    </script>





    <script type="text/javascript">
    anychart.onDocumentReady(function() {
        // create data set on our data
        var dataSet = anychart.data.set([<?php echo get_val('jpy'); ?>]);
        // set the gauge type
        var gauge = anychart.gauges.circular();
        // gauge settings
        gauge.data(dataSet);
        gauge.padding("10%");
        gauge.startAngle(270);
        gauge.sweepAngle(180);
        gauge.fill(["white"], .5, .5, null, 1, 0.5, 0.9);

        // axis settings
        var axis = gauge.axis()
            .radius(95)
            .width(0);

        // scale settings
        axis.scale()
            .minimum(0)
            .maximum(110)
            .ticks({
                interval: 10
            })
            .minorTicks({
                interval: 1
            });

        // ticks settings
        axis.ticks()
            .type("trapezium")
            .fill("white")
            .length(9);

        // minor ticks settings
        axis.minorTicks()
            .enabled(true)
            .fill("#000026")
            .length(1.5);

        // labels settings
        axis.labels()
            .fontSize("24px")
            .fontColor("#000026");

        // second axis settings
        var axis_1 = gauge.axis(1)
            .radius(55)
            .width(0);

        // second scale settings
        axis_1.scale()
            .minimum(0)
            .maximum(600)
            .ticks({
                interval: 100
            })
            .minorTicks({
                interval: 20
            });

        // second ticks settings
        axis_1.ticks()
            .type("trapezium")
            .length(15);

        // second minor ticks settings
        axis_1.minorTicks()
            .enabled(true)
            .length(5);

        // labels 2 settings
        axis_1.labels()
            .fontSize("18px")
            .fontColor("white");

        // needle
        gauge.needle(0)
            .enabled(true)
            .startRadius("0%")
            .endRadius("80%")
            .middleRadius(0)
            .startWidth("1%")
            .endWidth("1%")
            .fill("black")
            .stroke("none")
            .middleWidth("1%");

        // marker
        gauge.marker(0)
            .axisIndex(1)
            .dataIndex(1)
            .size(7)
            .type("triangle-down")
            .position("outside")
            .radius(55);

        // bar
        gauge.bar(0)
            .axisIndex(1)
            .position("inside")
            .dataIndex(1)
            .width(3)
            .radius(60)
            .zIndex(10);

        // gap
        gauge.cap()
            .radius("3%");

        // gauge label
        gauge.label()
            .text("FX Stock School")
            .anchor("center") // set the position of the label
            .adjustFontSize(true)
            .hAlign("center")
            .offsetY("15%")
            .offsetX("50%")
            .width("50%")
            .height("10%")
            .zIndex(10);


        // range
        gauge.range({
            from: 0,
            to: 110,
            fill: {
                keys: ["red", "orange", "yellow", "green"]
            },
            position: "inside",
            radius: 100,
            endSize: "3%",
            startSize: "3%",
            zIndex: 10
        });

        // draw the chart
        gauge.container("jpy").draw();
    });
    </script>
</body>

<!-- Mirrored from mediqu.dexignzone.com/xhtml/email-compose.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 19:05:22 GMT -->
</html>