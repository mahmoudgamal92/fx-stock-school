<?php
include_once '../../../components/dbconnect.php';
    $id = $_POST['id'];
    $name = $_POST['title'];

    $cmd="update chart_cats set name = '$name' where id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../../trading_chart.php?updated=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>