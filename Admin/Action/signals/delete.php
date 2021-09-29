<?php
include_once '../../../components/dbconnect.php';
    $id = $_GET['id'];
    $cmd = "delete from signals where signal_id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../../signals.php?deleted=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);


?>