<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM audit_report WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
$query2 = "SELECT * FROM final_bs WHERE parent_id='$parent_id'";
$result2 = $conn->query($query2);
$query3 = "SELECT * FROM y2y_audit WHERE parent_id='$parent_id'";
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
                    <h1 class="page-header">Audit report of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <form role="form" action="submitaudit_report.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
            <a href="editaudit_report.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
            ?>
            <label>a) Verification of final trial balance sheet</label>
            -<a href="addfinal_bs.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"> Add record</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>Sr no</th>
                    <th>Particulars</th>
                    <th>Verification</th>
                    <th>Compliance</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
                <?php
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    ?>
                <tr>
                    <td><?php echo $row2['srno'];?></td>
                    <td><?php echo $row2['particulars'];?></td>
                    <td><?php echo $row2['verification'];?></td>
                    <td><?php echo $row2['compliance'];?></td>
                    <td><?php echo $row2['remarks'];?></td>
                    <td><a href="editfinal_bs.php?id=<?php echo $row2['ID']?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-info">Edit</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <label>b) Year to year comparison & reason for that</label>
            <br>
            <label style="color: crimson">Note: to be prepared only for account having material difference</label>
            -<a href="addy2y_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"> Add record</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>Sr no</th>
                    <th>Account head</th>
                    <th>Current year balance amount</th>
                    <th>Previous year balance amount</th>
                    <th>Reason</th>
                    <th>Actions</th>
                </tr>
                <?php
                while($row3 = mysqli_fetch_assoc($result3))
                {
                    ?>
                <tr>
                    <td><?php echo $row3['srno'];?></td>
                    <td><?php echo $row3['acc_head'];?></td>
                    <td><?php echo $row3['cr_balance_amount'];?></td>
                    <td><?php echo $row3['pr_balance_amount'];?></td>
                    <td><?php echo $row3['reason'];?></td>
                    <td><a href="edity2y_audit.php?id=<?php echo $row3['ID']?>&parent_id=<?php echo $row3['parent_id'];?>" class="btn btn-info">Edit</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-lg-6">
            <br>
            <br>
            <label>
                c) Grouping of trial balance sheet -
            </label>
            <br>
            <?php echo $row1['gp_trial_bs'];?>
            <br>
            <br>
            <label>
                d) Accounting policy -
            </label>
            <br>
            <?php echo $row1['acc_policy'];?>
            <br>
            <br>
            <label>
                e) Notes forming part of the account -
            </label>
            <br>
            <?php echo $row1['notes'];?>
            <br>
            <br>
            <label>
                f) CARO Report -
            </label>
            <br>
            <?php echo $row1['caro_report'];?>
            <br>
            <br>
            <label>
                g) C&AG Direction report attachment -
            </label>
            <a href="<?php echo $row1['cag_report'];?>">View</a>
            <br>
            <br>
            <label>
                h) Final draft audit report -
            </label>
            <a href="<?php echo $row1['final_draft_report'];?>">View</a>
        </div>
                <?php
            }
            }
            else
            {
            ?>
        <div class="col-lg-12">
            <label>a) Verification of final trial balance sheet</label>
            -<a href="addfinal_bs.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"> Add record</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>Sr no</th>
                    <th>Particulars</th>
                    <th>Verification</th>
                    <th>Compliance</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
                <?php
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    ?>
                <tr>
                    <td><?php echo $row2['srno'];?></td>
                    <td><?php echo $row2['particulars'];?></td>
                    <td><?php echo $row2['verification'];?></td>
                    <td><?php echo $row2['compliance'];?></td>
                    <td><?php echo $row2['remarks'];?></td>
                    <td><a href="editfinal_bs.php?id=<?php echo $row2['ID']?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-info">Edit</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <label>b) Year to year comparison & reason for that</label>
            <br>
            <label style="color: crimson">Note: to be prepared only for account having material difference</label>
            -<a href="addy2y_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"> Add record</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>Sr no</th>
                    <th>Account head</th>
                    <th>Current year balance amount</th>
                    <th>Previous year balance amount</th>
                    <th>Reason</th>
                    <th>Actions</th>
                </tr>
                <?php
                while($row3 = mysqli_fetch_assoc($result3))
                {
                    ?>
                <tr>
                    <td><?php echo $row3['srno'];?></td>
                    <td><?php echo $row3['acc_head'];?></td>
                    <td><?php echo $row3['cr_balance_amount'];?></td>
                    <td><?php echo $row3['pr_balance_amount'];?></td>
                    <td><?php echo $row3['reason'];?></td>
                    <td><a href="edity2y_audit.php?id=<?php echo $row3['ID']?>&parent_id=<?php echo $row3['parent_id'];?>" class="btn btn-info">Edit</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-lg-6">
            <br>
            <label>
                c) Grouping of trial balance sheet
            </label>
            <textarea id="gp_trial_bs" name="gp_trial_bs" class="form-control"></textarea>
            <br>
            <label>
                d) Accounting policy
            </label>
            <textarea id="acc_policy" name="acc_policy" class="form-control"></textarea>
            
            <br>
            <label>
                e) Notes forming part of the account
            </label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
            
            <br>
            <label>
                f) CARO Report
            </label>
            <textarea id="caro_report" name="caro_report" class="form-control"></textarea>
            <br>
            <label>
                g) C&AG Direction report attachment
            </label>
            <input type="file" name="cag_report" id="cag_report" class="form-control">
            
            <br>
            <label>
                h) Final draft audit report
            </label>
            <input type="file" name="final_draft_report" id="final_draft_report" class="form-control">
                
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
