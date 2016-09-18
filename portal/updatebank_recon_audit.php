<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$srno = $_REQUEST['srno'];
$bank_statement = $_REQUEST['bank_statement'];
$cb_bank_book = $_REQUEST['cb_bank_book'];
$cb_pass_book = $_REQUEST['cb_pass_book'];

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
 
$sql = "UPDATE `bank_recon_audit` SET `bank_statement`='$bank_statement',`cb_bank_book`='$cb_bank_book',`cb_pass_book`='$cb_pass_book'"
        . " WHERE `parent_id`='$parent_id' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/bank_recon_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
