<?php
include 'config.php';
$ID = $_REQUEST['ID'];
$news = $_REQUEST['news'];
$department = $_REQUEST['news_department'];
date_default_timezone_set('Asia/Kolkata');
$time = date("H:i:s");
$time1 = date("Y-m-d H:i:s",strtotime($time));
$query = "UPDATE news SET news='$news',news_department='$department',date='$time1' WHERE ID='$ID'";
if ($conn->query($query) === TRUE) 
    {
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/' </script>";
}
else
{
echo "Error Broadcasting Message.<br>";
}