<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM bank_recon_audit WHERE parent_id='$parent_id'";
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
                    <h1 class="page-header">Bank Reconciliation statement of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                ?>
            <form role="form" action="updatebank_recon_audit.php?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
           
                <label>Bank wise statement</label>
                <textarea id='bank_statement' name="bank_statement" class="form-control"><?php echo $row1['bank_statement'];?></textarea>
                <br>
            
                <label>Closing balance as per bank book</label>
                <input type='text' name="cb_bank_book" id="cb_bank_book" class="form-control" value="<?php echo $row1['cb_bank_book'];?>">
                
                <br>
                <label>Closing balance as per passbook-</label>
                <input type="text" name="cb_pass_book" id="cb_pass_book" class="form-control" value="<?php echo $row1['cb_pass_book'];?>">
            <?php
            }
            ?>
                <br>
            <input type="submit" name="submit" id="submit" value="Update" class="btn btn-info">
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
