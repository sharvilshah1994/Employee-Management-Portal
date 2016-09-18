<?php
session_start();
include 'config.php';
$message = $_REQUEST['message'];
$username = $_SESSION['username'];
$to = $_REQUEST['to'];
date_default_timezone_set('Asia/Kolkata');
$time1 = date("Y-m-d h:i:sa");
$query = "INSERT INTO message (message.from,message.to,message,message.time) VALUES ('$username','$to','$message','$time1')";
$conn ->query($query);
 $query1 = "SELECT message.*,users.* from message INNER JOIN users ON users.username=message.from WHERE message.to='$to' AND message.from='$username' ORDER BY message.time DESC LIMIT 1";

$result1 = $conn->query($query1);

                                    while($row1=  mysqli_fetch_assoc($result1))
                                    {
                                        $y = $row1['name'];
                                        ?>
                        <li class="left clearfix"><span class="chat-img pull-right">
                            <img src="<?php echo $row1['photo']?>" height="50px" width="50px" alt="User Avatar" class="img-circle" />
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
                                        <span class="glyphicon glyphicon-time"></span><?php echo $row1['time'];?></small>
                                </div>
                                <p>
                                    <?php 
                                    
                                      echo $row1['message'];  
                                    
                                    ?>
                                </p>
                            </div>
                            
                        </li>
<?php
                                    }


                                    ?>
