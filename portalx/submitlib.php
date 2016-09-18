<?php
session_start();
include 'config.php';
$book_name = $_REQUEST['book_name'];
$author = $_REQUEST['author'];
$year = $_REQUEST['year'];
$category = $_REQUEST['category'];
$location = $_REQUEST['location'];
$rack_no = $_REQUEST['rack_no'];
$book_ref_no = $_REQUEST['book_ref_no'];

$sql = "INSERT INTO `lib`(`book_name`, `author`, `year`, `category`, `location`, `rack_no`, `book_ref_no`) "
        . "VALUES ($book_name,$author,$year,$category,$location,$rack_no,$book_ref_no)";

if ($conn->query($sql) === TRUE) {
    
    echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/portal/lib.php" </script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
