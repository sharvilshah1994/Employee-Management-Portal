<?php
session_start();
include 'config.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$requirement = $_REQUEST['requirement'];
$remarks = $_REQUEST['remarks'];
$select1 = $_REQUEST['select1'];
$no_remarks_1 = $_REQUEST['no_remarks_1'];
$select2 = $_REQUEST['select2'];
$no_remarks_2 = $_REQUEST['no_remarks_2'];
$obj_clause_remarks = $_REQUEST['obj_clause_remarks'];
$auth_share_remarks = $_REQUEST['auth_share_remarks'];
$document = $_REQUEST['document'];
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));
$uname = $_SESSION['username'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}

if(empty($_FILES["documentnew"]["name"]))
{
   $target_file = $document ;
    
}
 else {
    $target_dir = "uploads/audit/$financial_year/$cl_name/";
    $target_file = $target_dir . basename($_FILES["documentnew"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["documentnew"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["documentnew"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }

$sql = "UPDATE `constdoc_audit` SET `requirement`='$requirement',`remarks`='$remarks',`obj_clause_remarks`='$obj_clause_remarks',`auth_share_remarks`='$auth_share_remarks',"
        . "`document`='$target_file',`verification`='$select1',`no_remarks_1`='$no_remarks_1',`compliance`='$select2',`no_remarks_2`='$no_remarks_2' "
        . "WHERE ID='$id'";
if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/constdoc_audit.php?id=$id&parent_id=$parent_id' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
