<?php
session_start();
include 'config.php';
$id = $_REQUEST['ID'];
echo $sql = "DELETE FROM product WHERE ID =".$id ;


if ($conn->query($sql) === TRUE) {
    
    echo '<script type="text/javascript"> window.location = "http://localhost/Ecomm/admin/success.php" </script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
