<?php
include 'config.php';
print_r($_REQUEST);
$id = $_REQUEST['ID'];
$data = $_REQUEST['data'];
$query1 = "SELECT * FROM itreturns WHERE ID=$id";
$result1 = $conn->query($query1);
$count = mysqli_num_rows($result1);
if ($count == 1)
{
    $query2 = "UPDATE itreturns set due_date='$data' WHERE ID='$id'";
    $result2 = $conn->query($query2);
}
else{

$query = "INSERT INTO itreturns (ID,due_date) VALUES ($id,$data)";
$result = $conn->query($query);

}
?>