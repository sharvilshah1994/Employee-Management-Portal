<?php
session_start();
include 'config.php';

$from = $_REQUEST['from'];
$to = $_REQUEST['to'];

$query = "SELECT * FROM message WHERE message.from = '$from' AND message.to = '$to' AND "
        . "message.time > (SELECT time FROM `message` WHERE message.from='$to' AND message.to = '$from' GROUP BY message.time DESC ORDER BY message.time DESC LIMIT 1) ORDER BY message.time DESC ";

$result = $conn->query($query);

 $query1 = "SELECT * FROM users WHERE username='$from'";
$result1 = $conn->query($query1);
$row1 = mysqli_fetch_assoc($result1);

    
    while($row = mysqli_fetch_assoc($result))
    {
?>

<li class="left clearfix odd gradeX"><span class="chat-img pull-left">
                            <img src="<?php echo $row1['photo']?>" height="50px" width="50px"  alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">
                                    <?php
                                        echo $row1['name'];
                                        echo '&nbsp;';
                                        echo $row1['lname'];
                                    
                                    ?>
                                    </strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo $row['time'];?></small>
                                </div>
                                <p>
                                    <?php 
                                    
                                      echo $row['message'];  
                                    
                                    ?>
                                </p>
                            </div>
                            
                        </li>
                        
                        <?php
}

?>