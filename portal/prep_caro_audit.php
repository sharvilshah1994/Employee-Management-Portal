<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM prep_caro_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Preparation of CARO for <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <form role="form" action="submitprep_caro_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
            <a href="editprep_caro_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
            ?>
            <label>Download CARO Checklist</label>
            <a href="checklist/CARO Checklist.doc">Download</a>
            <br>
            <br>
            <label>View filled up checklist</label>
            
            <a href="<?php echo $row1['caro_checklist'];?>" >View</a>
                 <?php
            }
            }
            else
            {
            ?>
            <br>
            <label>Download CARO Checklist</label>
            <a href="checklist/CARO Checklist.doc">Download</a>
            <br>
            <br>
            <label>Upload filled up Checklist</label>
            <input type="file" id="caro_checklist" name="caro_checklist" class="form-control">
            <br>
            
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            <input type="reset" name="reset" id="reset" class="btn btn-warning"> 
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
