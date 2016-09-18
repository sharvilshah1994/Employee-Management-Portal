<?php
session_start();
include 'config.php';
//include 'header.php';
$to = $_REQUEST['to'];
$user = $_REQUEST['from'];
$id = $_REQUEST['id'];
 $query3 = "UPDATE message SET count = '1' WHERE message.from = '$to' and message.to = '$user' AND ID = '$id'";

$conn->query($query3);

$username = $_SESSION['username'];
//$query = "SELECT message.*,users.* from message INNER JOIN users ON users.username=message.from WHERE message.to='$to' AND message.from='$username'";
//
//$result = $conn->query($query);
$query1 = "SELECT users.*,log.* from users,log WHERE users.id=log.parent_id  AND users.username='$to' ORDER BY log.ID DESC LIMIT 1";

$result1 = $conn->query($query1);
$query2 = "SELECT message.*,users.* from message INNER JOIN users ON users.username=message.from WHERE (message.to='$username' AND message.from='$to') OR (message.to='$to' AND message.from='$username')";
//$query2 = "SELECT message.*,users.*,log.* from message,users,log WHERE users.username=message.from AND users.id=log.parent_id AND (message.to='$username' AND message.from='$to') OR (message.to='$to' AND message.from='$username')";

$result2 = $conn->query($query2 );
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Messaging</h3>
                    
                </div>
            <div class="container">
    <div class="row">
        <div class="col-md-5"  >
            <div class="panel panel-primary"  >
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat with <?php while($row1=  mysqli_fetch_assoc($result1))
                    {
                        echo $row1['name'];
                        echo '&nbsp;';
                        echo $row1['lname'];
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $logout = $row1['logout'];
                    
                    if($logout == '0000-00-00 00:00:00')
                    {
                        echo '<i>Online</i>';
                    }
                    elseif($logout==NULL)
                    {
                        
                    }
                    else
                    {
                        echo '<i>Last seen at '. $logout . '</i>';
                    
                    } 
                        ?>
                    
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="sendmessage.php?to=<?php echo $to;?>"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                          
                        </ul>
                    </div>
                </div>
                <div id="scroll" class="panel-body" style="overflow: scroll; height: 400px">
                    
                    <ul class="chat">
                        
                        <?php 
                                    while($row2=  mysqli_fetch_assoc($result2))
                                    {
                                        
                                        if($username==$row2['from'] && $to==$row2['to'])
                                        {
                                            
                                        ?>
                        <!--src="http://placehold.it/50/55C1E7/fff&text=<?php // echo substr("$y",0,1);?>"-->
                        <li class="right clearfix"><span class="chat-img pull-right">
                                <?php $y = $row2['name'];?>
                                <img src="<?php echo $row2['photo']?>" height="50px" width="50px"  alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $row2['time'];?></small>
                                    <strong class="pull-right primary-font"><?php echo $row2['name']; ?>&nbsp;<?php echo $row2['lname'];?></strong>
                                </div>
                                <p>
                                    <?php echo $row2['message']; ?>
                                </p>
                            </div>
                            
                        </li>
                        <?php
                        
                                        }
                                else {
                                    
                            $y = $row2['name'];
                            ?>
                        <!--src="http://placehold.it/50/FA6F57/fff&text=<?php // echo substr("$y",0,1);?>"-->
                        <li class="left clearfix odd gradeX"><span class="chat-img pull-left">
                            <img src="<?php echo $row2['photo']?>" height="50px" width="50px"  alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">
                                    <?php
                                        echo $row2['name'];
                                        echo '&nbsp;';
                                        echo $row2['lname'];
                                    
                                    ?>
                                    </strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo $row2['time'];?></small>
                                </div>
                                <p>
                                    <?php 
                                    
                                      echo $row2['message'];  
                                    
                                    ?>
                                </p>
                            </div>
                            
                        </li>
                        <?php

                                }
                                    }
                        
                        ?>
                           
                        
                       <div id="send-box">
                        
                        </div>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <form onsubmit="send(); return false;">
                        <input id="msg" name="msg" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            
                            <input type="submit" class="btn btn-warning btn-sm" id="chat"  value="Send">
                           
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            
            
            
            </div>
</div>

<?php
                    }
//include 'footer.php';
?>


<script>
    function send()
    {
        
      var x = $("#msg").val();
          var y = "<?php echo $to; ?>";
        
             $.ajax({
      type:"POST",
      url: "insertmessage.php?message="+ x +"&to="+ y,
      success: function(response){                    
            $("#send-box").append(response); 
            $("#msg").val("");
    }

 });
    
    
    }
    
    function recv()
    {
        
         var x= "<?php echo $user;?>";
          var y = "<?php echo $to; ?>";
        
             $.ajax({
      type:"POST",
      url: "recvmessage.php?from="+ y +"&to="+x,
      success: function(response){                    
            $("#send-box").append(response);       
    }
 });
    }
    
    window.setInterval(function(){
        recv();
        /// call your function here
}, 1000);
          


    $(document).ready(function(){
      
        $("#scroll").animate({ scrollTop: $(document).height() });
        return false;
        
    }        
);

//window.setTimeout(function(){ document.location.reload(true); }, 15000);
        
    


</script>