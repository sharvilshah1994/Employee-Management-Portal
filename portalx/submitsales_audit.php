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
$date_checking = $_REQUEST['date_checking'];
$receiver = $_REQUEST['receiver'];
$voucher_no = $_REQUEST['voucher_no'];
$material = $_REQUEST['material'];
$qty = $_REQUEST['qty'];
$amount = $_REQUEST['amount'];
$particulars = $_REQUEST['particulars'];
$remarks = $_REQUEST['remarks'];
$status = $_REQUEST['status'];


date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));

$query1 = "INSERT INTO `sales_audit`(`parent_id`, `srno`, `date_checking`, `receiver`, `voucher_no`, `material`, `qty`,"
        . " `amount`, `particulars`, `remarks`, `status`) "
        . "VALUES ('$parent_id','$srno','$date_checking','$receiver','$voucher_no','$material','$qty',"
        . "'$amount','$particulars','$remarks','$status')";


if (($conn->query($query1) === TRUE) ) {
            
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/sales_audit.php?id=$id&parent_id=$parent_id' </script>";
            
}
?>
