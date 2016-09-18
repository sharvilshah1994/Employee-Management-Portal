<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$srno = $_REQUEST['srno'];
$date = $_REQUEST['date'];
$particulars = $_REQUEST['particulars'];
$date_clearing = $_REQUEST['date_clearing'];
$amount = $_REQUEST['amount'];

$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
} 
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1)); 
$uname = $_SESSION['username']; 
 
$sql = "UPDATE `add_bank_recon` SET `srno`='$srno',`date`='$date',`particulars`='$particulars',`date_clearing`='$date_clearing',"
        . "`amount`='$amount' WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/bank_recon_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
