<?php
include '../components/dbconnect.php';
session_start();
$id = $_SESSION['Admin_id'];
$cmd = "select * from admins where admin_id = '$id'";
$result = mysqli_query($con,$cmd);
$row = mysqli_fetch_array($result);
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
    <link href="https://mediqu.dexignzone.com/xhtml/error-404.html" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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

        <!--*********** Nav header start ***************-->
        <?php include 'components/nav-header.php' ?>
        <!--*********** Nav header end *******-->


        <!--******** Header start *************-->
        <?php include 'components/header.php' ?>

        <!--********** Header End **************-->

        <!--********** Sidebar start ***********-->
        <?php include 'components/sidebar.php' ?>
        <!--*********  Sidebar end **************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Doctor -->
                <div class="modal fade bd-example-modal-lg" id="addTutorialModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">                                       
                                     Create New Account
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="settings-form">
               
                                    <form method="POST" action="Action/admin/insert.php">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Frist Name</label>
                                                <input type="text" placeholder="Enter Frist Name" class="form-control" name="f_name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last Name</label>
                                                <input type="text" placeholder="Enter Last Name" class="form-control"  name="l_name">
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email Address</label>
                                                <input type="email" placeholder="Email" class="form-control"  name="email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mobile Phone</label>
                                                <input type="number" placeholder="Mobile Phone" class="form-control"  name="phone">
                                            </div>
                                        </div>



                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" placeholder="password" class="form-control"  name="pwd">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" placeholder="Confirm Password" class="form-control">
                                            </div>
                                        </div>

                                

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>Admin Role</label>
                                                <select class="form-control default-select" id="inputState"  name="role">
                                                    <option value="2">Admin</option>
                                                   <option value="3">Editor</option>
                                                </select>
                                            </div>

                                        </div>
                                      
                                        <button class="btn btn-primary" type="submit">
                                            Create Admin
                                      </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">

                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <img src="images/avatar.png" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                <?php echo $row['f_name']." ".$row['l_name']; ?>
                                            </h4>
                                            <p>Super Admin</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">
                                                <?php echo $row['email']  ?>
                                            </h4>
                                            <p>Email</p>
                                        </div>
                                        <div class="dropdown ml-auto">
                                            <a  href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addTutorialModal">
                                                Create New Admin

                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">

                                            <li class="nav-item"><a href="#my-info" data-toggle="tab"
                                                    class="nav-link active show">
                                                    My Information
                                                </a>
                                            </li>

                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                                    class="nav-link">
                                                    Password
                                                </a>
                                            </li>

                                            <li class="nav-item"><a href="#admins" data-toggle="tab" class="nav-link">
                                                    Dashoard Admins
                                                </a>
                                            </li>
                                          
                                        </ul>
                                        <div class="tab-content">
                                            <div id="my-info" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">

                                                    <div class="pt-3">
                                                        <div class="settings-form">
                                                            <h4 class="text-primary">
                                                                Account Information
                                                            </h4>
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Frist Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $row['f_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>
                                                                            Last Name
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $row['l_name'] ?>">
                                                                    </div>
                                                                </div>


                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Email</label>
                                                                        <input type="email" class="form-control"
                                                                            value="<?php echo $row['email'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>
                                                                            Phone
                                                                        </label>
                                                                        <input type="number" class="form-control"
                                                                            value="<?php echo $row['phone'] ?>">
                                                                    </div>
                                                                </div>


                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>#User_Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $row['user_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Admin Role</label>
                                                                        <select class="form-control default-select"
                                                                            id="inputState">

                                                                            <option value="1">Super Admin</option>
                                                                            <option value="2">Admin</option>
                                                                            <option value="3">Editor</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="admins" class="tab-pane fade">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title"> Admins List </h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-responsive-md">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="width:50px;">
                                                                                    <div
                                                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                                                        <input type="checkbox"
                                                                                            class="custom-control-input"
                                                                                            id="checkAll" required="">
                                                                                        <label
                                                                                            class="custom-control-label"
                                                                                            for="checkAll"></label>
                                                                                    </div>
                                                                                </th>
                                                                                <th><strong>ROLL NO.</strong></th>
                                                                                <th><strong>Frist Name</strong></th>
                                                                                <th><strong>Last Name</strong></th>
                                                                                <th><strong>Email</strong></th>
                                                                                <th><strong>Phone</strong></th>
                                                                                <th><strong>Role</strong></th>
                                                                                <th><strong>Delete</strong></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                            $cmd = "select * from admins";
                                                                            $result = mysqli_query($con,$cmd);
                                                                            while($row = mysqli_fetch_array($result)) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                                                        <input type="checkbox"
                                                                                            class="custom-control-input"
                                                                                            id="customCheckBox4"
                                                                                            required="">
                                                                                        <label
                                                                                            class="custom-control-label"
                                                                                            for="customCheckBox4"></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <strong>
                                                                                        <?php echo $row['admin_id'] ?>
                                                                                    </strong>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row['f_name']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row['l_name'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row['email']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row['phone']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row['role']; ?>
                                                                                </td>

                                                                                <?php 
                                                                                if($row['role'] !== "1")
                                                                                {

                                                                                ?>
                                                                                <td>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <a onclick="return confirm('هل أنت متأكد من حذف هذا الأدمن ؟')"
                                                                                            href="Action/admin/delete.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-danger shadow  sharp">
                                                                                            <i class="fa fa-trash"
                                                                                                style="font-size:25px"></i></a>
                                                                                    </div>
                                                                                </td>

                                                                                <?php
                                                                                }
                                                                                ?>
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
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <form action="Action/admin/reset.php" method="POST">
                                                    <div class="form-row">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                                    <div class="form-group col-md-12">
                                                                        <label>
                                                                            Current Password
                                                                        </label>
                                                                        <input type="password"
                                                                            placeholder="Current Password"
                                                                            class="form-control"
                                                                            name="old_pwd"
                                                                            >
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>
                                                                            New Password (If You Want To Change It)
                                                                        </label>
                                                                        <input type="password"
                                                                            placeholder="New Password"
                                                                            class="form-control"
                                                                            name="new_pwd"
                                                                            >
                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-primary" type="submit">
                                                                    Update
                                                                </button>
                                                            </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="replyModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Post Reply</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <textarea class="form-control" rows="4">Message</textarea>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="js/styleSwitcher.js"></script>
    <script src="https://mediqu.dexignzone.com/xhtml/error-404.html"></script>
    <script>
        $('#lightgallery').lightGallery({
            thumbnail: true,
        });
    </script>

</body>


</html>