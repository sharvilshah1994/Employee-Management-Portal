<?php
include("header.php");
include 'config.php';
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);

                                    while($row=  mysqli_fetch_assoc($result))
                                    {
                                        $department = $row['department'];
                                        $department1 = $row['department1'];
                                        $department2 = $row['department2'];
                                        $admin = $row['admin'];
                                    ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Broadcast News</h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Broadcast News</li>
          </ol>
        </section>
            <!-- /.row -->
            <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please enter news below to broadcast
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    <form role="form" action="submitbroadcast.php?ID=<?php echo $row['id'];?>" method="POST">
                                     
                                        <div class="form-group">
                                            <label>News</label>
                                            <textarea class="form-control" rows="3" name="news" id="news"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Select Department for which you want to broadcast news</label>
                                            <select class="form-control" name="news_department" id="news_deparment">
                                                <?php
                                                if($admin == 'Yes' or $department == 'All')
                                                {
                                                ?>
                                                <option>All</option>
                                                <?php
                                                }
                                                if($admin == 'Yes' or $department == 'All' or  $department == 'Income Tax' or $department1 == 'Income Tax' or $department2 == 'Income Tax')
                                                {
                                                    ?>
                                                <option>Income Tax</option>
                                                <?php
                                                }
                                                if($admin == 'Yes' or $department == 'All' or  $department == 'Accounting' or $department1 == 'Accounting' or $department2 == 'Accounting')
                                                {
                                                ?>
                                                <option>Accounting</option>
                                                <?php
                                                }
                                                if($admin == 'Yes' or $department == 'All' or  $department == 'Audit' or $department1 == 'Audit' or $department2 == 'Audit')
                                                {
                                                    ?>
                                                <option>Audit</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                            
                                        <button type="submit" class="btn btn-success">Broadcast News</button>
                                        <button type="reset" class="btn btn-warning">Reset Content</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    
<?php
                                    }
include("footer.php");
?>