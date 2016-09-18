<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$caro_report = $_REQUEST['caro_report'];
$notes = $_REQUEST['notes'];
$acc_policy = $_REQUEST['acc_policy'];
$cag_report = $_REQUEST['cag_report'];
$gp_trial_bs = $_REQUEST['gp_trial_bs'];
$final_draft_report = $_REQUEST['final_draft_report'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}

if(empty($_FILES["cag_reportnew"]["name"]))
{
   $target_file = $cag_report ;
    
}
 else {
    $target_dir = "uploads/audit/$financial_year/$cl_name/";
    $target_file = $target_dir . basename($_FILES["cag_reportnew"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["cag_reportnew"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["cag_reportnew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
 
 
 
if(empty($_FILES["final_draft_reportnew"]["name"]))
{
   $target_file1 = $final_draft_report ;
    
}
 else {
    $target_dir1 = "uploads/audit/$financial_year/$cl_name/";
    $target_file1 = $target_dir1 . basename($_FILES["final_draft_reportnew"]["name"]);
    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["final_draft_reportnew"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["final_draft_reportnew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 } 
 
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1)); 
$uname = $_SESSION['username']; 
 
$sql = "UPDATE `audit_report` SET `acc_policy`='$acc_policy',"
        . "`caro_report`='$caro_report',`cag_report`='$target_file',`notes`='$notes',`gp_trial_bs`='$gp_trial_bs',`final_draft_report`='$target_file1' WHERE `parent_id`='$parent_id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/audit_report.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
