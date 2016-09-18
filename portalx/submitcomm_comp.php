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
$type_comm = $_REQUEST['type_comm'];
$type_tax = $_REQUEST['type_tax'];

$srno = $_REQUEST['srno'];
$date = $_REQUEST['date'];
$particulars = $_REQUEST['particulars'];
$ref_no = $_REQUEST['ref_no'];
$remarks = $_REQUEST['remarks'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


$query1 = "INSERT INTO `comm_comp` (`parent_id`,`srno`,`particulars`,`ref_no`,`date`,"
        . "`remarks`,`type_comm`,`type_tax`) VALUES "
        . "('$parent_id','$srno','$particulars','$ref_no','$date',"
        . "'$remarks','$type_comm','$type_tax')";


if (($conn->query($query1) === TRUE) ) {
           
     echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/comp_audit.php?type=$type_tax&id=$id&parent_id=$parent_id' </script>";
 
}
?>
