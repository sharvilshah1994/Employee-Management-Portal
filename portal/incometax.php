<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();

$query="SELECT * FROM clients";
$result=$conn->query($query);

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Client Master Database for Income Tax</h1>
                                        
                                        <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li class="active">Income Tax</a></li>
                                  
          </ol>
        </section>
                <!-- /.col-lg-12 -->
                <section class="content">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <table>
                                <tr>
                                    <td style="width: 88%">
                                        Client Details
                                    </td>
                                    <td style="padding: 5px">
                                        
                                        <a href="summaryit.php" class="btn btn-warning pull-right">Summary of Clients</a>
                                        
                                    </td>
                                    
                                    <td>
                                        <a href='addclient_it.php' class='btn btn-primary'>Add Client Details</a>
                                    </td>
                                </tr>
                                
                            </table>
                            
                        </div>
                        <!-- /.panel-heading -->
                        
                               <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Client Contact Num</th>
                                            <th>Client Email Id</th>
                                            <th>Owner CA</th>
                                            <th>Accountant Name</th>
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
                                            <td><?php echo $row['cl_email'];  ?></td>
                                            <td><?php echo $row['owner_ca'];  ?></td>
                                            <td><?php echo $row['ac_name'];  ?></td>
                                            <td class="center">
                                                <table><tr><td style="padding: 3px">
                                                        <td style="padding: 3px"><a href="itaxreturns.php?ID=<?php echo $ID ?>" class='btn btn-info'>View Details</a></td>
                                        </tr></table></td>
<!--                                                <a href="deleteclient.php?id=<?php echo $ID ?>" class='btn btn-danger'>Delete</a>-->
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                               </div></div>
                                </section>
                            </div>
        

<?php
include 'footer.php';
?>