<?php 
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

include 'config.php';
session_start();
$idnum = $_REQUEST['ID'];
$query="SELECT * FROM clients WHERE ID=$idnum";
$result=$conn->query($query);


?>
<?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
<img src="<?php echo $row['cl_passport_image'];?>" style="height: 500px; width: 500px"><br>

     <?php
                                        }
     ?>