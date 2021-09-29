<?php
include_once './../../../components/dbconnect.php';
$name = $_POST['name'];
$url = $_POST['url'];
$logo = $_FILES['logo']['name'];
$cmd =" insert into brokers (name,url) values ('$name','$url')";
if (mysqli_query($con,$cmd))
{
    header("Location: ./../../brokers.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>