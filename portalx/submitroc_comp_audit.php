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
$verification = $_REQUEST['verification'];
$compliance = $_REQUEST['compliance'];
$remarks = $_REQUEST['remarks'];
$date_verification = $_REQUEST['date_verification'];
$verification_by = $_REQUEST['verification_by'];

date_default_timezone_set('Asia/Kolkata');
$time = date("Y-m-d");


$query1 = "INSERT INTO `roc_comp_audit` (`parent_id`,`srno`, `particulars`,`verification`,"
        . "`compliance`,`remarks`,`date_verification`,`verification_by`) VALUES "
        . "('$parent_id','$srno','$particulars','$verification','$compliance',"
        . "'$remarks','$date_verification','$verification_by')";

if(!empty($particulars))
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
