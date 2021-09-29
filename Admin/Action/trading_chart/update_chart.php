<?php
include_once '../../../components/dbconnect.php';
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];

    $cmd="update charts set code = '$code', name = '$name' where id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../../trading_chart.php?added=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>