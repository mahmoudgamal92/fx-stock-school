<?php
include_once 'components/dbconnect.php';
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$phone = $_POST['code'].$_POST['phone'];
$password = $_POST['pwd'];
$is_broker = $_POST['is_broker'];
$broker_name = $_POST['broker_name'];
$acc_number = $_POST['acc_number'];

$current_plan = 0;
$status = 0 ;

$register_date = date("Y-m-d") ;
$payment_verified = 0 ;
$token = uniqid();
$cmd="insert into users (f_name, l_name, email , phone , password,register_date,current_plan,status,is_broker,broker_name,broker_acc_number,payment_verified,login_token) 
values ('$f_name','$l_name','$email','$phone','$password','$register_date','$current_plan','$status','$is_broker','$broker_name','$acc_number','$payment_verified','$token')";
if (mysqli_query($con,$cmd))
{
    $postData = array(
    'from' => 'FX School',
    'text' => 'رمز التأكيد الخاص بك هو : 23456',
    'to' => $phone,
    'api_key' => '991a357e',
    'api_secret' => '4XefePf0QiJ0nzvy',
    'type' => 'unicode',
);

// Setup cURL
$ch = curl_init('https://rest.nexmo.com/sms/json');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

$response = curl_exec($ch);
if($response === FALSE){
    die(curl_error($ch));
    echo "Failed";
}
curl_close($ch);

    header("Location:./verify.php");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>