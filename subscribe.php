<?php
session_start();
include_once 'components/dbconnect.php';
include "lang/config.php";
?>
<?php
$user_id =  $_SESSION['user_id'];
$package_id = $_GET['package'];
$cmd = "select * from packages where id = '$package_id'";
$res = mysqli_query($con,$cmd);
$package_info = mysqli_fetch_array($res);
?>
<?php
$start_date =  date("Y/m/d");
$end_date = date("Y/m/d",strtotime("+".$package_info['subscribe_time']."Days"));
?>
<?php
$update = "update users set current_plan = '$package_id' , current_plan_start = '$start_date' , current_plan_end = '$end_date' where user_id = '$user_id'";

if(mysqli_query($con,$update))
{
     header("Location: success.php");
    //echo "success";
}
else
{
    header("Location: failed.php");
}
?>