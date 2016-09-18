<?php
session_start();
include 'config.php';
$uname = $_SESSION['username'];

$query = "SELECT log.* FROM log INNER JOIN users ON users.id=log.parent_id WHERE users.username='$uname' ORDER BY ID DESC LIMIT 1";

$result = $conn->query($query);
date_default_timezone_set('Asia/Kolkata');
    $time = date("H:i:s");
    $time1 = date("Y-m-d H:i:s",strtotime($time));
    while($row=  mysqli_fetch_assoc($result))
    { 
    $y = $row['login'];    
    $query1 = "UPDATE log SET logout='$time1' WHERE login='$y'";
    }
    $conn->query($query1);
//    $query2 = "INSERT INTO log (parent_id,last_login) ";
    session_destroy();
echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/" </script>';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

