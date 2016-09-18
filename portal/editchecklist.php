<?php 
session_start();
include 'config.php';
include 'header.php';
$type = $_REQUEST['type'];
$id = $_REQUEST['ID'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM checklist_company WHERE ID='$id'";
$result = $conn->query($query);

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Team, Remarks and Status</h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="updatechecklist_audit.php?ID=<?php echo $id;?>&type=<?php echo $type;?>&parent_id=<?php echo $parent_id;?>" enctype="multipart/form-data" method="POST">
            <?php 
            while($row=  mysqli_fetch_assoc($result))
            {
            ?>
            
            <label>Responsible Team for <?php echo $row['particulars'];?></label>&nbsp;(Please write name of all responsible Team)
            <input type="text" class="form-control" id="team" name="team" placeholder="Name1, Name2, Name3, etc." value="<?php echo $row['team'];?>">
            <br>
            <label>Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control"><?php echo $row['remarks'];?></textarea>
            <br>
            <label>Current Status -</label>
            <?php echo $row['status'];?>
            <br>
            <br>
            <label>Change Status?</label>
            <input type="checkbox" name="checkbox-status" id="checkbox-status">
            <div style="display: none" name="div-status" id="div-status">
                <select class="form-control" id="status" name="status">
                    <option selected disabled>Please select an option</option>
                    <option>Not completed</option>
                    <option>Completed at <?php echo $time;?></option>
                </select>
            </div>
            <br>
            <br>
            <input type="submit" value="Update" class="btn btn-info">
            <input type="reset" value="Reset" class="btn btn-warning">
            <?php
            }
            ?>
            </form>
        </div>
    </div>
<?php 
include 'footer.php';
?>
    <script>
        $('#checkbox-status').change(function(){
        if($('#checkbox-status').is(":checked"))
        {
            $('#div-status').show();
        }
            else
            {
            $('#div-status').hide();
    }
    });
        </script>