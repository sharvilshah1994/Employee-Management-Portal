<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM disc_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brief Discussion with management of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <form role="form" action="submitdisc_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
                ?>
                <a href="editdisc_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
            ?>    
                <label>Nature of Business-</label>
                <?php echo $row1['nature_business'];?>
                <br>
                <label>Major events in the year under audit:</label>
                <br>
                <label>a) Change in director-</label>
                <?php echo $row1['chg_director'];?>
                <br>
                <label>b) Change business line-</label>
                <?php echo $row1['chg_business_line'];?>
                <br>
                <label>c) Purchase of assets-</label>
                <?php echo $row1['purchase_assets'];?>
                <br>
                <label>d) Dealing with financial institutions/banks</label>
                <?php echo $row1['deal_banks'];?>
                <br>
                <label>e) Details of frauds if any</label>
                <?php echo $row1['detail_fraud'];?>
                <br>
                <label>f) Others please specify</label>
                <?php echo $row1['other'];?>
           
                <?php
                
                if(!empty($row1['edited_by']))
            {
            ?>
            <br>
            <br>
            <i style="font-size: 20px">Last updated by - <?php echo $row1['edited_by'];?> at <?php echo $row1['time_edit'];?></i>
            <?php
            }

            
            }
            }
            else
            {
            ?>
            <label>Nature of Business-</label>
            <input type="text" name="nature_business" id="nature_business" class="form-control">
                <br>
                <label>Major events in the year under audit:</label>
                <br>
                <label>a) Change in director-</label>
                <input type="text" name="chg_director" id="chg_director" class="form-control">
                <br>
                <label>b) Change business line-</label>
                <input type="text" name="chg_business_line" id="chg_business_line" class="form-control">
                <br>
                <label>c) Purchase of assets-</label>
                <input type="text" name="purchase_assets" id="purchase_assets" class="form-control">
                <br>
                <label>d) Dealing with financial institutions/banks</label>
                <input type="text" name="deal_banks" id="deal_banks" class="form-control">
                <br>
                <label>e) Details of frauds if any</label>
                <input type="text" name="detail_fraud" id="detail_fraud" class="form-control">
                <br>
                <label>f) Others please specify</label>
                <input type="text" name="other" id="other" class="form-control">
            
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
