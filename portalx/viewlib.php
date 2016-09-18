<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$id = $_REQUEST['ID'];
$query = "SELECT * FROM lib WHERE ID=$id";
$result = $conn -> query($query);
?>


<div id="page-wrapper" style="overflow: scroll; height: 1000px">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    while($row = mysqli_fetch_assoc($result) )
                    {
                    ?>
                    <h1 class="page-header"><?php echo $row['book_name'];?></h1>
                            
                    
                </div>
            </div>
    <a href="editlib.php?ID=<?php echo $row['ID'];?>" class="btn btn-info">Edit</a><br><br>
    <label>Book Name:</label>
    <?php echo $row['book_name'];?>
    <br>
    <label>Author:</label>
    <?php echo $row['author'];?>
    <br>
    <label>Year:</label>
    <?php echo $row['year'];?>
    <br>
    <label>Category:</label>
    <?php echo $row['category'];?>
    <br>
    <label>Location:</label>
    <?php echo $row['location'];?>
    <br>
    <label>Rack No:</label>
    <?php echo $row['rack_no'];?>
    <br>
    <label>Book Ref Number:</label>
    <?php echo $row['book_ref_no'];?>
</div>



<?php
                    }
include 'footer.php';
?>