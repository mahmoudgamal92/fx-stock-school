<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>
<?php
$current_plan = $_SESSION['current_plan'];
$plan_cmd = "select * from packages where id = '$current_plan'";
$plan_result = mysqli_query($con,$plan_cmd);
$plan = mysqli_fetch_array($plan_result);

    if (strpos($plan['prev'],'charts') !== false)
    {
    $forbidden = true;
    } 
    else
    {
        $forbidden = false;
    }
?>

<?php
function get_name($id)
{
$con= new mysqli('localhost','root','','fxstockschool') 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
  
  $cmd = "select DISTINCT name from charts where id = '$id'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  return $row['name'];
}

function get_chart_code($id)
{

 $con= new mysqli('localhost','root','','fxstockschool') 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
  
  $cmd = "select code from charts where id = '$id'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  return $row['code'];
}

function get_count($id)
{
       $con= new mysqli('localhost','root','','fxstockschool') 
        or die ("connection erorr".mysqli_error($con));
        $con->query('SET NAMES UTF8');
        $con->query('SET CHARACTER SET UTF8');
          
          $cmd = "select count(name) as charts_num from charts where cat_id = '$id'";
          $result = mysqli_query($con,$cmd);
          $row = mysqli_fetch_array($result);
          return $row['charts_num'];
}
?>

<?php
$user_id = $_SESSION['user_id'];
$cmd = "select DISTINCT * from user_pref where user_id = '$user_id'";
$pref_result = mysqli_query($con,$cmd);
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


</head>

<body>
    <!--************** Preloader start ************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--********** Preloader end **********-->

    <!--*************** Main wrapper start **************-->
    <div id="main-wrapper">
        <!--****************  Nav header start *************-->

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

        <?php
        if($forbidden == true)
        {
        ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="form-head d-flex mb-3  mb-lg-5">


                </div>
                <!-- Add Doctor -->
                <div class="modal fade bd-example-modal-lg" id="addUserModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Chart</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <?php  
                    $cmd = "select * from chart_cats";
                    $result = mysqli_query($con,$cmd);
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>

                                            <li
                                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <span>
                                                    <a onclick="open_codes(<?php echo $row['id'];?>)"
                                                        style="cursor:pointer">
                                                        <?php echo $row['name'] ?>
                                                    </a>
                                                </span>
                                                <span class="badge badge-primary badge-pill">
                                                    <?php
                    echo get_count($row['id']);
                    ?>
                                                </span>
                                            </li>
                                            <?php
                    }
                    ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-5" id="codes">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <span style="text-align:center">EURUSD</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <?php  
                        while($user_pref = mysqli_fetch_array($pref_result))
                        {
                    ?>

                    <div class="col-lg-2 col-sm-6">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <a style="text-align:center" href="<?php echo "
                                charts.php?code=".get_chart_code($user_pref['chart_id']);?>">
                                <span>
                                    <?php echo get_name($user_pref['chart_id']) ?>
                                </span>
                            </a>
                            <a type="button" class="close" onclick="remove_pref(<?php echo $user_pref['chart_id']; ?>)">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                    </div>

                    <?php

                    }

                    ?>

                    <div class="col-lg-2 ">

                        <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal"
                            data-target="#addUserModal"> <img src="./images/add.png" width="25px" height="25px" />
                        </a>
                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-12">

                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                                new TradingView.widget(
                                    {
                                        "width": 980,
                                        "height": 610,
                                        "symbol": "<?php 
                         if(isset($_GET['code']))
                                {
                                    echo $_GET['code'];
                                }
                                   else
                                echo "OANDA:EURUSD";
                              ?> ",
                                "interval": "D",
                                    "timezone": "Etc/UTC",
                                        "theme": "light",
                                            "style": "1",
                                                "locale": "ar_AE",
                                                    "toolbar_bg": "#f1f3f6",
                                                        "enable_publishing": false,
                                                            "hide_side_toolbar": false,
                                                                "allow_symbol_change": true,
                                                                    "container_id": "tradingview_7b756"
                                    }
                                        );
                            </script>
                        </div>
                        <!-- TradingView Widget END -->


                    </div>
                </div>

            </div>
        </div>

        <?php
        }
        else
        {
        ?>
          <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
               <div class="row" style="margin-top:15vh">
                  <div class="col-xl-3 col-lg-12 col-xxl-3 col-sm-12"></div>
                     <div class="col-xl-6 col-lg-12 col-xxl-6 col-sm-12">
						<div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
								<img id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" src="images/padlock.png"/>
								<h4 class="my-2">
                                <?php echo $lang['page_not_avalible'] ?> 
                                </h4>
								<a href="profile.php" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i>
                                <?php echo $lang['go_change_plan'] ?> 
                                </a>
							</div>
						</div>
                      </div>
					</div>
                 </div>
               </div>
        <?php
                }
        ?>

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
        function forbidden() {
            alert("Forbidden");
        }
    </script>
    <script>
        function edit_val(id, value, date) {
            document.getElementById("value_input").value = value;
            document.getElementById("date_input").value = date;
            document.getElementById("id_input").value = id;
            $('#edit_chart').modal('show')
        }
    </script>

    <script>
        function remove_pref(chart_id) {
            // / location.href="delete_chart.php?code="+chart_code;
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xhr.open("POST", "delete_pref.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("id=" + chart_id);
        }
    </script>


    <script>
        function open_codes(cat) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("codes").innerHTML =
                        this.responseText;
                }
            };
            xhr.open("POST", "read_code.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("id=" + cat);
        }

        function insert_chart(chart_id) {
            const user_id = "<?php echo $_SESSION['user_id'];?>";
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 200) {
                        location.reload();

                    }
                    else {
                        alert("failed");

                    }
                }
            };
            xhr.open("POST", "insert_chart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("chart_id=" + chart_id + "&user_id=" + user_id);
        }
    </script>

    <script>
        var modal = document.getElementById('id01');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
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