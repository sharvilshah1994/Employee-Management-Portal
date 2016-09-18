<?php
session_start();
include 'config.php';
$ID = $_REQUEST['ID'];



$sql = "DELETE FROM `news` WHERE ID=$ID";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/' </script>";   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
        ?>
