<?php
include_once './components/dbconnect.php';
$chart_id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$cmd = "delete from user_pref where user_id = '$user_id' and chart_id = '$chart_id'";
if(mysqli_query($con,$cmd))
{
    echo $user_id;
}
else
{
    echo 'failed';  
}
?>