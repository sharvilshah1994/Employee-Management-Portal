<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM cag_comm_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
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
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">C&AG Communication of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <form role="form" action="submitcag_comm_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            
                <a href="addcag_comm_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Add</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>
                        Sr No
                    </th>
                    <th>
                        Page number
                    </th>
                    <th>
                        Particulars
                    </th>
                    
                    <th>
                        Verification
                    </th>
                    <th>
                        Compliance
                    </th>
                    <th>
                        Remarks
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
                    <td><?php echo $row1['page_num'];?></td>
                    <td><?php echo $row1['particulars'];?></td>
                    <td><?php echo $row1['verification'];?></td>
                    <td><?php echo $row1['compliance'];?></td>
                    <td><?php echo $row1['remarks'];?></td>
                    <td><a href="editcag_comm_audit.php?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $row1['parent_id'];?>" class="btn btn-info">Edit</a></td>
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

