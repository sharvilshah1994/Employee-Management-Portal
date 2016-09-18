<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM books_account_audit WHERE parent_id='$parent_id'";
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
                    <h1 class="page-header">Verification of books of account of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            
            
                
            <br>
            <br>
            <table>
                <tr>
                    <th>
                        Sr No
                    </th>
                    <th>
                        Particulars
                    </th>
                    <th>
                        Tutorial
                    </th>
                    <th>
                        Team involved
                    </th>
                    <th>
                        Date started
                    </th>
                    <th>
                        Date completed
                    </th>
                    <th>
                        Extent of verification
                    </th>
                    <th>
                        Nature of tick
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
                    <td><a href="<?php echo $row1['link'];?>?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $row1['parent_id'];?>"><?php echo $row1['particulars'];?></a></td>
                    <td><?php echo $row1['tutorial'];?> </td>
                    <td><?php echo $row1['team'];?></td>
                    <td><?php if($row1['date_started'] != '0000-00-00') { echo $row1['date_started']; } else { }?></td>
                    <td><?php if($row1['date_completed'] != '0000-00-00') { echo $row1['date_completed']; } else { }?></td>
                    <td><?php echo $row1['extent_verification'];?></td>
                    <td><?php echo $row1['nature_tick'];?></td>
                    <td><a href="editbooks_account_audit.php?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $row1['parent_id'];?>" class="btn btn-info">Edit</a></td>
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
