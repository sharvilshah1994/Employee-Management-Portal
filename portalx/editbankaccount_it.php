<?php 
include 'header.php';
include 'config.php';
$id = $_REQUEST['ID'];
$parent_id = $_REQUEST['parent_id'];
$query1 = "SELECT * FROM clients WHERE ID=$parent_id";
$result1 = $conn->query($query1);
$query2 = "SELECT * FROM bankaccountit WHERE ID=$id AND parent_id=$parent_id";
$result2 = $conn->query($query2);
?>
<html>
    <body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                ?>
                    <h1 class="page-header">Edit Bank Account Details of <?php echo $row1['cl_name'];?></h1>
                    <?php 
                                                }
                                                ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                     <?php
                                                while($row2 = mysqli_fetch_assoc($result2))
                                                {
                                                ?>
                                    <form role="form" action="updatebankaccount_it.php?ID=<?php echo $id;?>&parent_id=<?php echo $parent_id;?>"  enctype="multipart/form-data" method="POST">
                                        
                                        <div class="form-group">
                                            <label>Bank Name:</label>
                                            <input type="text" id="bank_name" name="bank_name" value="<?php echo $row2['bank_name'];?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Bank Branch Location:</label>
                                            <input type="text" id="bank_location" name="bank_location" value="<?php echo $row2['bank_location'];?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>IFSC code:</label>
                                            <input type="text" id="ifsc_code" name="ifsc_code" value="<?php echo $row2['ifsc_code'];?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Account Number:</label>
                                            <input type="text" id="account_number" name="account_number" value="<?php echo $row2['account_number'];?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Account Balance:</label>
                                            <input type="text" id="account_balance" name="account_balance" value="<?php echo $row2['account_balance'];?>">
                                        </div>
                                    
                                </div>
                                
                            </div>
                            <input type="submit" value="Update" name="submit" id="submit" class="btn btn-success">
                                        <input type="reset" name="reset" id="reset" class="btn btn-warning">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
<?php
                                                }
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
