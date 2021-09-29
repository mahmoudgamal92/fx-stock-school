<?php
include_once '../../../components/dbconnect.php';

    $admin_id = $_POST['id'];
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $cmd = "select * from admins where admin_id = '$admin_id'";
    $result = mysqli_query($con,$cmd);
    $row = mysqli_fetch_array($result);
    
    if($row['password'] == $old_pwd)
    {
        $cmd = "update admins set password = '$new_pwd' where admin_id = '$admin_id'";
        if(mysqli_query($con,$cmd))
        {
            header("Location:./../../profile.php?updated=true");
        }
        else
        {
            header("Location:./../../profile.php?updated=false");
        }
    }

    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>