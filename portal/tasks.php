<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$uname = $_SESSION['username'];
$query = "SELECT * FROM task INNER JOIN users ON task.assign_id=users.ID WHERE task.user_id = (SELECT ID FROM users WHERE username='$uname') AND task.view='0' AND task.completed='0' ORDER BY task.ID DESC";
$result = $conn -> query($query);
$query1 = "SELECT * FROM task INNER JOIN users ON task.assign_id=users.ID WHERE task.user_id = (SELECT ID FROM users WHERE username='$uname') AND task.view='1' AND task.completed='0' ORDER BY task.ID DESC";
$result1 = $conn->query($query1);
?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Tasks </h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tasks</li>
          </ol>
        </section>
                    
        <section class="content">
                <div class="row">
                <div class="col-lg-12">
                      
                        <!-- /.panel-heading -->
                        <div class="box">
                            <div class="box-header">
                  <h3 class="box-title">List of tasks</h3>
                </div>
                            
                        <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Client Name</th>
                                            <th>Department</th>
                                            <th>Timestamp</th>
                                            <th>Assigned by</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr style="background: lightgoldenrodyellow">
                                            <td><?php echo $row['task'];?></td>
                                            <td><?php echo $row['client'];?></td>
                                            <td><?php echo $row['dept'];?></td>
                                            <td><?php echo $row['date'];?></td>
                                            <td><?php echo $row['name'];?>&nbsp;<?php echo $row['lname'];?></td>
                                            <td><a href="viewtask.php?ID=<?php echo $row['ID']?>" >View</a>&nbsp;
                                                </td>
                                        </tr>
                                        <?php
                                        }
                       ?>
                                        <?php 
                                        while($row1 = mysqli_fetch_assoc($result1))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row1['task'];?></td>
                                            <td><?php echo $row1['client'];?></td>
                                            <td><?php echo $row1['dept'];?></td>
                                            <td><?php echo $row1['date'];?></td>
                                            <td><?php echo $row1['name'];?>&nbsp;<?php echo $row1['lname'];?></td>
                                            <td><a href="viewtask.php?ID=<?php echo $row1['ID']?>" >View</a>&nbsp;
                                                </td>
                                        </tr>
                                        <?php
                                        }
                       ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>

<?php
include 'footer.php';
?>

