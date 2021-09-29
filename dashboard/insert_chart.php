<?php
include_once './components/dbconnect.php';
?>

<?php
$user_id = $_POST['user_id'];
$chart_id = $_POST['chart_id'];

$cmd = "insert into user_pref(user_id,chart_id) values ('$user_id','$chart_id')";

if(mysqli_query($con,$cmd))
{
echo "200";
}
else
{
echo "401";
}
?>