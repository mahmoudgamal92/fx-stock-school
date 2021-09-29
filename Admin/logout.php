<?php 
session_start();
if(isset($_SESSION['Admin_name'])){
session_destroy();
header("Location: index.php");
}

?>