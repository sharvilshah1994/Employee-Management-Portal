<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$idnum = $_REQUEST['ID'];
$query="SELECT * FROM clients WHERE ID=$idnum";
$result=$conn->query($query);
$query1="SELECT * FROM itreturns WHERE ID=$idnum";
$result1=$conn->query($query1);
?>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Income Tax returns</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">General Information of Client (Collapsable Window)</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                        <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                
                                <table width="100%" style="vertical-align: top"><tr style="vertical-align: top; "><td width="40%" style="padding: 10px">
                                            <label>Client Details</label><br><br>
                                            <label>Name:</label>
                                <?php echo $row['cl_name'];?><br>
                                <label>Date of Birth:</label>
                                <?php echo $row['cl_dob'];?><br>
                                <label>Contact Number:</label>
                                <?php echo $row['cl_number'];?><br>
                                <label>Email:</label>
                                <?php echo $row['cl_email'];?><br>
                                <label>Office Number:</label>
                                <?php echo $row['cl_off_number'];?>
                                        </td>
                                         <td style="padding: 10px; ">
                                <label>Accountant Details</label><br><br>
                                            <label>Accountant Name:</label>
                                <?php echo $row['ac_name'];?><br>
                                <label>Accountant Contact Number:</label>
                                <?php echo $row['ac_number'];?><br>
                                <label>Accountant Email:</label>
                                <?php echo $row['ac_email'];?><br></td></tr></table>
                                
                                
                                
                                        
                                        </div>
                                    </div>
                                </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <table>
                                <tr>
                                    <td style="width: 88%">
                                        Checklist
                                    </td>
                                    
                                </tr>
                                
                            </table>
     
                        </div>

                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <label>Due Date:</label>
                                <table id="mytable" name="mytable"><tr>
                                        <?php 
                                        while ($row1=  mysqli_fetch_assoc($result1))
                                        {
                                        
                                      if(empty($row1))
                                        {
                                        echo '<td><span class= "xedit" id="'.$row["ID"].'">No due date found. Add new</span></td>';
                                        }
                                        
                                        if(empty($row1['due_date']))
                                        {
//                                        echo '<td><span class= "xedit" id="new" class="btn btn-success">Add new</span></td>';
                                        }
                                        else
                                        {
                                      echo '<td><span class= "xedit" id="'.$row["ID"].'">'.$row1["due_date"].'</span></td>';
    }
                                        
    ?></tr></table>                            </div>      
                                   
                                <br>
                                <!-- /.statement -->
                                <label>Profit and Loss Statement:&nbsp;</label>
                                <?php 
                                if(!empty($row1['pl_statement']))
                                {
                                
                                    ?>
                                <span id="image">Yes &nbsp;<img src="<?php $row1['pl_statement'];?>" width="50px" height="50px"></span><?php }  
                                else 
                                    { 
                                    ?> 
                                <span id="imageno">No</span> <?php } ?>
                                <span id='changevalue'></span>
                                &nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change">Change</a><br>
                                <select id='purpose' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
                                </select><br>
                                
<div style='display:none;' id='pl_statement'>Please upload Profit and Loss statement&nbsp;
&nbsp;
<input type='file' name='pl_statement' id="pl_statement" />

<br/></div>
                                <!-- /.statement -->
 <label>Balance Sheet:&nbsp;</label>
<?php 
    if(!empty($row1['balance_sheet']))
        {
            ?>
<span id="image1">Yes &nbsp;<img src="<?php $row1['balance_sheet'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?> 
<span id="imageno1">No</span> <?php } ?>
<span id='changevalue1'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change1">Change</a><br>
<select id='purpose1' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>                                
<div style='display:none;' id='balance_sheet'>Please upload Balance Sheet&nbsp;
&nbsp;
<input type='file' name='balance_sheet' id="balance_sheet"/>
    
</div>



 <!-- /.statement -->
<label>Capital Account Statement:&nbsp;</label>
<?php 
    if(!empty($row1['capital_account']))
        {
            ?>
<span id="image2">Yes &nbsp;<img src="<?php $row1['capital_account'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?> 
<span id="imageno2">No</span> <?php } ?>
<span id='changevalue2'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change2">Change</a><br>
<select id='purpose2' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>                                
<div style='display:none;' id='capital_account'>Please upload Capital Account Statement&nbsp;
&nbsp;
<input type='file' name='capital_account' id="capital_account"/>
    
</div>
                        
<!-- Bank Statement 1-->

<label>Bank Statement-1:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement']))
        {
            ?>
<span id="image3">Yes &nbsp;<img src="<?php $row1['bank_statement'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno3">No</span> <?php } ?>
<span id='changevalue3'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change3">Change</a>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change3-1">Show other bank statements</a><br>
<select id='purpose3' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement">Please upload Bank Statement-1:&nbsp;
&nbsp;
   <input type="file" id="bank_statement" size="20" name="bank_statement" />
</div>

<!-- Bank Statement 2-->
<div style="display:none" id="div1">
<label>Bank Statement-2:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement1']))
        {
            ?>
<span id="image4">Yes &nbsp;<img src="<?php $row1['bank_statement1'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno4">No</span> <?php } ?>
<span id='changevalue4'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change4">Change</a><br>
<select id='purpose4' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement1">Please upload Bank Statement-2:&nbsp;
&nbsp;
   <input type="file" id="bank_statement1" name="bank_statement1"/> 
</div>
</div>

<!-- Bank Statement 3-->
<div style="display:none" id="div2">
<label>Bank Statement-3:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement2']))
        {
            ?>
<span id="image5">Yes &nbsp;<img src="<?php $row1['bank_statement2'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno5">No</span> <?php } ?>
<span id='changevalue5'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change5">Change</a><br>
<select id='purpose5' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement2">Please upload Bank Statement-1:&nbsp;
&nbsp;
   <input type="file" id="bank_statement2" name="bank_statement2"/> 
</div>
</div>

<!-- Bank Statement 4-->

<div style="display:none" id="div3">
<label>Bank Statement-4:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement3']))
        {
            ?>
<span id="image6">Yes &nbsp;<img src="<?php $row1['bank_statement3'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno6">No</span> <?php } ?>
<span id='changevalue6'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change6">Change</a><br>
<select id='purpose4' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement3">Please upload Bank Statement-1:&nbsp;
&nbsp;
   <input type="file" id="bank_statement3" name="bank_statement3"/> 
</div>
</div>


<!-- Bank Statement 5-->
<div style="display:none" id="div4">
<label>Bank Statement-5:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement4']))
        {
            ?>
<span id="image7">Yes &nbsp;<img src="<?php $row1['bank_statement4'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno7">No</span> <?php } ?>
<span id='changevalue7'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change7">Change</a><br>
<select id='purpose7' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement4">Please upload Bank Statement-1:&nbsp;
&nbsp;
   <input type="file" id="bank_statement4" name="bank_statement4"/> 
</div>
</div>

<!-- Bank Statement 6-->

<div style="display:none" id="div5">
<label>Bank Statement-6:&nbsp;</label>
<?php 
    if(!empty($row1['bank_statement5']))
        {
            ?>
<span id="image8">Yes &nbsp;<img src="<?php $row1['bank_statement5'];?>" width="50px" height="50px"></span>
    <?php 
        }  
            else 
                { 
                    ?>
<span id="imageno8">No</span> <?php } ?>
<span id='changevalue8'></span>
&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-success btn-xs" id="change8">Change</a><br>
<select id='purpose8' hidden>
<option value="0">Yes</option>
<option selected="selected" value="1">No</option>
<option value="2">Not Applicable</option> 
</select><br>
<div style='display:none;' id="bank_statement5">Please upload Bank Statement-1:&nbsp;
&nbsp;
   <input type="file" id="bank_statement5" name="bank_statement5"/> 
</div>
</div>




</div>
                        </div>
                                 
                        <?php 
                                        }
                                        } ?>

                                            
                                            <?php
                                        
