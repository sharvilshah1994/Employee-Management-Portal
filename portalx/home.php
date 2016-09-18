<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include("header.php");
include 'config.php';
session_start();
$username = $_SESSION['username'];
$query = "SELECT log.*,users.* FROM log INNER JOIN users ON users.id=log.parent_id WHERE users.username='$username' "
        . "AND log.ID = ((SELECT log.ID FROM log INNER JOIN USERS ON users.id=log.parent_id WHERE users.username='$username' ORDER BY log.logout DESC LIMIT 1))";

$result = $conn->query($query);

$query5 = "SELECT news.*,users.name,users.lname FROM news INNER JOIN users ON users.id=news.parent_id ORDER BY news.date DESC";

$result5 = $conn->query($query5);

$query2 = "select distinct username,name,lname from users where username in (select distinct a.to from (select * from message where message.from='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.from=b.username "
        . "union all select distinct a.from from (select * from message where message.to='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.to=b.username)";
        
$result2 = $conn->query($query2);

$day = date('Y-m-d');
$query4 = "select * from users WHERE dob='$day' or doa='$day'";

$result4 = $conn->query($query4);

?>
<div id="page-wrapper" style="overflow: scroll; height: 1000px">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        while($row=  mysqli_fetch_assoc($result))
                        {
                    ?>
                    <h1 class="page-header">Welcome <strong style="color:crimson"><?php echo $row['name'];?>&nbsp;<?php echo $row['lname'];?>
                        </strong></h1>
                    <p>You last logged out at:&nbsp;<strong><?php 
                    echo $row['logout'];
                        
                    
                    ?></strong></p>
                        
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Broadcast
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <style>
                                    tr,th,td{
                                        padding: 20px;
                                    }
                                </style>
                                <div class="panel-body">
                            <div class="dataTable_wrapper" >
                                <!--style="overflow: scroll; height: 415px; width: 500px"-->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <!--<table>-->
                                    <thead>
                                        <tr>
                                            <th>Message</th>
                                            <th>Posted Time</th>
                                            <th>Posted By</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                           $dept = $row['department'];
                                           $dept1 = $row['department1'];
                                           $dept2 = $row['department2'];
                                           $admin = $row['admin'];
                                        while($row1=  mysqli_fetch_assoc($result5))
                                        {
                                            $deptnews = $row1['news_department'];
                                            if($dept==$deptnews or $dept=='All' or $dept1==$deptnews or $dept2==$deptnews or $admin=='Yes')
                                            {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row1['news'];?></td>
                                            <td><?php echo $row1['date'];?></td>
                                            <td><?php echo $row1['name'];?>&nbsp;<?php echo $row1['lname'];?></td>
                                            
                                            <?php
                                            $z = $row1['username'];
                                            if($z==$username)
                                            {
                                            ?>
                                            <td class="center"><a href="editbroadcast.php?ID=<?php echo $row1['ID'];?>">Edit</a>
                                            <a href="deletebroadcast.php?ID=<?php echo $row1['ID'];?>" >Delete</a>
                                            </td>
                                            <?php
                                            }
                                            else
                                            {
                                                echo '<td></td>';
                                            }
                                            ?>
                                            
                                        </tr>
                                        <?php
                                            }
                                        }
                                         ?>       
                                    </tbody>
                                </table>
                            </div>

                    </div>
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 
                 <div class="col-lg-4">
                     <div class="panel panel-default" >
                        <div class="panel-heading">
                            Quick Message
                        </div>
                        <div class="panel-body" style="overflow: scroll; height: 170px">
                            <?php 
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                               $to  = $row2['username'];
                                            $query5 = "SELECT * FROM message WHERE message.from = '$to' AND"
                                                        . " message.to = '$username' AND message.time > (SELECT time FROM `message` WHERE message.from='$username' "
                                                        . "AND message.to = '$to' GROUP BY message.time DESC ORDER BY message.time DESC LIMIT 1) ORDER BY message.time DESC LIMIT 1";
                                            
                                            $result5 = $conn->query($query5);
                                            if($result5 -> num_rows > 0)
                                            {
                                                 while($row5 = mysqli_fetch_assoc($result5))
                                                 {
                                            if($result5 -> num_rows > 0 and $row5['count'] == 0)
                                            {   
                              
                            ?>
                            <p>
                                <a href="message.php">  
                                <strong><i><?php echo $row2['name'];
                                echo '&nbsp'; 
                                echo $row2['lname'];
                                ?></i> </strong></a><strong>**Unread</strong>
                                
                                    <?php
                                echo '&nbsp';
                                echo '&nbsp';
                                $query3 = "SELECT users.*,log.* from users,log WHERE users.id=log.parent_id  AND users.username='$to' ORDER BY log.ID DESC LIMIT 1";
                                $result3 = $conn->query($query3);
                                while($row3=  mysqli_fetch_assoc($result3))
                                {
                                $logout = $row3['logout'];
                                }
                    if($logout == '0000-00-00 00:00:00')
                    {
                        echo '<i>Online</i>';
                    }
                    else
                    {
                        echo '<i>Last seen at '. $logout . '</i>';
                    
                    } 
                                
                                ?>
                            </p>
                            <?php
                            }
                            elseif($result5->num_rows > 0 and $row5['count'] != 0)
                                        {
                            ?>
                            <p>
                                <a href="message.php">
                                <?php echo $row2['name'];
                                echo '&nbsp'; 
                                echo $row2['lname'];
                                ?></a>
                                    <?php
                                echo '&nbsp';
                                echo '&nbsp';
                                $query3 = "SELECT users.*,log.* from users,log WHERE users.id=log.parent_id  AND users.username='$to' ORDER BY log.ID DESC LIMIT 1";
                                $result3 = $conn->query($query3);
                                while($row3=  mysqli_fetch_assoc($result3))
                                {
                                $logout = $row3['logout'];
                                }
                    if($logout == '0000-00-00 00:00:00')
                    {
                        echo '<i>Online</i>';
                    }
                    else
                    {
                        echo '<i>Last seen at '. $logout . '</i>';
                    
                    } 
                                
                                ?>
                            </p>
                            <?php
                                        }
                                                 }
                                            }
                                            else
                                            {
                                        ?>
                            <p>
                                <a href="message.php">
                                             {
                   <?php echo $row2['name'];
                                echo '&nbsp'; 
                                echo $row2['lname'];
                                ?></a>
                                    <?php
                                echo '&nbsp';
                                echo '&nbsp';
                                $query3 = "SELECT users.*,log.* from users,log WHERE users.id=log.parent_id  AND users.username='$to' ORDER BY log.ID DESC LIMIT 1";
                                $result3 = $conn->query($query3);
                                while($row3=  mysqli_fetch_assoc($result3))
                                {
                                $logout = $row3['logout'];
                                }
                    if($logout == '0000-00-00 00:00:00')
                    {
                        echo '<i>Online</i>';
                    }
                    else
                    {
                        echo '<i>Last seen at '. $logout . '</i>';
                    
                    } 
                                
                                ?>
                            </p>
                            <?php
                                            }
                            }
                            ?>
                            
                            
                            
                            
                            
                            
                        </div>
<!--                         <div class="panel-footer">
                                 <label>To:</label>
                                <input type="text" class="search form-group" id="searchbox" placeholder="Start typing name..."/>
 <div id="display">
</div>                   
                        </div>-->
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Events
                        </div>
                        <div class="panel-body">
                            <?php 
                            if($result4->num_rows == '0')
                            {
                                echo "No events!";
                            }
                            else
                            {
                            while ($row4 = mysqli_fetch_assoc($result4))
                            {
                                if($row4['dob'] == $day)
                                {
                            ?>
                            <p>Today is <?php echo $row4['name'];?><?php echo $row4['lname'];?>'s Birthday!<a href="sendmessage.php?to=<?php echo $row4['username']?>"> Message</a></p>
                            <?php
                            }
                            elseif($row4['doa'] == $day)
                            {
                             ?>
                            <p>Today is <?php echo $row4['name'];?><?php echo $row4['lname'];?>'s Anniversary!<a href="sendmessage.php?to=<?php echo $row4['username']?>"> Message</a></p>
                            <?php
                            }
                            }
                            }
                            ?>
                        </div>
                        
                    </div>
                
                </div>
                
<?php
                        }
                        
