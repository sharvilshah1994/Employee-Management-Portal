<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];

$srno = $_REQUEST['srno'];
$page_num = $_REQUEST['page_num'];
$particulars = $_REQUEST['particulars'];
$remarks = $_REQUEST['remarks'];
$verification = $_REQUEST['verification'];
$compliance = $_REQUEST['compliance'];

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
 
$sql = "UPDATE `pr_stat_audit` SET `srno`='$srno',`page_num`='$page_num',`particulars`='$particulars',`remarks`='$remarks',"
        . "`verification`='$verification',`compliance`='$compliance',`time_edit`='$time',`edited_by`='$uname' WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/pr_stat_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
