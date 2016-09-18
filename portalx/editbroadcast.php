<?php
include("header.php");
include 'config.php';
$ID = $_REQUEST['ID'];
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);
$query1 = "SELECT * from news WHERE ID=$ID";
$result1 = $conn->query($query1);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Broadcast News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please enter news below to broadcast
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    while($row=  mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <form role="form" action="updatebroadcast.php?ID=<?php echo $ID;?>" method="POST">
                                     <?php
                                    }
                                    ?>
                                        <div class="form-group">
                                            <label>News</label>
                                            <?php
                                            while($row1 = mysqli_fetch_assoc($result1))
                                            {
                                                ?>
                                            <textarea class="form-control" rows="3" name="news" id="news"><?php echo $row1['news'];?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Select Department for which you want to broadcast news</label>
                                            <select class="form-control" name="department" id="deparment" selected='<?php echo $row1['news_department'];?>'>
                                                <option>All</option>
                                                <option>Income Tax</option>
                                                <option>Accounts</option>
                                                <option>Audit</option>
                                                
                                            </select>
                                        </div>
                                            
                                        <button type="submit" class="btn btn-default">Broadcast News</button>
                                        <button type="reset" class="btn btn-default">Reset Content</button>
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