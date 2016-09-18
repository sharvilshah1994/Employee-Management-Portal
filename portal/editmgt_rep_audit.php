<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM mgt_rep_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit details of Management Representation Letter for <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            
            <form role="form" action="updatemgt_rep_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
                
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
             ?>
                
                <label>Scanned Copy of letter</label><br>
                <input type="file" id="letternew" name="letternew" class="form-control"><br>
                <input type="hidden" id="letter" name="letter" class="form-control" value="<?php echo $row1['letter'];?>">
                <?php 
                if(!empty($row1['letter']))
                {
                ?>
                <a href="<?php echo $row1['letter'];?>" >View last uploaded letter</a>
                <br>
                <?php
                }
                ?>
                <br>
                <label>Standard draft management letter</label><br>
                <input type="file" id="std_letternew" name="std_letternew" class="form-control"><br>
                <input type="hidden" id="std_letter" name="std_letter" class="form-control" value="<?php echo $row1['std_letter'];?>">
                <?php 
                if(!empty($row1['letter']))
                {
                ?>
                <a href="<?php echo $row1['letter'];?>" >View last uploaded letter</a>
                <br>
                <?php
                }
                ?>
                <br>
            <input type="submit" name="submit" value="Update" class="btn btn-info">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
            
            <?php
            }
            ?>
            
            
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
