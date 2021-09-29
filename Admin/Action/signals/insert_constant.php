<?php
include_once './../../../components/dbconnect.php';
$name = $_POST['name'];
$value = $_POST['value'];
$date = date("Y/m/d");
$cmd="insert into signals_constants (name, value, date) values ('$name','$value','$date')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../constants.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>