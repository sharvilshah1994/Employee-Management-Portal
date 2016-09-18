<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
include 'config.php';
$uname = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE name='$uname' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<script type="text/javascript"> window.location = "http://localhost/Ecomm/admin/admin_home.php" </script>';
    $_SESSION['username']=$uname;
    
}
else
{
    echo "login failed";

}

 