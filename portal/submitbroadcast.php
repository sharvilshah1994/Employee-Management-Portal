<?php
include 'config.php';
$ID = $_REQUEST['ID'];
$news = $_REQUEST['news'];
$department = $_REQUEST['news_department'];
date_default_timezone_set('Asia/Kolkata');
$time = date("H:i:s");
$time1 = date("Y-m-d H:i:s",strtotime($time));
$query = "INSERT into news (parent_id,news,news_department,date) VALUES ('$ID','$news','$department','$time1')";
if ($conn->query($query) === TRUE) 
    {
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/' </script>";
}
else
{
echo "Error Broadcasting Message.<br>";
echo $query;
}