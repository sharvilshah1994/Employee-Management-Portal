<?php
session_start();
include 'config.php';
include 'header.php';
$username = $_SESSION['username'];
$query = "select distinct name,lname,username from users where username in (select distinct a.to from (select * from message where message.from='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.from=b.username "
        . "union all select distinct a.from from (select * from message where message.to='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.to=b.username)";
$result = $conn->query($query);


?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Messaging</h3>
                    
                </div>
                <div id="compose" style="display:none">
                            <div class="col-lg-12">
                                <label>To:</label>
                                <input type="text" class="search form-control" id="searchbox" placeholder="Start typing name..."/>
<div id="display">
</div>                    
                                    <br><br>
                            </div>
                            <br><br>
                        </div>
                
                <div class="col-lg-12" id="inbox">
                    
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inbox
                            
                            <div class="col-sm-1 col-md-2 pull-right">
                    <a href="#" class="fa fa-pencil btn btn-danger " id="write" role="button">&nbsp;COMPOSE NEW</a>
                    </div>
                            <br><br>
                        </div>
                        <form method="GET">
                                    
                                    </form>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Chat thread</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                        
                                        while($row=  mysqli_fetch_assoc($result))
                                        {
                                            $to  = $row['username'];
                                            $query1 = "SELECT * FROM message WHERE message.from = '$to' AND"
                                                        . " message.to = '$username' AND message.time > (SELECT time FROM `message` WHERE message.from='$username' "
                                                        . "AND message.to = '$to' GROUP BY message.time DESC ORDER BY message.time DESC LIMIT 1) OR ((SELECT count(*) FROM message WHERE message.to='$to' AND message.from = '$username')= '0' ) ORDER BY message.time DESC LIMIT 1";
                                            
                                            $result1 = $conn->query($query1);
                                            if($result1 -> num_rows > 0)
                                            {
                                                 while($row1 = mysqli_fetch_assoc($result1))
                                                 {
                                            if($result1 -> num_rows > 0 and $row1['count'] == 0)
                                            {   
                                                
                                            ?>
                                        <tr>
                                            <i type="text" style="display:none" id="row"><?php echo $row['username'];?></i>
                                            <i type="text" style="display:none" id="row1"><?php echo $row1['ID'];?></i>
                                            <td>
                                                <strong><i><?php echo $row['name']; ?>&nbsp;
                                                <?php echo $row['lname'] ?></i></strong> **Unread
                                            </td>
                                            <td> <?php
                                                $x = $row['username'];
                                                $y = $row1['ID'];
                                                
                                                ?>
                                            <a href='#' class='btn btn-info' id='sendmessage' onclick='message("<?php echo $x ?>", <?php echo $y ?>);'>Message</a>
                                            </td>
                                        </tr>
                                                
                                                <?php
                                        }
                                            
                                        elseif($result1->num_rows > 0 and $row1['count'] != 0)
                                        {
                                            ?>
                                             <tr>
                                    <i type="text" style="display:none" id="row"><?php echo $row['username'];?></i>
                                    <i type="text" style="display:none" id="row1"><?php echo $row1['ID'];?></i>        
                                    <td id="row">
                                                <?php echo $row['name']; ?>&nbsp;
                                                <?php echo $row['lname'] ?>
                                            </td>
                                            <td>
                                            <?php
                                                $x = $row['username'];
                                                $y = $row1['ID'];
                                                //echo "<a href='#' class='btn btn-info' id='sendmessage' onclick='message(" .$x."," .$y.");'>Message</a>";
                                                ?>
                                            <a href='#' class='btn btn-info' id='sendmessage' onclick='message("<?php echo $x ?>", <?php echo $y ?>);'>Message</a></td>
                                        </tr>
                                        <?php
                                        
                                        }
                                            }
                                            }
                                            else
                                            {
                                        
                                            ?>
                                             <tr>
                                             <i type="text" style="display:none" id="row"><?php echo $row['username'];?></i>
                                           
                                             <td id="row">
                                                <?php echo $row['name']; ?>&nbsp;
                                                <?php echo $row['lname'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $x = $row['username'];
//                                                $y = $row1['ID'];
                                                //echo "<a href='#' class='btn btn-info' id='sendmessage' onclick='message(" .$x."," .$y.");'>Message</a>";
                                                       ?>
                                                <a href='#' class='btn btn-info' id='sendmessage' onclick='message("<?php echo $x ?>");'>Message</a>
                                            </td>
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
                </div>
            </div>
</div>
<div id="responsecontainer">
    
</div>

                    
                        <?php
include 'footer.php';
?>
                    
<script>
$('#write').click(function(){
            $('#compose').show();
});                 
</script>
<script>
$(document).ready(function(){


$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox == '')
{
    
}
else
{
$.ajax({
type: "POST",
url: "suggestname_message.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}
return false; 
});
});
</script>

<script>
    
    
function message(x,z)

{   
    
     var  y =  '<?php echo $username; ?>';       
    $("#page-wrapper").hide();
    
    
    $.ajax({
      type:"POST",
      url: "sendmessage.php?to="+ x +"&from="+ y +"&id="+ z,
      success: function(response){
            
            $("#responsecontainer").html(response); 
//             setInterval(function(){
//             message(x,z);
//             },15000);
    }
 });
}
</script>
