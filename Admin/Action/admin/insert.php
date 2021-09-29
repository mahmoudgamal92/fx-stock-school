<?php
include_once '../../components/dbconnect.php';
?>
<?php
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pwd'];
$role = $_POST['role'];

$register_date = date("Y/m/d");
?>
<?php

$cmd="insert into admins (f_name, l_name, user_name, email , phone , role, password, date_added) 
values ('$f_name','$l_name','$user_name','$email','$phone','$role','$password','$date')";

if (mysqli_query($con,$cmd))
{
    header("Location:./../../profile.php?inserted=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>