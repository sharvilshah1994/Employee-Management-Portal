<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$srno = $_REQUEST['srno'];
$date_checking = $_REQUEST['date_checking'];
$voucher_no = $_REQUEST['voucher_no'];
$account_head = $_REQUEST['account_head'];
$amount = $_REQUEST['amount'];
$particulars = $_REQUEST['particulars'];
$remarks = $_REQUEST['remarks'];
$status = $_REQUEST['status'];

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
 
$sql = "UPDATE `jv_audit` SET `srno`='$srno',`date_checking`='$date_checking',`remarks`='$remarks',"
        . "`amount`='$amount',`particulars`='$particulars',`status`='$status',`voucher_no`='$voucher_no',`account_head`='$account_head'"
        . " WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/jv_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
