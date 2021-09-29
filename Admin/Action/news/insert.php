<?php
include_once './../../../components/dbconnect.php';
$title_ar = $_POST['title_ar'];
$title_en = $_POST['title_en'];
$subtitle_ar = $_POST['subtitle_ar'];
$subtitle_en = $_POST['subtitle_en'];
$content_ar = htmlspecialchars($_POST["content_ar"]);
$content_en = htmlspecialchars($_POST["content_en"]);
$date = date("Y/m/d");
        $image = $_FILES['image']['name'];
        $target = "./../../uploads/news/".basename($image);
        $cmd = "insert into news (title_ar,title_en, subtitle_ar,subtitle_en, content_ar,content_en, poster, date_added) 
        values('$title_ar','$title_en','$subtitle_ar','$subtitle_en','$content_ar','$content_en','$image','$date')";
        if (mysqli_query($con,$cmd) && move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
            header("Location:./../../news.php?added=true");
        }
        else{
        die( "could not insert news right now : ". mysqli_error($con));
        }
        mysqli_close($con);
    ?>