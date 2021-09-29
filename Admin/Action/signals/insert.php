<?php
include_once '../../components/dbconnect.php';
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
$gain_pip = $_POST['gain_pips'];
$status = $_POST['status'];
$user_type = $_POST['user'];
$date_time =  date("Y/m/d");
?>
<?php
$cmd="insert into signals (instrument,code,action, type , risk , current_price , open_price, take_profit_1,take_profit_2, stop_loss, progress,target_pip,stop_pip,gain_pip,status,user_type,date_time) values ('$instrument','$code','$action','$type','$risk','$current_price','$open_price','$take_profit_1','$take_profit_2','$stop_loss','$progress','$target_pip','$stop_pip','$gain_pip','$status','$user_type','$date_time') ";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../add_signal.php?added=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);

?>