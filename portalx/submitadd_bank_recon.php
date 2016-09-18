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
$date = $_REQUEST['date'];
$particulars = $_REQUEST['particulars'];
$date_clearing = $_REQUEST['date_clearing'];
$amount = $_REQUEST['amount'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));


$query1 = "INSERT INTO `add_bank_recon` (`parent_id`,`srno`, `date`, `particulars`,`date_clearing`, `amount`) VALUES "
        . "('$parent_id','$srno','$date','$particulars','$date_clearing','$amount')";

if (($conn->query($query1) === TRUE) ) {
            
     echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/bank_recon_audit.php?id=$id&parent_id=$parent_id' </script>";
 
}
?>
