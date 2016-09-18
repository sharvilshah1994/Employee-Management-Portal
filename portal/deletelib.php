<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$ID = $_REQUEST['ID'];


$sql = "DELETE FROM `lib` WHERE ID=$ID";
if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>