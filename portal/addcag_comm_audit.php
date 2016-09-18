<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$uname = $_SESSION['username'];
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<style>
    tr,td
    {
        padding: 10px;
    }
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add details of C&AG Communication for <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            <form role="form" action="submitcag_comm_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
                
                <label>Sr No</label>
                <input type="text" name="srno" id="srno" class="form-control">
                <br>
                   <label>Page number</label>
                <input type="text" name="page_num" id="page_num" class="form-control">
                <br>
                <label>Particulars</label>
                <input type="text" name="particulars" id="particulars" class="form-control">
                
                <br>
                <label>Verification</label>
                <input type="text" name="verification" id="verification" class="form-control">
                <br>
                <label>Compliance</label>
                <input type="text" name="compliance" id="compliance" class="form-control">
                 <br>
            <label>Remarks</label>
            <input type="text" name="remarks" id="remarks" class="form-control">       
            <br>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
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
