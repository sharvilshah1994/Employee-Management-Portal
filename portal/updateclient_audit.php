<?php
session_start();
include 'config.php';
$id = $_REQUEST['ID'];
$cl_name = $_REQUEST['cl_name'];
$cl_number = $_REQUEST['cl_number'];
$cl_email = $_REQUEST['cl_email'];
$owner_ca = $_REQUEST['owner_ca'];
$nature_audit = $_REQUEST['nature_audit'];
$physical_location = $_REQUEST['physical_location'];
$digital_sign = $_REQUEST['digital_sign'];
$digital_location = $_REQUEST['digital_location'];
$digital_validity = $_REQUEST['digital_validity'];
$ac_name = $_REQUEST['ac_name'];
$ac_number = $_REQUEST['ac_number'];
$ac_email = $_REQUEST['ac_email'];
$e_file_location = $_REQUEST['e_file_location'];
$type = $_REQUEST['type'];
$due_date = $_REQUEST['due_date'];
$team = $_REQUEST['team'];
$financial_year = $_REQUEST['financial_year'];
$cin_number = $_REQUEST['cin_number'];

$sql = "UPDATE clients_audit SET `cl_name`='$cl_name',`cl_number`='$cl_number',`cl_email`='$cl_email',`owner_ca`='$owner_ca',`nature_audit`='$nature_audit',"
        . "`physical_location`='$physical_location',`e_file_location`='$e_file_location',`digital_sign`='$digital_sign',`digital_location`='$digital_location',"
        . "`digital_validity`='$digital_validity',`ac_name`='$ac_name',`ac_email`='$ac_email',`ac_number`='$ac_number',"
        . "`due_date`='$due_date',`team`='$team',`financial_year`='$financial_year',`cin_number`='$cin_number' WHERE ID='$id' AND type_entity='$type'";



if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/audit_type.php?type=$type' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
