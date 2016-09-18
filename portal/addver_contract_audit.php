<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$uname = $_SESSION['username'];
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<style>
    tr,td
    {
        padding: 10px;
    }
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Verification of contracts/agreements of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            <form role="form" action="submitver_contract_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
                <br>
                <label>Sr No</label>
                <input type="text" name="srno" id="srno" class="form-control">
                <br>
                <label>Name of party</label>
                <input type="text" name="name_party" id="name_party" class="form-control">
                <br>
                <label>Nature of contract</label>
                <input type="text" name="nature_contract" id="nature_contract" class="form-control">
                <br>
                <label>Terms related to Account & Audit</label>
                <input type="text" name="terms" id="terms" class="form-control">
                <br>
                <label>Verification</label>
            <table>
                <tr>
                    <td>
            <select id='select1' name='select1' class="form-control">
                <option selected disabled>Please select an option</option>
                <option id='Yes'>Yes - Verified by <?php echo $uname;?></option>
                <option id='No'>No</option>
            </select>
            </td>
            <td>
                <div id='no-remarks-1-div' style="display: none">
                    <label>Remarks for 'No'</label>
                    <textarea class="form-control" id="no_remarks_1" name="no_remarks_1"></textarea>
                </div>
            </td>
                </tr>
                
            
            </table>
            <br>
            <label>Compliance</label>
            <table>
                <tr>
                    <td>
            <select id='select2' name='select2' class="form-control">
                <option selected disabled>Please select an option</option>
                <option id='Yes'>Yes - by <?php echo $uname;?></option>
                <option id='No'>No</option>
            </select>
                    </td>
                    <td>
                        <div id='no-remarks-2-div' style="display: none">
                    <label>Remarks for 'No'</label>
                    <textarea class="form-control" id="no_remarks_2" name="no_remarks_2"></textarea>
                </div>
                    </td>
            </tr>
            </table>
            <br>
            
            <label>Remarks</label>
            <input type="text" name="remarks" id="remarks" class="form-control">       
            <br>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            <input type="reset" name="reset" id="reset" class="btn btn-warning"> 
            </form>
            
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>
    
    $("#select1").change(function(){
        $(this).find("option:selected").each(function(){
            
            
            if($(this).attr("id")=="No"){
                $("#no-remarks-1-div").show();
            }
            else{
                $("#no-remarks-1-div").hide();
                $("#no_remarks_1").val('');
            }
        });
    }).change();
  
    $("#select2").change(function(){
        $(this).find("option:selected").each(function(){
            
            
            if($(this).attr("id")=="No"){
                $("#no-remarks-2-div").show();
            }
            else{
                $("#no-remarks-2-div").hide();
                $("#no_remarks_2").val('');
            }
        });
    }).change();
    </script>
