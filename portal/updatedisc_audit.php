<?php 
session_start();
include 'config.php';
include 'header.php';

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

$nature_business = $_REQUEST['nature_business'];
$chg_director = $_REQUEST['chg_director'];
$chg_business_line = $_REQUEST['chg_business_line'];
$purchase_assets = $_REQUEST['purchase_assets'];
$deal_banks = $_REQUEST['deal_banks'];
$detail_fraud  =  $_REQUEST['detail_fraud'];
$other = $_REQUEST['other'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));

$query1 = "UPDATE `disc_audit` SET `nature_business`='$nature_business', `chg_director` = '$chg_director', `chg_business_line` = '$chg_business_line', "
        . "`purchase_assets`='$purchase_assets', `deal_banks`='$deal_banks',`detail_fraud`='$detail_fraud',`other`='$other',`time_edit`='$time',`edited_by`='$uname' WHERE parent_id='$parent_id'";


if (($conn->query($query1) === TRUE) ) {
            
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/viewaudit.php?id=$parent_id&type=$type' </script>";
            
 }

?>
