<?php
include_once './../../../components/dbconnect.php';
?>
<?php
$id = $_GET['id'];
$cmd="update users set status = 0 where user_id = '$id'";
if (mysqli_query($con,$cmd))
{
    header("Location:./../../users.php?updated=true");
}
else{
die( "could not insert news right now : ". mysqli_error($con));
}
mysqli_close($con);
?>