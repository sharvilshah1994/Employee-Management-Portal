<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname='dgsm';
error_reporting('0');
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$database=mysqli_select_db( $conn, $dbname );

if($database)
{
        
  //  echo 'databas connction successfull';
}
?>

