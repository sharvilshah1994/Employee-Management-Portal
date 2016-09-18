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
$particulars = $_REQUEST['particulars'];
$mode_comm = $_REQUEST['mode_comm'];
$date_comm = $_REQUEST['date_comm'];
$by_comm = $_REQUEST['by_comm'];
$verification = $_REQUEST['verification'];
$compliance = $_REQUEST['compliance'];
$remarks = $_REQUEST['remarks'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


$query1 = "INSERT INTO `detail_comm_audit` (`parent_id`,`srno`,`particulars`,`verification`,"
        . "`compliance`, `mode_comm`,`date_comm`,`by_comm`,`remarks`) VALUES "
        . "('$parent_id','$srno','$particulars','$verification','$compliance','$mode_comm',"
        . "'$date_comm','$by_comm','$remarks')";

if(!empty($particulars) and !empty($mode_comm) and !empty($date_comm) and !empty($by_comm))
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
