<?php
session_start();
include 'config.php';
$parent_id = $_REQUEST['parent_id'];
$id = $_REQUEST['ID'];
$team = $_REQUEST['team'];
$remarks = $_REQUEST['remarks'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn->query($query);
while ($row = mysqli_fetch_assoc($result))
{
   
    $type = $row['type_entity'];
    $cl_name = $row['cl_name'];
    $financial_year = $row['financial_year'];
}

$status = $_REQUEST['status'];
if(!empty($status))
{
    $status1 = $status;
}
else
{
        $query2 = "SELECT status FROM checklist_company WHERE ID='$id' AND parent_id='$parent_id'";
        $result2 = $conn->query($query2);
        while($row2 =  mysqli_fetch_assoc($result2))
        {
            $status1 = $row2['status'];
        }
}

$sql = "UPDATE `checklist_company` SET `remarks`='$remarks',`team`='$team',`status`='$status1' WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/viewaudit.php?id=$parent_id&type=$type' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
