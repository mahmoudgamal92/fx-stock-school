<?php
include_once './../../../components/dbconnect.php';
$name = $_POST['name'];
$url = $_POST['url'];
$logo = $_FILES['logo']['name'];
$target = "./../../uploads/partners/".basename($logo);
$cmd =" insert into partners (name,url,logo) values ('$name','$url','$logo')";
if (mysqli_query($con,$cmd) && move_uploaded_file($_FILES['logo']['tmp_name'], $target))
{
    header("Location: ./../../partners.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>