<?php
include_once '../../components/dbconnect.php';
$name = $_POST['name'];
$code = $_POST['code'];
$cat_id = $_POST['categorey'];
$cmd="insert into charts (code, name, cat_id) values ('$code','$name','$cat_id')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../trading_chart.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>