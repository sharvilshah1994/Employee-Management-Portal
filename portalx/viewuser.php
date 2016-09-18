<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include("header.php");
include 'config.php';
session_start();

$query="SELECT * FROM users";
$result=$conn->query($query);

?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registered Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Id</th>
                                            <th>Department</th>
                                            <th>Partner</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["id"];
                                            ?>
                                           
                                        <tr class="odd gradeX">
                                            
                                            <td><?php echo $row['name'];  ?></td>
                                            <td><?php echo $row['lname'];  ?></td>
                                            <td><?php echo $row['email'];  ?></td>
                                            <td><?php echo $row['department'];  ?></td>
                                            <td><?php echo $row['partner'];  ?></td>
                                            <td class="center"><a href="edituser.php?ID=<?php echo $ID ?>" class='btn btn-info'>Edit</a>
                                                <a href="deleteuser.php?id=<?php echo $ID ?>" class='btn btn-danger'>Delete</a></td>
                                        </tr>
                                        <?php
                                        }?>
                                    </tbody>
                                </table>
                            </div>
        

<?php
include("footer.php");
?>