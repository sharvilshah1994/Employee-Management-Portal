<?php
session_start();
include 'config.php';
$cl_name = $_REQUEST['cl_name'];
$cl_number = $_REQUEST['cl_number'];
$cl_dob = $_REQUEST['cl_dob'];
$cl_email = $_REQUEST['cl_email'];
$cl_off_number = $_REQUEST['cl_off_number'];
$owner_ca = $_REQUEST['owner_ca'];
$cl_pan = $_REQUEST['cl_pan'];
$cl_passport = $_REQUEST['cl_passport'];
$cl_adhar = $_REQUEST['cl_adhar'];
$file_location = $_REQUEST['file_location'];
$digital_sign = $_REQUEST['digital_sign'];
$ac_name = $_REQUEST['ac_name'];
$ac_number = $_REQUEST['ac_number'];
$ac_email = $_REQUEST['ac_email'];
$e_file_location = $_REQUEST['e_file_location'];
$cl_status = $_REQUEST['cl_status'];
if (!file_exists("uploads/incometax/$cl_name")) {
    mkdir("uploads/incometax/$cl_name", 0777, true);
}
if (!file_exists("uploads/incometax/$cl_name/passport"))
{
    mkdir("uploads/incometax/$cl_name/passport",0777,true);
}

if(!empty($_FILES["fileToUpload1"]["name"])){
$target_dir = "uploads/incometax/$cl_name/passport/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
if (!file_exists("uploads/incometax/$cl_name/adhar_card"))
{
    mkdir("uploads/incometax/$cl_name/adhar_card",0777,true);
}
}

if(!empty($_FILES["fileToUpload2"]["name"])){
$target_dir1 = "uploads/incometax/$cl_name/adhar_card/";
$target_file1 = $target_dir1 . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
if (!file_exists("uploads/incometax/$cl_name/pan_card"))
{
    mkdir("uploads/incometax/$cl_name/pan_card",0777,true);
}    
}

if(!empty($_FILES["fileToUpload3"]["name"])){
$target_dir2 = "uploads/incometax/$cl_name/pan_card/";
$target_file2 = $target_dir2 . basename($_FILES["fileToUpload3"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO `clients`(`cl_name`, `cl_number`, `cl_email`, `ac_name`, `ac_number`, `ac_email`, `cl_pan`, `cl_pan_image`, `cl_dob`, `cl_passport`, `cl_passport_image`, `cl_adhar`, `cl_adhar_image`, `file_location`, `e_file_location`, `owner_ca`, `digital_sign`, `cl_off_number`, `cl_status`) VALUES ('$cl_name', '$cl_number', '$cl_email', '$ac_name', '$ac_number', '$ac_email', '$cl_pan', '$target_file2', '$cl_dob', '$cl_passport', '$target_file', '$cl_adhar', '$target_file1', '$file_location', '$e_file_location', '$owner_ca', '$digital_sign', '$cl_off_number','$cl_status')";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://localhost/dgsm1/portal/home.php' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
