<?php 
session_start();
include 'config.php';
$uname = $_SESSION['username'];
$parent_id = $_REQUEST['parent_id'];
$id = $_REQUEST['id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}


$srno = $_REQUEST['srno'];
$acc_head = $_REQUEST['acc_head'];
$cr_balance_amount = $_REQUEST['cr_balance_amount'];
$pr_balance_amount = $_REQUEST['pr_balance_amount'];  
$reason = $_REQUEST['reason'];
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


$query1 = "INSERT INTO `y2y_audit` (`parent_id`,`srno`, `acc_head`,`cr_balance_amount`,"
        . "`pr_balance_amount`, `reason`) VALUES "
        . "('$parent_id','$srno','$acc_head','$cr_balance_amount','$pr_balance_amount',"
        . "'$reason')";

if (($conn->query($query1) === TRUE) ) {
            
     echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/audit_report.php?id=$id&parent_id=$parent_id' </script>";
 
}
?>
