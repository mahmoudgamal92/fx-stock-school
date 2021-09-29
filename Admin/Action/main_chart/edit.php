<?php
include_once '../../../components/dbconnect.php';
    $id = $_POST['id'];
    $value = $_POST['value'];
    $date = $_POST['date'];

    $cmd="update main_chart set value = '$value', date = '$date' where id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../../main_chart.php?added=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>