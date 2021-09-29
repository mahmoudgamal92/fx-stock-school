<?php
include_once '../../components/dbconnect.php';
$ar_desc = $_POST['description_ar'];
$en_desc = $_POST['description_en'];
$cmd1="update settings set value = '$ar_desc' where id = 1";
$cmd2="update settings set value = '$en_desc' where id = 2";
if (mysqli_query($con,$cmd1) && mysqli_query($con,$cmd2))
{
    header("Location:../../economy.php");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>