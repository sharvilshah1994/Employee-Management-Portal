<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$name = $_REQUEST['type'];
$query="SELECT * FROM clients_audit WHERE type_entity='$name'";
$result=$conn->query($query);

?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Client Master Database for <strong style="color:crimson"><?php echo $name?> Audit</strong></h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <table>
                                <tr>
                                    <td style="width: 88%">
                                        Client/Entity Details
                                    </td>
                                    <td>
                                        <a href='addclient_audit.php?type=<?php echo $name ?>' class='btn btn-primary'>Add Client/Entity Details</a>
                                    </td>
                                </tr>
                                
                            </table>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Client/Entity Name</th>
                                            <th>Client/Entity Contact Num</th>
                                            <th>Financial Year</th>
                                            <th>Nature of Audit</th>
                                            <th>Owner CA</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                           
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['cl_name'];  ?></td>
                                            <td><?php echo $row['cl_number'];  ?></td>
                                            <td><?php echo $row['financial_year'];  ?></td>
                                            <td><?php echo $row['nature_audit'];  ?></td>
                                            <td><?php echo $row['owner_ca'];  ?></td>
                                            <td class="center">
                                                <table><tr><td style="padding: 3px">
                                                        <td style="padding: 3px"><a href="viewaudit.php?id=<?php echo $row['ID'];?>&type=<?php echo $name?>" class='btn btn-info'>View</a></td>
                                        </tr></table></td>
                                        </tr>
                                        <?php
                                        }?>
                                    </tbody>
                                </table>
                            </div>
        

<?php
include("footer.php");
?>