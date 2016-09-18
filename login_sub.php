<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
include 'config.php';
$uname = $_POST['form-username'];
$password = $_POST['form-password'];


$sql = "SELECT * FROM users WHERE username='$uname' AND password='$password'";

$result = $conn->query($sql);
$privatekey = "6LfmbRkTAAAAAAmKrmu0XR9zf2WifQHPvdYhdsX0";
 $captcha=$_POST['g-recaptcha-response'];
  $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$privatekey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
  
 
  date_default_timezone_set('Asia/Kolkata');
//and $response['success'] == true
if ($result->num_rows > 0 ) {
    
    $time = date("H:i:s");
    $time1 = date("Y-m-d H:i:s",strtotime($time));
    
    while($row=  mysqli_fetch_assoc($result))
    {
    $y = $row['id'];    
    $query1 = "INSERT INTO log (parent_id,login) values ('$y','$time1')";
    }
    $conn->query($query1);
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/' </script>";
    $_SESSION['username']=$uname;
    
}
else
{
    
    echo "<script type='text/javascript'> alert('Login Failed. Please try again!'); </script>";
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/' </script>";
}

 