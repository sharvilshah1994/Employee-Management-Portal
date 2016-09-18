<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];

$as_checklist = $_REQUEST['as_checklist'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}

if(empty($_FILES["as_checklistnew"]["name"]))
{
   $target_file = $as_checklist ;
    
}
 else {
    $target_dir = "uploads/audit/$financial_year/$cl_name/";
    $target_file = $target_dir . basename($_FILES["as_checklistnew"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["as_checklistnew"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["as_checklistnew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
 
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1)); 
$uname = $_SESSION['username']; 
 
$sql = "UPDATE `ver_comp_audit` SET "
        . "`as_checklist`='$target_file' WHERE `parent_id`='$parent_id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/ver_comp_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
