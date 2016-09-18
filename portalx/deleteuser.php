<?php
include ("header.php");
include 'config.php';
$id = $_REQUEST['id'];

$sql = "DELETE FROM `users` WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://localhost/dgsm1/portal/viewuser.php' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}