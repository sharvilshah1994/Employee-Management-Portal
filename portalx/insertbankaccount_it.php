<?php
session_start();
include 'config.php';
$ID = $_REQUEST['ID'];
$bank_name = $_REQUEST['bank_name'];
$bank_location = $_REQUEST['bank_location'];
$ifsc_code = $_REQUEST['ifsc_code'];
$account_number = $_REQUEST['account_number'];
$account_balance = $_REQUEST['account_balance'];


$sql = "INSERT INTO bankaccountit (parent_id,bank_name,bank_location,ifsc_code,account_number,account_balance) VALUES "
        . "('$ID','$bank_name','$bank_location','$ifsc_code','$account_number','$account_balance')";
if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://localhost/dgsm1/portal/itaxreturns.php?ID=$ID' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
