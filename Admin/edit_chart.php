<?php
include_once './components/dbconnect.php';
include "../lang/config.php";
?>
<?php
$id = $_GET['id'];
$cmd = "select * from charts where id = '$id'";
$result = mysqli_query($con,$cmd);
$chart = mysqli_fetch_array($result);
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
                                <h4 class="card-title">Edit Current Chart</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="Action/trading_chart/update_chart.php">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                    Code
                                                </label>
                                                <select id="codes" class="form-control" name="code">
                                            <?php  
                                                $cmd="select * from chart_cats";
                                                $result = mysqli_query($con,$cmd);
                                                while($row = mysqli_fetch_array($result))
                                                {
                                            ?>
                                            <option value="<?php echo $row['id']?>"
                                            
                                            <?php 
                                            if($row['id'] == $chart['cat_id'])
                                            {
                                            echo "selected";
                                            }
                                            ?>
                                            
                                            >
                                            <?php echo $row['name']?> 
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
                                                  Enter Chart Code
                                                </label>
                                                <input type="text" name="code" 
                                                value="<?php echo $chart['code'] ?>"
                                                class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black font-w500">
                                                  Enter Chart Name
                                                </label>
                                                <input type="text" name="name"
                                                value="<?php echo $chart['name'] ?>"
                                                 class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>





                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                            Update Chart
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