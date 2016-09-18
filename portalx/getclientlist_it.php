<?php
include 'config.php';
$id = $_REQUEST['id'];
$financial_year = $_REQUEST['financial_year'];

if($id=='draft_soi')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND draft_soi !=''";
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose Draft statement of income have been prepared-</label>
<br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
    <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    }

?>

<?php
if($id=='ndraft_soi')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND draft_soi =''";
    
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose Draft statement of income have NOT been prepared-</label>
<br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
                                            <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    }

?>

<?php
if($id=='final_soi')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND final_soi !=''";
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose Final statement of income have been prepared-</label>
<br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
                                            <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    }

?>

<?php
if($id=='nfinal_soi')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND final_soi =''";
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose Final statement of income have NOT been prepared-</label>
<br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
    <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    
}
?>

<?php
if($id=='uploaded_return')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND uploaded_return !=''";
    
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose return has been uploaded-</label>
<br>
 
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
                                            <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    
}
?>

<?php
if($id=='nuploaded_return')
{
    $query = "SELECT clients.cl_name,clients.ID from clients INNER JOIN itreturns ON itreturns.parent_id=clients.ID WHERE financial_year='$financial_year' AND uploaded_return =''";
    
    $result = $conn->query($query);
    ?>
<br>
<label>Clients whose return has NOT been uploaded-</label>
<br>
 
<div class="panel panel-default">
                        <div class="panel-heading">
                            Client Names
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
          while($row = mysqli_fetch_assoc($result))
    {
        ?>                       
                                        <tr class="odd gradeX">
                                                   
    
                                            <td><?php echo $row['cl_name'];?></td>
                                            <td><a href="itaxreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">View/File Return</a></td>
                                        </tr>
                                        <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
<br>
<?php
    
}
?>
<?php
include 'footer.php';
?>
