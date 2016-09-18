<?php
include("header.php");
include 'config.php';
$query = "SELECT * FROM category";
$result = $conn->query($query);
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add new product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="submit.php" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" required class="form-control" placeholder="Apple iPhone 6s 64GB Black" name="name">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" required class="form-control" name="brand" >
                                        </div>
                                       
                                            <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" required class="form-control" placeholder="Enter value in INR" name="price">
                                        </div>
                                         <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" name="fileToUpload">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
                                            
                                        <button type="submit" class="btn btn-default">Submit Details</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>




<?php
include("footer.php");
?>