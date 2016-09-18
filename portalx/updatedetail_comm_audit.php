<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$srno = $_REQUEST['srno'];
$particulars = $_REQUEST['particulars'];
$mode_comm = $_REQUEST['mode_comm'];
$date_comm = $_REQUEST['date_comm'];
$by_comm = $_REQUEST['by_comm'];
$verification = $_REQUEST['verification'];
$compliance = $_REQUEST['compliance'];
$remarks = $_REQUEST['remarks'];

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
 
$sql = "UPDATE `detail_comm_audit` SET `srno`='$srno',`mode_comm`='$mode_comm',`date_comm`='$date_comm',`particulars`='$particulars',`remarks`='$remarks',"
        . "`verification`='$verification',`compliance`='$compliance',`by_comm`='$by_comm' WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/detail_comm_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
