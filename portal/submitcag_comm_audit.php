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
$srno = $_REQUEST['srno'];
$page_num = $_REQUEST['page_num'];
$particulars = $_REQUEST['particulars'];
$verification = $_REQUEST['verification'];
$compliance = $_REQUEST['compliance'];
$remarks = $_REQUEST['remarks'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));

$query1 = "INSERT INTO `cag_comm_audit` (`parent_id`, `srno`,`page_num`,`particulars`,`remarks`, `verification`, `compliance`,`time_edit`,`edited_by`) VALUES "
        . "('$parent_id','$srno','$page_num','$particulars','$remarks','$verification','$compliance','$time','$uname')";


if (($conn->query($query1) === TRUE) ) {
            
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/cag_comm_audit.php?id=$id&parent_id=$parent_id' </script>";
            
}
?>
