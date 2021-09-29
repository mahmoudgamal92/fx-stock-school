<?php
include_once './../../../components/dbconnect.php';
$title_ar = $_POST['title_ar'];
$title_en = $_POST['title_en'];
$description_ar = $_POST['description_ar'];
$description_en = $_POST['description_en'];
$url = $_POST['url'];
$thumnail = $_FILES['thumnail']['name'];
$target = "./../../uploads/tutorials/".basename($thumnail);
$view_key = rand(100000, 1000000000);
$cmd =" insert into tutorials (title_ar,title_en,descreption_ar,descreption_en,view_key,url,thumbnail) values ('$title_ar','$title_en','$description_ar','$description_en','$view_key','$url','$thumnail')";
if (mysqli_query($con,$cmd) && move_uploaded_file($_FILES['thumnail']['tmp_name'], $target))
{
    header("Location: ./../../tutorials.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>