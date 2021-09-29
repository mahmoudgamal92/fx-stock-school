<?php
session_start();
$con= new mysqli('localhost','root','','fxstockschool') 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
if(!isset($_SESSION['user_id']))
 {
  header("Location: ../index.php");
 }
?>

<?php
// $con= new mysqli('localhost','user3153_mahmoud','belive 2684 @#$','user3153_fxstockschool') 
// or die ("connection erorr".mysqli_error($con));
// $con->query('SET NAMES UTF8');
// $con->query('SET CHARACTER SET UTF8');
?>
