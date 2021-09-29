<?php
include_once 'components/dbconnect.php';
session_start();
?>
<?php
$email = $_POST['email'];
$pwd =$_POST['password'];
$cmd = "select * from users where email ='$email' and password = '$pwd'";
$result = mysqli_query($con,$cmd);
$count=mysqli_num_rows($result);
if($count == 1)
{
        $row = mysqli_fetch_array($result);
        $_SESSION['first_name'] = $row['f_name'];
        $_SESSION['last_name'] = $row['l_name'];
        $_SESSION['current_plan'] = $row['current_plan'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: index.php?authenticated=true");}
else{
  header("Location: index.php?authenticated=false");
  }
?>