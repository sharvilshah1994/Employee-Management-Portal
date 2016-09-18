<?php 
session_start();
include 'config.php';
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


$srno = $_REQUEST['srno'];
$date_resolution = $_REQUEST['date_resolution'];
$particulars = $_REQUEST['particulars'];
$select1 = $_REQUEST['select1'];
$no_remarks_1 = $_REQUEST['no_remarks_1'];
$select2 = $_REQUEST['select2'];
$no_remarks_2 = $_REQUEST['no_remarks_2'];
$remarks = $_REQUEST['remarks'];
date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


$query1 = "INSERT INTO `board_audit` (`parent_id`,`srno`, `date_resolution`, `particulars`,`verification`, `no_remarks_1`,"
        . "`compliance`, `no_remarks_2`,`remarks`,`time_edit`,`edited_by`) VALUES "
        . "('$parent_id','$srno','$date_resolution','$particulars','$select1','$no_remarks_1','$select2','$no_remarks_2',"
        . "'$remarks','$time','$uname')";

if(!empty($date_resolution) and !empty($particulars))
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
