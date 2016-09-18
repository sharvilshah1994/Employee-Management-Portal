<?php
session_start();
include 'config.php';
$parent_id = $_REQUEST['parent_id'];
$id = $_REQUEST['id'];
$team = $_REQUEST['team'];
$date_started = $_REQUEST['date_started'];
$date_completed = $_REQUEST['date_completed'];
$extent_verification = $_REQUEST['extent_verification'];
$nature_tick = $_REQUEST['nature_tick'];
$tutorial = $_REQUEST['tutorial'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
   
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}



$sql = "UPDATE `books_account_audit` SET `team`='$team',`date_started`='$date_started',`date_completed`='$date_completed',"
        . "`extent_verification`='$extent_verification',`nature_tick`='$nature_tick',`tutorial`='$tutorial' WHERE ID='$id' AND parent_id='$parent_id'";


if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/books_account_audit.php?id=11&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
