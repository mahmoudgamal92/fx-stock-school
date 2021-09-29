<?php
include_once './../../../components/dbconnect.php';
$id = $_GET['id'];
$cmd="delete from signals_constants where id = '$id'";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../constants.php?deleted=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>