<?php
    include 'config.php';
    $financial_year = $_REQUEST['financial_year'];
     $query = "SELECT (SELECT count(*) FROM `itreturns` WHERE financial_year='$financial_year') as ID,"
            . "(SELECT count(*) FROM `itreturns` WHERE draft_soi !='' AND financial_year='$financial_year') as draft_soi,"
            . "(SELECT count(*) FROM `itreturns` WHERE final_soi !='' AND financial_year='$financial_year') as final_soi,"
            . "(SELECT count(*) FROM `itreturns` WHERE draft_soi ='' AND financial_year='$financial_year') as ndraft_soi,"
            . "(SELECT count(*) FROM `itreturns` WHERE final_soi ='' AND financial_year='$financial_year') as nfinal_soi,"
            . "(SELECT count(*) FROM `itreturns` WHERE uploaded_return !='' AND financial_year='$financial_year') as uploaded_return,"
            . "(SELECT count(*) FROM `itreturns` WHERE uploaded_return ='' AND financial_year='$financial_year') as nuploaded_return";
    
    $result = $conn->query($query);
   
    ?>
<style>
    table,td,tr,th{
        padding: 10px
    }
</style>
<table border="1|0">
    <?php 
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
    <tr>
        <th>Number of Clients</th>
        <th>Draft Statement of Income prepared</th>
        <th>Draft Statement of Income not prepared</th>
        <th>Final Statement of Income prepared</th>
        <th>Final Statement of Income not prepared</th>
        <th>Final return uploaded</th>
        <th>Final return not uploaded</th>
    </tr>
    <tr>
        <td><?php echo $row['ID'];?></td>
        <td><a href="#" class="click" id="draft_soi"><?php echo $row['draft_soi'];?></a></td>
        <td><a href="#" class="click" id="ndraft_soi"><?php echo $row['ndraft_soi'];?></a></td>
        <td><a href="#" class="click" id="final_soi"><?php echo $row['final_soi'];?></a></td>
        <td><a href="#" class="click" id="nfinal_soi"><?php echo $row['nfinal_soi'];?></a></td>
        <td><a href="#" class="click" id="uploaded_return"><?php echo $row['uploaded_return'];?></a></td>
        <td><a href="#" class="click" id="nuploaded_return"><?php echo $row['nuploaded_return'];?></a></td>
        
        
    </tr>
</table>
<div id="responsecontainer">
    
</div>
    <?php
    }
    ?>

<script>
    var y;
    $('a').click(function getclient() {
    y = $(this).attr('id');
    var x = "<?php echo $financial_year;?>";
    $.ajax({
      type:"GET",
      url: "getclientlist_it.php?financial_year="+ x +"&id="+ y,
      success: function(response){                    
            $("#responsecontainer").html(response); 
      
    }

 });
});
</script>
<!--<script>
    function getclient()
    {
    
    var z = "<?php echo $y;?>";
    alert(z);
    exit;
    

        
    }
    </script>-->