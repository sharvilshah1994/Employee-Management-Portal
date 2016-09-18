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

$bank_statement = $_REQUEST['bank_statement'];
$cb_bank_book = $_REQUEST['cb_bank_book'];
$cb_pass_book = $_REQUEST['cb_pass_book'];

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));



$query1 = "INSERT INTO `bank_recon_audit` (`parent_id`, `bank_statement`,`cb_bank_book`,`cb_pass_book`) VALUES "
        . "('$parent_id','$bank_statement','$cb_bank_book','$cb_pass_book')";



if (($conn->query($query1) === TRUE) ) {
            
     echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/books_account_audit.php?id=11&parent_id=$parent_id' </script>";
 
}
?>
