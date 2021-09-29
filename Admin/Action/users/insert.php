<?php
include_once '../../components/dbconnect.php';
?>
<?php
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pwd'];
$plan = $_POST['plan'];
$register_date = date("Y/m/d");
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$payment_verified = $_POST['payment_verified'];
$status = 1;
?>
<?php
$cmd="insert into users (f_name, l_name, email , phone , register_date, password,current_plan,current_plan_start, current_plan_end,payment_verified,status) 
values ('$f_name','$l_name','$email','$phone','$register_date','$password','$plan','$start_date','$end_date','$payment_verified','$status')";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../users.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>