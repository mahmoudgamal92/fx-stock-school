<?php
include_once './../../../components/dbconnect.php';
$value = $_POST['value'];
$cmd="insert into seo (value) values ('$value')";
if (mysqli_query($con,$cmd))
{
    header("Location: ./../../seo.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>