include("footer.php");
?>
             
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script>
                        <script>
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $("#mytable").find("td > span").attr("id");
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "process.php?ID="+x+"&data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error Processing your Request!');}
				},
				error: function(e){
					alert('Error Processing your Request!!');
				}
			});
		});
});




    $(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '0')
      {
        $("#pl_statement").show();
        $("#changevalue").html('Yes');
        $("#imageno").hide();
      }
      else
      {
        $("#pl_statement").hide();
        $("#changevalue").html('No');
        $("#image").hide();
        $("#imageno").hide();
            }
    });
    });
$(document).ready(function(){
        $('#purpose1').on('change', function() {
      if ( this.value == '0')
      {
        $("#balance_sheet").show();
        $("#changevalue1").html('Yes');
        $("#imageno1").hide();
      }
      else
      {
        $("#balance_sheet").hide();
         $("#changevalue1").html('No');
        $("#image1").hide();
        $("#imageno1").hide();
            }
    });
        
            
    });
$(document).ready(function(){
        $('#purpose2').on('change', function() {
      if ( this.value == '0')
      {
        $("#capital_account").show();
        $("#changevalue2").html('Yes');
        $("#imageno2").hide();
      }
      else
      {
        $("#capital_account").hide();
         $("#changevalue2").html('No');
        $("#image2").hide();
        $("#imageno2").hide();
            }
    });
        
            
    });
    
$(document).ready(function(){
        $('#purpose3').on('change', function() {
      if ( this.value == '0')
      {
        $("#bank_statement").show();
        $("#changevalue3").html('Yes');
        $("#imageno3").hide();
      }
      else
      {
        $("#bank_statement").hide();
         $("#changevalue3").html('No');
        $("#image3").hide();
        $("#imageno3").hide();
            }
    });
        
            
    });

$(document).ready(function(){
        $('#purpose4').on('change', function() {
      if ( this.value == '0')
      {
        $("#bank_statement1").show();
        $("#changevalue4").html('Yes');
        $("#imageno4").hide();
      }
      else
      {
        $("#bank_statement1").hide();
         $("#changevalue4").html('No');
        $("#image4").hide();
        $("#imageno4").hide();
            }
    });
    });


$("#change").click(function(){
                            $("#purpose").show();
                             
});
$("#change1").click(function(){
                            $("#purpose1").show();
                             
});
$("#change2").click(function(){
                            $("#purpose2").show();
                             
});
$("#change3").click(function(){
                            $("#purpose3").show();
                             
});
$("#change3-1").click(function(){
                            $("#div1").show();
                            $("#div2").show();
                            $("#div3").show();
                            $("#div4").show();
                            $("#div5").show();
});
$("#change4").click(function(){
                            $("#purpose4").show();
                             
});
$("#change5").click(function(){
                            $("#purpose5").show();
                             
});
$("#change6").click(function(){
                            $("#purpose6").show();
                             
});
$("#change7").click(function(){
                            $("#purpose7").show();
                             
});
$("#change8").click(function(){
                            $("#purpose8").show();
                             
});


                            </script>
                            
