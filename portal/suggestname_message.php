<?php
session_start();
include('config.php');
$username = $_SESSION['username'];

$q= $_POST['searchword'];
////Old query
//$sql_rees=
//mysql_query("select * from test_user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5");
//New query updated 04-02-2014
$query = "select * from users WHERE username NOT IN (select username from users WHERE username='$username') AND (name like '%$q%' or lname like '%$q%' OR CONCAT(name,' ',lname) like '%$q%') ORDER BY id  ";

$result = $conn->query($query);
while($row =  mysqli_fetch_assoc($result))
{
$fname=$row['name'];
$lname=$row['lname'];
//$img=$row['photo'];
//$country=$row['country'];
$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';
$final_fname = str_ireplace($q, $re_fname, $fname);
$final_lname = str_ireplace($q, $re_lname, $lname);
$x = $row['username'];;
?>
<div class="display_box" align="left">
    <a href='#' onclick='message("<?php echo $x ?>");'>
<!--<img src="<?php // echo $img; ?>" height="50px" width="50px" />-->
<?php echo $final_fname; ?>&nbsp;
<?php echo $final_lname; ?><br/>
</a>
</div>

<?php
}


?>

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
             setInterval(function(){
             message(x,z);
             },15000);
    }
 });
}
</script>
