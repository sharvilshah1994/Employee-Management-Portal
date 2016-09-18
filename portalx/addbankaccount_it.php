<?php 
include 'header.php';
include 'config.php';
$id = $_REQUEST['ID'];
$query1 = "SELECT * FROM clients WHERE ID=$id";
$result1 = $conn->query($query1);

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
                    <h1 class="page-header">Add Bank Account of <?php echo $row1['cl_name'];?></h1>
                    
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
                                    <form role="form" action="insertbankaccount_it.php?ID=<?php echo $row1['ID'];?>" enctype="multipart/form-data" method="POST">
                                        <?php 
                                                }
                                                ?>
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" id="bank_name" name="bank_name" class="form-control">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Bank Branch Location</label>
                                            <input type="text" id="bank_location" name="bank_location" class="form-control">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>IFSC code</label>
                                            <input type="text" id="ifsc_code" name="ifsc_code" class="form-control">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" id="account_number" name="account_number" class="form-control">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Account Balance</label>
                                            <input type="text" id="account_balance" name="account_balance" class="form-control" placeholder="30,000 INR">
                                        </div>
                                    
                                </div>
                                
                            </div>
                            <input type="submit" name="submit" id="submit" class="btn btn-success">
                                        <input type="reset" name="reset" id="reset" class="btn btn-warning">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
<?php
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
