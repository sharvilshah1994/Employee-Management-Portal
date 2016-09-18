<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];

$letter = $_REQUEST['letter'];
$std_letter = $_REQUEST['std_letter'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}

if(empty($_FILES["letternew"]["name"]))
{
   $target_file = $letter ;
    
}
 else {
    $target_dir = "uploads/audit/$financial_year/$cl_name/";
    $target_file = $target_dir . basename($_FILES["letternew"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["letternew"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["letternew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
 
 if(empty($_FILES["std_letternew"]["name"]))
{
   $target_file1 = $std_letter ;
    
}
 else {
    $target_dir1 = "uploads/audit/$financial_year/$cl_name/";
    $target_file1 = $target_dir1 . basename($_FILES["std_letternew"]["name"]);
    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["std_letternew"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["std_letternew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
 
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1)); 
$uname = $_SESSION['username']; 
 
$sql = "UPDATE `mgt_rep_audit` SET `std_letter`='$target_file1',"
        . "`letter`='$target_file' WHERE `parent_id`='$parent_id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/mgt_rep_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
