<?php
include_once '../../components/dbconnect.php';
$code = $_POST['code'];
$value = $_POST['value'];
$last_update = date("Y/m/d");
$cmd="update economy set value = '$value', last_update = '$last_update' where code = '$code'";
if (mysqli_query($con,$cmd))
{
header("Location:./../../economy.php");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>