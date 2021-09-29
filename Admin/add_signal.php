<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>
<?php
function get_plan($id) {
  $con= new mysqli('localhost','root','','fxstockschool') 
  or die ("connection erorr".mysqli_error($con));
  $con->query('SET NAMES UTF8');
  $con->query('SET CHARACTER SET UTF8');
    $cmd="select * from packages where id = '$id'";
    $result = mysqli_query($con,$cmd);
    $row = mysqli_fetch_array($result);
    $value = $row['name_en'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <style>
        .cat_btn {
            background-color: #FFF;
            padding-right: 20px;
            padding-left: 40px;
            padding-right: 40px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            border: none;

        }

        .cat_btn:hover {
            background-color: #F2F2F2;
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
    ***********************************-->
    Main wrapper start
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Users</h4>
                                <a href="add_signal.php" class="btn btn-primary">
                                    New Signal +
                                </a>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="Action/signals/insert.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Code
                                                </label>
                                                <select id="codes" class="form-control" name="code">
                                                    <?php  
                                                $cmd="select * from signals_constants where name='code'";
                                                $result = mysqli_query($con,$cmd);
                                                while($row = mysqli_fetch_array($result))
                                                {
                                            ?>
                                                    <option value="<?php echo $row['value']?>">
                                                        <?php echo $row['value']?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Current Price
                                                </label>
                                                <input type="text" name="current_price" class="form-control" readonly="readonly"
                                                id="current_price"
                                                >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Instrument
                                                </label>
                                                <select id="inputState" class="form-control" name="instrument">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='instrument'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Action
                                                </label>
                                                <select id="inputState" class="form-control" name="action">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='action'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>    
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Type
                                                </label>
                                                <select id="inputState" class="form-control" name="type">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='type'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Risk Size
                                                </label>
                                                <select id="inputState" class="form-control" name="risk">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='risk'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Open Price
                                                </label>
                                                <input type="text" name="open_price" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Stop Loss
                                                </label>
                                                <input type="text" name="stop_loss" class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Take Profit 1
                                                </label>
                                                <input type="text" name="profit_1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Take Profit 2
                                                </label>
                                                <input type="text" name="profit_2" class="form-control">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Progress
                                                </label>
                                                <select id="inputState" class="form-control" name="progress">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='progress'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Status
                                                </label>
                                                <select id="inputState" class="form-control" name="status">
                                                <?php  
                                                        $cmd="select * from signals_constants where name='status'";
                                                        $result = mysqli_query($con,$cmd);
                                                        while($row = mysqli_fetch_array($result))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $row['value']?>">
                                                    <?php echo $row['value']?> 
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    User
                                                </label>
                                                <select id="inputState" class="form-control" name="user">
                                                <?php  
                                                    $cmd="select * from signals_constants where name='user'";
                                                    $result = mysqli_query($con,$cmd);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['value']?>">
                                                <?php echo $row['value']?> 
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                    <a href="#" class="btn btn-success" 
                                    onclick="get_price()">
                                    Get Current Price
                                    </a>


                                    <button type="submit" class="btn btn-primary">
                                            CREATE Signal
                                    </button>
                                      
                                    </div>
                                </form>
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

    <!--******* Scripts **********-->
    
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



    <script src="js/styleSwitcher.js"></script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>

<script>
   function get_price(){
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("current_price").value =
            this.responseText;
            alert("Signal Current Price : " + this.responseText)
       }
    };
    xhr.open("POST", "get_price.php", true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("code="+ document.getElementById("codes").value);
}
</script>

</body>

</html>