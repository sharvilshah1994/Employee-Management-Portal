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


$remarks = $_REQUEST['remarks'];
$date_dispatch = $_REQUEST['date_dispatch'];
$mode_dispatch = $_REQUEST['mode_dispatch'];
$verification = $_REQUEST['verification'];
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

$query1 = "INSERT INTO `acceptletter_audit`(`parent_id`, `remarks`, `date_dispatch`, `letter`, `verification`, `mode_dispatch`,`time_edit`,`edited_by`) VALUES "
        . "('$parent_id','$remarks','$date_dispatch','$target_file','$verification','$mode_dispatch','$time','$uname')";

if(!empty($mode_dispatch) and !empty($target_file) and !empty($verification) and !empty($date_dispatch))
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
