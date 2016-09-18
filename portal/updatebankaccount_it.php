<?php
session_start();
include 'config.php';
$ID = $_REQUEST['ID'];
$parent_id = $_REQUEST['parent_id'];
$bank_name = $_REQUEST['bank_name'];
$bank_location = $_REQUEST['bank_location'];
$ifsc_code = $_REQUEST['ifsc_code'];
$account_number = $_REQUEST['account_number'];
$account_balance = $_REQUEST['account_balance'];


$sql = "UPDATE `bankaccountit` SET `bank_name`='$bank_name',`bank_location`='$bank_location',`ifsc_code`='$ifsc_code',"
        . "`account_number`='$account_number',`account_balance`='$account_balance' WHERE ID=$ID AND parent_id=$parent_id";
if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://localhost/dgsm1/portal/itaxreturns.php?ID=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
