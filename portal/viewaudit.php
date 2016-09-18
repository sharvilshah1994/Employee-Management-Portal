<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$dept = $_REQUEST['dept'];
$sql = "SELECT * FROM clients_audit WHERE ID='$id' AND type_entity='$type'";
$result = $conn -> query($sql);
$query1 = "SELECT * FROM financial_year";
$result1 = $conn->query($query1);
$query2 = "SELECT * FROM checklist_company WHERE parent_id='$id'";
$result2 = $conn->query($query2);
?>
<?php while($row = mysqli_fetch_assoc($result))
   {
       ?>
<div class="content-wrapper">
    <section class="content-header">
         <h1 class="page-header"><?php echo $row['cl_name'];?></h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li><a href="audit.php">Audit</a></li>
                                   <li><a href="audit_type.php?type=<?php echo $type?>"><?php echo $type;?> Audit</a></li>
                                   <li class="active"><?php echo $row['cl_name'];?></li>
          </ol>
        
    </section>
<section class="content">
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#home" data-toggle="tab">General Information</a>
                                </li>
                                <li  class="active"><a href="#checklist" data-toggle="tab">Checklist</a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
    
   <div id="home" class="tab-pane fade">
     <div class="col-md-4">
         <br>
    <label>Client/Entity Details - </label>
    <br>
    <br>
    <label>CIN Number:</label>
    <?php echo $row['cin_number'];?>
    <br>
    <label>Name:</label>
    <?php echo $row['cl_name'];?>
    <br>
    <label>Contact Number:</label>
    <?php echo $row['cl_number'];?>
    <br>
    <label>Email:</label>
    <?php echo $row['cl_email'];?>
    
    <br>
    <label>Type of Entity:</label>
    <?php echo $row['type_entity'];?>
    <br>    
    <label>Physical Location of file:</label>
    <?php echo $row['physical_location'];?>
    <br>
    <label>E-file Location:</label>
    <?php echo $row['e_file_location'];?>
    <br>
    <br>
    <br>
    <label>Digital Sign Information-</label>
    <br>
    <label>Information:</label>
    <?php echo $row['digital_sign'];?>
    <br>
    <label>Location:</label>
    <?php echo $row['digital_location'];?>
    <br>
    <label>Validity:</label>
    <?php echo $row['digital_validity'];?>
    </div>
    <div class="col-md-4">
        <br>
        <label>Contact Person Details-</label>
        <br>
        <br>
        <label>Name:</label>
        <?php echo $row['ac_name'];?>
        <br>
        <label>Contact Number:</label>
        <?php echo $row['ac_number'];?>
        <br>
        <label>Email:</label>
        <?php echo $row['ac_email'];?>
    </div>
    <div class="col-md-4">
        <br>
        <label>Nature of Audit:</label>
        <?php echo $row['nature_audit'];?>
        <br>
        <label>Name of Auditor:</label>
        CA&nbsp;<?php echo $row['owner_ca'];?>
        <br>
        <label>Team:</label>
        <?php echo $row['team'];?>
        <br>
        <label>Due Date:</label>
        <?php echo $row['due_date'];?>
        <br>
             <a href="editclient_audit.php?id=<?php echo $row['ID'];?>&type=<?php echo $row['type_entity'];?>" class="btn btn-info">Edit</a><br><br>
    </div>
</div>   
                            <div id="checklist" class="tab-pane fade  in active" >
                                <br>
                                <br>
                                <span class="pull-left"><a href="addrow.php?id=<?php echo $id;?>&type=<?php echo $type;?>&dept=<?php echo $dept;?>" class="btn btn-success">Add row</a></span>
                                  
                                  <span class="pull-left" style="padding-left:10px"><a href="#" class="btn btn-warning">Add column</a></span>
                                  <br>
                                <br>
                                <br>    
                                <?php
                                if($type == 'Company')
                                {
                                ?>
                              <div class="box-body">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th class="head">
                                            Sr No.
                                        </th>
                                        <th style="width:100px">
                                            Particulars
                                        </th>
                                        <th>
                                            Team Responsible
                                        </th>
                                        <th style="width:400px">
                                            Remarks
                                        </th>
                                        <th style="width:150px">
                                            Status
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
                                        <td class="head">
                                            <?php echo $row2['srno'];?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $row2['link'];?>?id=<?php echo $row2['ID'];?>&parent_id=<?php echo $row2['parent_id'];?>"><?php echo $row2['particulars'];?></a>                                            
                                        </td>
                                        <td>
                                            <?php echo $row2['team'];?>
                                        </td>
                                        <td>
                                            <?php echo $row2['remarks'];?>
                                        </td>
                                        <td>
                                            <?php echo $row2['status'];?>
                                        </td>
                                        <td>
                                            <a href="editchecklist.php?ID=<?php echo $row2['ID'];?>&type=<?php echo $type?>&parent_id=<?php echo $id?>" class="btn btn-info">Edit</a>
                                        </td>
                                        
                                    </tr>
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                </table>
                                  
                                    <br>
                                    <br>
                                <?php 
                                }
                                ?>
                            </div>

                        
                            </div>
                                      
                        </div>
    </div>
    </div>
</div>
</div>
</section>
</div>
<?php
                    }
include 'footer.php';
?>