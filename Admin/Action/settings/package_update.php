<?php
include_once '../../components/dbconnect.php';

$id = $_POST['id'];
$name_ar = $_POST['name_ar'];
$name_en = $_POST['name_en'];
$price = $_POST['price'];
$days = $_POST['days'];
$checkBox = implode(',', $_POST['perv']);

$cmd="update packages set name_ar = '$name_ar', name_en = '$name_en', price='$price' ,
subscribe_time='$days' , prev = '$checkBox' where id = '$id'";

if (mysqli_query($con,$cmd))
{
header("Location:./../../packages.php");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>