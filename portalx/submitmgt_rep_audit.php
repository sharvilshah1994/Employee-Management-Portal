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





date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


if (!file_exists("uploads/audit/$financial_year/$cl_name")) {
    mkdir("uploads/audit/$financial_year/$cl_name", 0777, true);
}


$target_dir = "uploads/audit/$financial_year/$cl_name/";
$target_file = $target_dir . basename($_FILES["letter"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["letter"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["letter"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    
$target_dir1 = "uploads/audit/$financial_year/$cl_name/";
$target_file1 = $target_dir1 . basename($_FILES["std_letter"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["std_letter"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["std_letter"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

$query1 = "INSERT INTO `mgt_rep_audit`(`parent_id`, `letter`, `std_letter`) VALUES "
        . "('$parent_id','$target_file','$target_file1')";

if(!empty($target_file) and !empty($target_file1))
{
$query2 = "UPDATE `checklist_company` SET `status`='Completed at $time' WHERE ID='$id' AND parent_id='$parent_id'";
}

if (($conn->query($query1) === TRUE) ) {
            if(($conn->query($query2) === TRUE))
            {
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/viewaudit.php?id=$parent_id&type=$type' </script>";
            }
 else {
     echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/viewaudit.php?id=$parent_id&type=$type' </script>";
 }
}
?>
