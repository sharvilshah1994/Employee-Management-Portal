<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$idnum = $_REQUEST['ID'];
$query = "SELECT * FROM  clients c WHERE c.ID = $idnum";
$result = $conn->query($query);
$query1 = "SELECT * FROM financial_year";
$result1 = $conn->query($query1);
$query2 = "SELECT * from bankaccountit WHERE parent_id = $idnum";
$result2 = $conn->query($query2);
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
                <?php
                    while ($row =  mysqli_fetch_assoc($result))
                        {
                ?>
            <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#general" data-toggle="tab">General Information</a>
                                </li>
                                <li><a href="#bank" data-toggle="tab">Bank Account Details</a>
                                </li>
                                <li><a href="#tax" data-toggle="tab">Income Tax Returns</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="general">
                                    
                                    <h4>General Information of Client:&nbsp;<strong><?php echo $row['cl_name'];?> &nbsp; <a href="editclient_it.php?ID=<?php echo $row['ID']?>" class="btn btn-info">Edit</a></strong></h4>
                                   <table width="100%" style="vertical-align: top"><tr style="vertical-align: top; "><td width="40%" style="padding: 10px">
                                            <label>Client Details</label><br><br>
                                            <label>Client Status:</label>
                                            <?php echo $row['cl_status'];?><br> 
                                            <label>Name:</label>
                                <?php echo $row['cl_name'];?><br>
                                <label>Date of Birth:</label>
                                <?php echo $row['cl_dob'];?><br>
                                <label>Contact Number:</label>
                                <?php echo $row['cl_number'];?><br>
                                <label>Email:</label>
                                <?php echo $row['cl_email'];?><br>
                                <label>Office Number:</label>
                                <?php echo $row['cl_off_number'];?><br>
                                <label>Pan Number:</label>
                                <?php echo $row['cl_pan'];?>&nbsp;
                                <?php if(!empty($row['cl_pan_image'])) {?><a href="<?php echo $row['cl_pan_image']?>">View</a><?php } ?>
                                <br>
                                 <label>Passport Number:</label>
                                <?php if(!empty($row['cl_passport_image'])) {?><a href="<?php echo $row['cl_passport_image']?>">View</a><?php } ?>
                                <br>
                                <label>Aadhar Card Number:</label>
                                <?php if(!empty($row['cl_adhar_image'])) {?><a href="<?php echo $row['cl_adhar_image']?>">View</a><?php } ?>
                                <br>
                                <label>Physical File location:</label>
                                <?php echo $row['file_location'];?><br>
                                <label>E-File location:</label>
                                <?php echo $row['e_file_location'];?><br>
                                <label>Digital Sign Information:</label>
                                <?php echo $row['digital_sign'];?><br>        
                                        </td>
                                        
                                        <td style="padding: 10px; ">
                                <label>Accountant Details</label><br><br>
                                            <label>Accountant Name:</label>
                                <?php echo $row['ac_name'];?><br>
                                <label>Accountant Contact Number:</label>
                                <?php echo $row['ac_number'];?><br>
                                <label>Accountant Email:</label>
                                <?php echo $row['ac_email'];?><br>
                                        </td>
                                        <td>
                                        <strong>Client handled by: CA <?php echo $row['owner_ca'];?> </strong></td>  
                                        </tr>
                                
                                </table>
                                </div>
                  
                                <div class="tab-pane fade" id="bank">
                                    <style>
                                        .table,tr,td,th{
                                            padding: 20px;
                                           
                                        }
                                        
                                    </style>
                                    <h4>Bank account details of Client:&nbsp;<strong><?php echo $row['cl_name'];?></strong>&nbsp; 
                                        <a href="addbankaccount_it.php?ID=<?php echo $idnum?>" class="btn btn-info">Add</a></h4>
                                    <br>
                                    <table border="1|0">
                                        <tr>
                                            
                                            <th>Bank Name</th>
                                            <th>Branch Location</th>
                                            <th>IFSC Code</th>
                                            <th>Account Number</th>
                                            <th>Account Balance</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                        <?php
                    while ($row2 =  mysqli_fetch_assoc($result2))
                        {
                ?>
                                        <tr>
                                            
                                            <td><?php echo $row2['bank_name']?></td>
                                            <td><?php echo $row2['bank_location']?></td>
                                            <td><?php echo $row2['ifsc_code']?></td>
                                            <td><?php echo $row2['account_number']?></td>
                                            <td><?php echo $row2['account_balance']?></td>
                                            <td><a href="editbankaccount_it.php?ID=<?php echo $row2['ID'];?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-info">Edit</a>
                                                <a href="deletebankaccount_it.php?ID=<?php echo $row2['ID']?>&parent_id=<?php echo $row2['parent_id'];?>" class="btn btn-warning" onclick="sure()">Delete</a></td>
                                        </tr>
                                        <?php
                        }
                        ?>
                                    </table>
                                </div>
                                
                                <div class="tab-pane fade" id="tax">
                                    <h4>Income tax Returns</h4>
                                    
                                    <a href="fileitreturns.php?ID=<?php echo $row['ID'];?>" class="btn btn-warning pull-right">File Return</a>
                                    
                                    <br>
                                    <label>Select Financial Year:&nbsp;</label>                                     
                                    <select id="year" name="year">
                   <?php
                    while ($row1 =  mysqli_fetch_assoc($result1))
                        {
                ?>
                                        <option value="<?php echo $row['ID']?>"><?php echo $row1['year'];?></option>
                                        <?php
                        }
                                        ?>
                                    </select>
                                    <input type="button" value="Load Details" id="load" name="load" class="btn btn-info" onClick="load()">     
                                    <div id="edit" name="edit" style="display: none">
                                    <input type="button" value="Edit" id="edit" name="edit" class="btn btn-success" onClick="edit()">
                                    </div>
                                    <div id="responsecontainer">

</div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
</div>
</div>  
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script type="text/javascript">
 $(function(){
    $('#load').on('click', function(){
       $("#edit").show();
    });
});

function sure()
{
        confirm("Are you sure you want to delete this record?");
}
    function load()
 {
    
      var x = $("#year").val();
      var y = $("#year option:selected").text();
      
      $.ajax({
      type:"GET",
      url: "year.php?ID="+ x +"&financial_year="+y,
      success: function(response){                    
            $("#responsecontainer").html(response); 
      
    }

 });
 }
 
 function edit()
 {
    
      var x = $("#year").val();
      var y = $("#year option:selected").text();
      window.location = "edititreturns.php?ID="+ x +"&financial_year="+y;
 }
 </script>

<?php 
                        
                        }
include 'footer.php';

?>
            