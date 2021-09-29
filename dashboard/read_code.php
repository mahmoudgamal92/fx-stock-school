<?php
include_once './components/dbconnect.php';
?>

<?php

$id = $_POST['id'];

$cmd = "select * from charts where cat_id = '$id' ";
$result = mysqli_query($con,$cmd);
$count=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result))

             {
                echo  '<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"> <span>'
                .$row['name'].
                '</span> <a style="cursor:pointer" onclick="insert_chart('.$row['id'].')"><i class="ti-plus fsz-xs mL-10"></i></a></li>';   

              }

?>