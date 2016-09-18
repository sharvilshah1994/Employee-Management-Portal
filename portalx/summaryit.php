<?php
session_start();
include 'config.php';
include 'header.php';
$query = "SELECT * FROM financial_year";
$result = $conn->query($query);
$query1 = "SELECT * FROM clients";
$result1 = $conn->query($query1);
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Summary of Clients Income Tax Returns</h1>
    </div>
    <hr>
    <div class="form-group">
        <label>&nbsp;&nbsp;&nbsp;Select Financial Year:</label>
        
    <select id="year" name="year">
        <?php while($row1=  mysqli_fetch_assoc($result1))
{
    ?>

        <?php 
                while($row=  mysqli_fetch_assoc($result))
                {
        ?>
        <option value="<?php echo $row1['ID']?>"><?php echo $row['year'];?></option>
        <?php
        }
}
        ?>
    </select>
        &nbsp;<input type="button" class="btn btn-info" id="load" name="load" onClick="load()" value="Load Details">
    </div>
    <div id="client" name="client">
    
    </div>
</div>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
     function load()
 {
    
      var x = $("#year").val();
      var y = $("#year option:selected").text();
      
      $.ajax({
      type:"GET",
      url: "summary.php?ID="+ x +"&financial_year="+y,
      success: function(response){                    
            $("#client").html(response); 
      
    }

 });
 }
    </script>
    <?php

include 'footer.php';
?>