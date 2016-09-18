<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include("header.php");
include 'config.php';
session_start();

$query="SELECT * FROM users";
$result=$conn->query($query);

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                              <h1 class="page-header">Registered Users</h1>
                               <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">View Users</li>
          </ol>

                <!-- /.col-lg-12 -->
            <section class="content">
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                              
                
                        <!-- /.panel-heading -->
                            
                                <table class="table table-bordered table-striped" id="example1">
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
                
                </div></div>
               </div>
            
            
            
            </section>
</div>

<?php
include("footer.php");
?>