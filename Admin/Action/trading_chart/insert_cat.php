<?php
include_once '../../components/dbconnect.php';
$title = $_POST['title'];
$cmd="insert into chart_cats (name) values ('$title')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../trading_chart.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>