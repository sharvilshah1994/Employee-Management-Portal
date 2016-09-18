<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$id = $_REQUEST['ID'];
$query = "SELECT * FROM lib WHERE ID='$id'";
$result = $conn->query($query);
?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                   <h1 class="page-header">Update Book Records</h1>                    
        </section>
        <section class="content">
            <div class="col-lg-6">
    <form action="updatelib.php?ID=<?php echo $id;?>" method="POST">
        <?php 
        while ($row = mysqli_fetch_assoc($result)) 
                {
         ?>
    <label>Book Name:</label>
    <input type="text" class="form-control" name="book_name" id="book_name" value="<?php echo $row['book_name']?>">
    
    <label>Author:</label>
    <input type="text" class="form-control" name="author" id="author" value="<?php echo $row['author']?>">
    
    <label>Year:</label>
    <input type="text" class="form-control" name="year" id="year" value="<?php echo $row['year']?>">
    
    <label>Category:</label>
    <input type="text" class="form-control" name="category" id="category" value="<?php echo $row['category']?>">
    
    <label>Location:</label>
    <input type="text" class="form-control" name="location" id="location" value="<?php echo $row['location']?>">
    
    <label>Rack No:</label>
    <input type="text" class="form-control" name="rack_no" id="rack_no" value="<?php echo $row['rack_no']?>">
    
    <label>Book Ref Number:</label>
    <input type="text" class="form-control" name="book_ref_no" id="book_ref_no" value="<?php echo $row['book_ref_no']?>">
    <br>
    <input type="submit" name="submit" class="btn btn-success" value="Update">
    <input type="reset" name="reset" class="btn btn-warning">
    </form>
            </div>
        </section>
        
</div>



<?php
                }               
include 'footer.php';
?>