<?php
include_once './components/dbconnect.php';
?>
    <?php 
    $id = $_POST['id'];
	$cmd = "select * from signals where signal_id = '$id'";
	$result = mysqli_query($con,$cmd);		
    $row = mysqli_fetch_array($result);
    echo "<h3>Instrument: <span>".$row['instrument']."</span></h3>";
    echo "<h3>Code: <span>".$row['code']."</span></h3>";
    echo "<h3>Open Price: <span>".$row['open_price']."</span></h3>";
    echo "<h3>Action: <span>".$row['action']."</span></h3>";
    echo "<h3>Type: <span>".$row['type']."</span></h3>";
    echo "<h3>Risk: <span>".$row['risk']."</span></h3>";

	?>

