<?php
session_start();
include 'config.php';
$cl_name = $_REQUEST['cl_name'];
$cl_number = $_REQUEST['cl_number'];
$cl_email = $_REQUEST['cl_email'];
$owner_ca = $_REQUEST['owner_ca'];
$nature_audit = $_REQUEST['nature_audit'];
$e_file_location = $_REQUEST['e_file_location'];
$file_location = $_REQUEST['file_location'];
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
$year = $_REQUEST['year'];
$cin_number = $_REQUEST['cin_number'];

$sql = "INSERT INTO `clients_audit`(`cl_name`, `cl_number`, `cl_email`, `ac_name`, `ac_number`, `ac_email`, `type_entity`, `physical_location`, `owner_ca`, `digital_sign`, `digital_location`, `digital_validity`, `nature_audit`,`due_date`,`team`"
        . ",`financial_year`,`cin_number`,`e_file_location`) "
        . "VALUES ('$cl_name','$cl_number','$cl_email','$ac_name','$ac_number','$ac_email','$type','$file_location','$owner_ca','$digital_sign','$digital_location','$digital_validity',"
        . "'$nature_audit','$due_date','$team','$year','$cin_number','$e_file_location')";



if ($conn->query($sql) === TRUE) {
    include 'addchecklist_audit.php';
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/audit_type.php?type=$type' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
