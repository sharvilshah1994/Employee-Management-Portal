<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
?>


<div id="page-wrapper" style="overflow: scroll; height: 1000px">
            <div class="row">
                <div class="col-lg-12">
                   <h1 class="page-header">Add New Book</h1>
                            
                    
                </div>
            </div>
    <form action="submitlib.php" type="POST">
    <label>Book Name:</label>
    <input type="text" class="form-control" name="book_name" id="book_name">
    
    <label>Author:</label>
    <input type="text" class="form-control" name="author" id="author">
    
    <label>Year:</label>
    <input type="text" class="form-control" name="year" id="year">
    
    <label>Category:</label>
    <input type="text" class="form-control" name="category" id="category">
    
    <label>Location:</label>
    <input type="text" class="form-control" name="location" id="location">
    
    <label>Rack No:</label>
    <input type="text" class="form-control" name="rack_no" id="rack_no">
    
    <label>Book Ref Number:</label>
    <input type="text" class="form-control" name="book_ref_no" id="book_ref_no">
    <br>
    <input type="submit" name="submit" class="btn btn-success">
    <input type="reset" name="reset" class="btn btn-warning">
    </form>
</div>



<?php
                    
include 'footer.php';
?>