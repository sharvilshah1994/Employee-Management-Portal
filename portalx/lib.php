<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$query = "SELECT * FROM lib";
$result = $conn -> query($query);
?>


<div id="page-wrapper" style="overflow: scroll; height: 1000px">
            <div class="row">
                <div class="col-lg-12">
                    
                    <h1 class="page-header">Library <a href="addnewlib.php" class="btn btn-info pull-right">Add new book</a></h1>
                    
                    
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Books Location
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['ID'];?></td>
                                            <td><?php echo $row['book_name'];?></td>
                                            <td><?php echo $row['author'];?></td>
                                            <td><?php echo $row['category'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><a href="viewlib.php?ID=<?php echo $row['ID']?>">View</a>&nbsp;
                                                <a href="editlib.php?ID=<?php echo $row['ID']?>">Edit</a>
                                                <a href="deletelib.php?ID=<?php echo $row['ID']?>" class="fa fa-times-circle"></a></td>
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
</div>
</div>


<?php
include 'footer.php';
?>