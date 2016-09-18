<?php
session_start();
include 'config.php';
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
$doa = $_REQUEST['doa'];
$partner = $_REQUEST['partner'];
$admin = $_REQUEST['admin'];
$defaultfile = $_REQUEST['defaultfile'];

if (!file_exists("uploads/Employees/$name")) {
    mkdir("uploads/Employees/$name", 0777, true);
}


if(!empty($_FILES["fileToUpload"]["name"]))
{
$target_dir = "uploads/Employees/$name/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 else {
$target_file = $defaultfile;
 }

$sql = "INSERT INTO users (username,password,name,lname,address,email,phone,photo,doj,department,partner,admin,dob,doa,department1,department2) VALUES ('$userid','$password','$name','$lname','$address','$email','$number','$target_file','$doj','$department','$partner','$admin','$bdate','$doa','$department1','$department2')";

if ($conn->query($sql) === TRUE) {
    $sql1 = "SELECT * FROM users WHERE username='$userid'";
    $result1 = $conn->query($sql1);
    while ($row1 = mysqli_fetch_assoc($result1))
    {
                $id = $row1['id'];
                date_default_timezone_set('Asia/Kolkata');
                $time = date("Y-m-d h:i:s");
                $sql2 = "INSERT INTO log (parent_id,login,logout) VALUES ('$id','$time','$time')";
    }
    if ($conn->query($sql2) === TRUE)
    {
    echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/portal/viewuser.php" </script>';
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
