<?php
session_start();
include 'config.php';
$idnum = $_REQUEST['ID'];
$book_name = $_REQUEST['book_name'];
$author = $_REQUEST['author'];
$year = $_REQUEST['year'];
$category = $_REQUEST['category'];
$location = $_REQUEST['location'];
$rack_no = $_REQUEST['rack_no'];
$book_ref_no = $_REQUEST['book_ref_no'];

$sql = "UPDATE `lib` SET `book_name`='$book_name',`author`='$author',`year`='$year',`category`='$category',`location`='$location',`rack_no`='$rack_no',`book_ref_no`='$book_ref_no' WHERE ID='$idnum'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/lib.php' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}