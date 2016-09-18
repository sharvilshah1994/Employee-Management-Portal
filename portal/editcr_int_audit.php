<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM cr_int_audit WHERE parent_id='$parent_id' and ID='$id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current year's internal/concurrent/preaudit report of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            
            <form role="form" action="updatecr_int_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
              
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
             ?>
                <label>Sr no</label><br>
            <input type="text" id="srno" name="srno" class="form-control" value="<?php echo $row1['srno'];?>">
            <br>
            <label>Page number</label><br>
            <input type="text" id="page_num" name="page_num" class="form-control" value="<?php echo $row1['page_num'];?>">
            <br>
            <label>Particulars</label><br>
            <input type="text" id="particulars" name="particulars" class="form-control" value="<?php echo $row1['particulars'];?>">
            <br>
            <label>Verification</label><br>
            <input type="text" id="verification" name="verification" class="form-control" value="<?php echo $row1['verification'];?>">
            <br>
            <label>Compliance</label><br>
            <input type="text" id="compliance" name="compliance" class="form-control" value="<?php echo $row1['compliance'];?>">
            <br>
            <label>Remarks</label><br>
            <input type="text" id="remarks" name="remarks" class="form-control" value="<?php echo $row1['remarks'];?>"><br>
            
            <input type="submit" name="submit" value="Update" class="btn btn-info">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
            
            <?php
            }
            ?>
            
            
            </form>
            
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>
$("#select1").change(function(){
        $(this).find("option:selected").each(function(){
            
            
            if($(this).attr("id")=="No"){
                $("#no-remarks-1-div").show();
            }
            else{
                $("#no-remarks-1-div").hide();
                $("#no_remarks_1").val('');
            }
        });
    }).change();
  
    $("#select2").change(function(){
        $(this).find("option:selected").each(function(){
            
            
            if($(this).attr("id")=="No"){
                $("#no-remarks-2-div").show();
            }
            else{
                $("#no-remarks-2-div").hide();
                $("#no_remarks_2").val('');
            }
        });
    }).change();
</script>
