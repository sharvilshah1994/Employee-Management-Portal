<?php 
include 'config.php';
session_start();
$to = $_REQUEST['to'];
$user = $_REQUEST['from'];
$id = $_REQUEST['ID'];
$query3 = "UPDATE message SET count = '1' WHERE message.from = $to and message.to = $user";
$conn->query($query3);

?>