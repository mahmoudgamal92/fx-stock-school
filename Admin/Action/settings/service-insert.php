<?php
include_once './../../../components/dbconnect.php';
$title_en = $_POST['title_en'];
$title_ar = $_POST['title_ar'];
$desc_en = $_POST['desc_en'];
$desc_ar = $_POST['desc_ar'];
$cmd="insert into services (title_ar, title_en, desc_ar, desc_en) values 
('$title_ar','$title_en' ,'$desc_ar' ,'$desc_en')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../services.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>