<?php
session_start();
include 'config.php';
$id= $_REQUEST['id'];
$name = $_REQUEST['name'];
$lname = $_REQUEST['lname'];
$bdate = $_REQUEST['bdate'];
$address = $_REQUEST['address'];
$doj = $_REQUEST['doj'];
$department = $_REQUEST['department'];
$department1 = $_REQUEST['department1'];
$department2 = $_REQUEST['department2'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$userid = $_REQUEST['userid'];
$password = $_REQUEST['password'];
$fileToUploadnew = $_REQUEST['fileToUploadnew'];
$doa = $_REQUEST['doa'];
$partner = $_REQUEST['partner'];
$admin = $_REQUEST['admin'];

if (!file_exists("uploads/Employees/$name")) {
    mkdir("uploads/Employees/$name", 0777, true);
}

if(empty($_FILES["fileToUpload"]["name"]))
{
   $target_file= $fileToUploadnew;
}
 else {
$target_dir = "uploads/Employees/$name/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 }
 
 

$sql = "UPDATE users SET username='$userid', password='$password', name='$name', lname='$lname', address='$address', email='$email', photo='$target_file', phone='$number', doj='$doj', department='$department', "
        . "partner='$partner', admin='$admin',dob='$bdate',doa='$doa',department1='$department1',department2='$department2' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/viewuser.php' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
