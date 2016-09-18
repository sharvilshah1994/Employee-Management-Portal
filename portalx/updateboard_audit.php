<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$srno = $_REQUEST['srno'];
$date_resolution = $_REQUEST['date_resolution'];
$particulars = $_REQUEST['particulars'];
$select1 = $_REQUEST['select1'];
$no_remarks_1 = $_REQUEST['no_remarks_1'];
$select2 = $_REQUEST['select2'];
$no_remarks_2 = $_REQUEST['no_remarks_2'];
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
 
$sql = "UPDATE `board_audit` SET `srno`='$srno',`date_resolution`='$date_resolution',`particulars`='$particulars',`remarks`='$remarks',"
        . "`verification`='$select1',`no_remarks_1`='$no_remarks_1',`compliance`='$select2',`no_remarks_2`='$no_remarks_2',`time_edit`='$time',`edited_by`='$uname' WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/board_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
