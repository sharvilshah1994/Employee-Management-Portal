<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM stat_comp_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statutory compliance of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <br>
            <br>
            <label>List of applicable laws-</label>
            <br>
            <ul>
                <li><a href="comp_audit.php?type=tds&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Income Tax - TDS</a></li>
                <li><a href="comp_audit.php?type=at&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Income Tax - Advanced Tax</a></li>
                <li><a href="comp_audit.php?type=itr&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Income Tax - ITR</a></li>
                <li><a href="comp_audit.php?type=service&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Service Tax</a></li>
                <li><a href="comp_audit.php?type=excise&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Excise</a></li>
                <li><a href="comp_audit.php?type=vat&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">VAT & CST</a></li>
                <li><a href="comp_audit.php?type=other&id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Any other please specify</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