include("footer.php");
?>
                 <script>
//                     
//                      $(document).ready(function(){
//      
//        
//        
//  // Let's check if the browser supports notifications
//  if (!("Notification" in window)) {
//    alert("This browser does not support desktop notification");
//  }
//
//  // Let's check whether notification permissions have already been granted
//  else if (Notification.permission === "granted") {
//    // If it's okay let's create a notification
//    var notification = new Notification("Welcome User");
//  }
//
//  // Otherwise, we need to ask the user for permission
//  else if (Notification.permission !== 'denied') {
//    Notification.requestPermission(function (permission) {
//      // If the user accepts, let's create a notification
//      if (permission === "granted") {
//        var notification = new Notification("Hi there!");
//      }
//    });
//  }
//
//  // At last, if the user has denied notifications, and you 
//  // want to be respectful there is no need to bother them any more.
//Notification.requestPermission();function spawnNotification(theBody,theIcon,theTitle) {
//  var options = {
//      body: theBody,
//      icon: theIcon
//  }
//  var n = new Notification(theTitle,options);
//  n.show();
//}
//            }
//        
//);
</script>
<script>
//$(document).ready(function(){
//$(".search").keyup(function() 
//{
//var searchbox = $(this).val();
//var dataString = 'searchword='+ searchbox;
//if(searchbox == '')
//{
//    
//}
//else
//{
//$.ajax({
//type: "POST",
//url: "suggestname_message.php",
//data: dataString,
//cache: false,
//success: function(html)
//{
//$("#display").html(html).show();
//}
//});
//}return false; 
//});
//});

   $("#tab_active_reg").dataTable({
        bJQueryUI : true,
        bDestroy : true,
        aaSorting : [[0, 'desc']],
        
    });
</script>
