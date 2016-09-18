<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM books_account_audit WHERE parent_id='$parent_id' and ID='$id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<style>
    table
    {
        width: 100%;
    }
    tr,td,th{
        
        padding: 10px;
        border: 1px solid black;
    }
</style>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Verification of books of account of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">    
            <form role="form" action="updatebooks_account_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
                <?php while($row1 = mysqli_fetch_assoc($result1))
                {
                    ?>
            
            <h3><?php echo $row1['particulars'];?></h3>
            <br>
            <label>
                Tutorial
            </label>
            <textarea id="tutorial" name="tutorial" class="form-control"><?php echo $row1['tutorial'];?></textarea>
            <br>
            <label>
                Team involved
            </label>&nbsp;(Name of all team members involved)
            <input type="text" id="team" name="team" class="form-control" value="<?php echo $row1['team'];?>" placeholder="Name1, Name2, Name3, etc.">
            <br>
            <div class="form-group registration-date">
            <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date Started</label>
                        <input class="form-control" id="date_started" type="date" name="date_started" value="<?php echo $row1['date_started'];?>">
            		
            </div>
            </div>
            <br>
            <div class="form-group registration-date">
            <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date Completed</label>
                        <input class="form-control" id="date_completed" type="date" name="date_completed" value="<?php echo $row1['date_completed'];?>">
            		
            </div>
            </div>
            <br>
            <label>Extent of verification</label>
            <input type="text" id="extent_verification" name="extent_verification" class="form-control" value="<?php echo $row1['extent_verification'];?>">
            <br>
            <label>Nature of tick</label>
            <select id="nature_tick" name="nature_tick" class="form-control">
                <option <?php if(empty($row1['nature_tick'])){ echo "selected"; } ?> disabled>Please select an option</option>
                <?php
                $query2 = "SELECT * FROM nature_tick";
                $result2 = $conn->query($query2);
                while($row2=  mysqli_fetch_assoc($result2))
                {
                    ?>
                <option <?php if($row1['nature_tick'] === $row2['nature_tick']) { 
                    echo "selected" ;
                    }?> value="<?php echo $row2['nature_tick'];?>" ><?php echo $row2['nature_tick'].'&nbsp;';?></option>
                    
                        <?php
                }
                ?>
            </select>
            
            <?php
                }
            ?>
            <br>
            <br>
            <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
            <input type="reset" name="reset" id="reset" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
