<?php
include_once './../../components/dbconnect.php';
$value = $_POST['value'];
$date = $_POST['date'];
$cmd="insert into main_chart (value,date) values ('$value','$date')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../main_chart.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>