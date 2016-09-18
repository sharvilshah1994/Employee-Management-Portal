<?php
session_start();
include 'config.php';
include 'header.php';
$idnum = $_REQUEST['ID'];
$query="SELECT * FROM product WHERE ID=$idnum";
$result=$conn->query($query);
$query1 = "SELECT * FROM category";
$res = $conn->query($query1);
?>
   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                    <form role="form" action="update.php?ID=<?php echo $row['ID'] ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            
                                        
                                            <input type="text" required class="form-control" placeholder="Apple iPhone 6s 64GB Black" name="name" value="<?php echo $row['name'];?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" required class="form-control" name="brand" value="<?php echo $row['brand'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" required class="form-control" placeholder="Enter value in INR" name="price" value="<?php echo $row['price'];?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                <?php
                                        while ($row1=  mysqli_fetch_assoc($res))
                                        {
                                            $ID=$row1["ID"];
                                            ?>
                                            
                                                <option><?php echo $row1['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" name="fileToUpload" value="<?php echo $row['imageurl'];?>">
                                            <input type="hidden" class="form-control" name="fileToUploadnew" value="<?php echo $row['imageurl'];?>">
                                        </div>
                                       <div class="form-group">
                                            <label>Image</label>
                                            <img src="<?php echo $row['imageurl'];?>" style="height: 100px; width: 100px">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="3" name="description"><?php echo $row['description'];?></textarea>
                                        </div>
                                            <?php
                                            }
                                            ?>
                                        <button type="submit" class="btn btn-default">Submit Details</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>

<?php
include 'footer.php';
?>