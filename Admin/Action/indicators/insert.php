<?php
include_once './../../../components/dbconnect.php';
$title_ar = $_POST['title_ar'];
$title_en = $_POST['title_en'];
$description_ar = $_POST['description_ar'];
$description_en = $_POST['description_en'];
$file = $_FILES['download_file']['name'];
$thumbnail = $_FILES['thumbnail']['name'];
$file_target = "./../../uploads/indicators/files/".basename($file);
$thumb_target = "./../../uploads/indicators/images/".basename($thumbnail);
$cmd =" insert into indicators (title_ar,title_en,description_ar,description_en,file,thumbnail) values 
('$title_ar','$title_en','$description_ar','$description_en','$file','$thumbnail')";
if (mysqli_query($con,$cmd) 
&& move_uploaded_file($_FILES['download_file']['tmp_name'], $file_target)
&& move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumb_target))
{
    header("Location: ./../../indicators.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>