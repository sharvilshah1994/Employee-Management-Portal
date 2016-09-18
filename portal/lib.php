<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$query = "SELECT * FROM lib";
$result = $conn -> query($query);
?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Library </h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Library</li>
          </ol>
        </section>
                    
        <section class="content">
                <div class="row">
                <div class="col-lg-12">
                      
                        <!-- /.panel-heading -->
                        <div class="box">
                            <div class="box-header">
                  <h3 class="box-title">Books Location</h3><a href="addnewlib.php" class="btn btn-info pull-right">Add new book</a>
                </div>
                            
                        <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
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
                                        <tr>
                                            <td><?php echo $row['ID'];?></td>
                                            <td><?php echo $row['book_name'];?></td>
                                            <td><?php echo $row['author'];?></td>
                                            <td><?php echo $row['category'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><a href="viewlib.php?ID=<?php echo $row['ID']?>" >View</a>&nbsp;
                                                <a href="editlib.php?ID=<?php echo $row['ID']?>" >Edit</a>
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
include 'footer-datatable.php';
?>

