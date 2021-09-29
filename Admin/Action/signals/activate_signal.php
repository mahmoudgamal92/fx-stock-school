<?php
include_once './../../../components/dbconnect.php';
function send_message($phone,$message)
{
$postData = array(
    'from' => 'FX School',
    'text' => $message,
    'to' => $phone,
    'type' => 'unicode',
    'api_key' => '991a357e',
    'api_secret' => '4XefePf0QiJ0nzvy'
);
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
}
curl_close($ch);
}
$signal_id = $_GET['id'];
$cmd1 = "select * from signals where signal_id = '$signal_id'";
$result1 = mysqli_query($con,$cmd1);
$signal = mysqli_fetch_array($result1);
$message = "لقد تمت أضافة اشارة جديدة بواسطة FXStock School".$signal['instrument'];
$cmd2 = "update signals set visible = 1 where signal_id = '$signal_id'";
if(mysqli_query($con,$cmd2))
{
    $cmd = "select * from users";
    $result = mysqli_query($con,$cmd);
    while($row = mysqli_fetch_array($result))
    {
        send_message($row['phone'],$message);
    }
    header("Location:./../../signals.php?activated=true");
}
?>