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
$query2 = "SELECT * FROM add_bank_recon WHERE parent_id='$parent_id'";
$result2 = $conn->query($query2);
$query3 = "SELECT * FROM less_bank_recon WHERE parent_id='$parent_id'";
$result3 = $conn->query($query3);
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
            <a href="books_account_audit.php?id=11&parent_id=<?php echo $parent_id;?>">Go back to verification of books of accounts</a><br>
            <form role="form" action="submitbank_recon_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
            <a href="editbank_recon_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
            ?>
                <label>Bank wise statement-</label>
                <?php echo $row1['bank_statement'];?>
                <br>
                <br>
                <label>Closing balance as per bank book-</label>
                <?php echo $row1['cb_bank_book'];?>
                <br> 
                <br>
               
                <label>Add</label>
                -<a href="add_bank_recon.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"> Add record for add</a>
                <br>
                <br>
                </div>
        <div class="col-lg-12">
                <table>
                    <tr>
                        <th>
                            Sr no
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Particulars
                        </th>
                        <th>
                            Subsequent date of clearing
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    <?php
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row2['srno'];?></td>
                        <td><?php echo $row2['date'];?></td>    
                        <td><?php echo $row2['particulars'];?></td>
                        <td><?php echo $row2['date_clearing'];?></td>
                        <td><?php echo $row2['amount'];?></td>
                        <td><a href="editadd_bank_recon.php?id=<?php echo $row2['ID']?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-info">Edit</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
        
                <br>
                <br>
                <label>Less</label>
                - <a href="less_bank_recon.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>">Add record for less</a>
                <br>
                <br>
                <table>
                    <tr>
                        <th>
                            Sr no
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Particulars
                        </th>
                        <th>
                            Subsequent date of clearing
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Actions 
                        </th>
                    </tr>
                    <?php
                    while($row3 = mysqli_fetch_assoc($result3))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row3['srno'];?></td>
                        <td><?php echo $row3['date'];?></td>    
                        <td><?php echo $row3['particulars'];?></td>
                        <td><?php echo $row3['date_clearing'];?></td>
                        <td><?php echo $row3['amount'];?></td>
                        <td><a href="editless_bank_recon.php?id=<?php echo $row3['ID'];?>&parent_id=<?php echo $row3['parent_id'];?>" class="btn btn-info">Edit</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <br>
                <br>
                <label>Closing balance as per passbook-</label>
                <?php echo $row1['cb_pass_book'];?>
            <?php
            }
            }
            else
            {
            ?>
                <label>Bank wise statement</label>
                <textarea id='bank_statement' name="bank_statement" class="form-control"></textarea>
                <br>
                
                <label>Closing balance as per bank book</label>
                <input type='text' name="cb_bank_book" id="cb_bank_book" class="form-control">
                <br>
                <br>
                <label>Add</label>
                <a href="add_bank_recon.php" class="btn btn-info">Add record for add</a>
                <br>
                <br>
                <table>
                    <tr>
                        <th>
                            Sr no
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Particulars
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    <?php
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row2['srno'];?></td>
                        <td><?php echo $row2['date'];?></td>    
                        <td><?php echo $row2['particulars'];?></td>
                        <td><?php echo $row2['amount'];?></td>
                        <td><a href="editadd_bank_recon.php?id=<?php echo $row2['ID']?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-info">Edit</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                
                <br>
                <br>
                <label>Less</label>
                <a href="less_bank_recon.php" class="btn btn-info">Add record for less</a>
                <br>
                <br>
                <table>
                    <tr>
                        <th>
                            Sr no
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Particulars
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Actions 
                        </th>
                    </tr>
                    <?php
                    while($row3 = mysqli_fetch_assoc($result3))
                    {
                    ?>
                    <tr>
                        <td><?php echo $row3['srno'];?></td>
                        <td><?php echo $row3['date'];?></td>    
                        <td><?php echo $row3['particulars'];?></td>
                        <td><?php echo $row3['amount'];?></td>
                        <td><a href="editless_bank_recon.php?id=<?php echo $row3['ID']?>&parent_id=<?php echo $row3['parent_id'];?>" class="btn btn-info">Edit</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
        </div>
        <div class="col-lg-6">
                <br>
                <br>
                <label>Closing balance as per passbook</label>
                <input type="text" name="cb_pass_book" id="cb_pass_book" class="form-control">
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
