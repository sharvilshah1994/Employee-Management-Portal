<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM ledger_audit WHERE parent_id='$parent_id'";
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
                    <h1 class="page-header">Ledger verification of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="books_account_audit.php?id=11&parent_id=<?php echo $parent_id;?>">Go back to verification of books of accounts</a><br>
            
            
                <a href="addledger_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Add</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>
                        Sr No
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Voucher Number
                    </th>
                    <th>
                        Account Head
                    </th>
                    <th>
                        Group
                    </th>
                    <th>
                        Amount (Dr/Cr)
                    </th>
                    <th>
                        Particulars
                    </th>
                    <th>
                        Remarks
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
            ?>    
                <tr>
                    <td><?php echo $row1['srno'];?></td>
                    <td><?php echo $row1['date_checking'];?></td>
                    <td><?php echo $row1['voucher_no'];?></td>
                    <td><?php echo $row1['account_head'];?></td>
                    <td><?php echo $row1['group'];?></td>
                    <td><?php echo $row1['amount'];?></td>
                    <td><?php echo $row1['particulars'];?></td>
                    <td><?php echo $row1['remarks'];?></td>
                    <td><?php echo $row1['status'];?></td>
                    <td><a href="editledger_audit.php?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $row1['parent_id'];?>" class="btn btn-info">Edit</a></td>
                </tr>
                <?php
            }
            ?>
                </table>
             
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
