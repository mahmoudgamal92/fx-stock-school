<?php
include_once '../../components/dbconnect.php';

$id=$_POST['id'];
$instrument = $_POST['instrument'];
$code = $_POST['code'];
$action = $_POST['action'];
$type = $_POST['type'];
$risk = $_POST['risk'];
$current_price = $_POST['current_price'];
$open_price = $_POST['open_price'];
$take_profit_1 = $_POST['profit_1'];
$take_profit_2 = $_POST['profit_2'];
$stop_loss = $_POST['stop_loss'];
$progress = $_POST['progress'];
$target_pip = $open_price - $take_profit_2;
$stop_pip = $open_price - $stop_loss;
$gain_pip = $_POST['gain_pip'];
$status = $_POST['status'];
$user_type = $_POST['user'];
$date_time =  date("Y/m/d");
?>
<?php
$cmd="update signals set instrument = '$instrument',code='$code',action = '$action', type='$type' , risk='$risk' , current_price='$current_price' , open_price='$open_price', take_profit_1 = '$take_profit_1',take_profit_2 = '$take_profit_2', stop_loss = '$stop_loss', progress = '$progress',target_pip = '$target_pip',stop_pip='$stop_pip',gain_pip='$gain_pip',status='$status',user_type='$user_type',date_time = '$date_time' where signal_id = '$id'";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../signals.php?updated=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);

?>