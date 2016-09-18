<?php 
session_start();
include 'config.php';
include 'header.php';
$uname = $_SESSION['username'];
$parent_id = $_REQUEST['parent_id'];
$id = $_REQUEST['id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM constdoc_audit INNER JOIN clients_audit ON clients_audit.ID = constdoc_audit.parent_id WHERE constdoc_audit.parent_id='$parent_id' AND constdoc_audit.ID='$id'";

$result1 = $conn -> query($query1);
?>
<?php 
while($row1 = mysqli_fetch_assoc($result1))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit <i><?php echo $row1['particulars'];?></i> of <span style="color: crimson"><?php echo $row1['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <form role="form" action="updateconstdoc_audit.php?id=<?php echo $id?>&parent_id=<?php echo $parent_id;?>" enctype="multipart/form-data" method="POST">
    <?php
    if($row1['particulars'] != 'Memorandum of Association')
    {
    ?>
    
    <div class="row">
        <div class="col-lg-6">
            <label>Requirements</label>
            <textarea class="form-control" id="requirement" name="requirement"><?php echo $row1['requirement'];?></textarea>
            <br>
            <label>Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks"><?php echo $row1['remarks'];?></textarea>
            <br>
            <?php 
            if(empty($row1['document']))
            {
            ?>
            <label>Any Documents to Upload?</label>
            <input type="checkbox" id="checkbox-document" name="checkbox-document" >
            <div id="document-div" style="display: none">
                <input type="file" id="documentnew" name="documentnew" class="form-control">
                <input type="hidden" id="document" name="document" class="form-control" value="<?php echo $row1['document'];?>">
            </div>
            <?php
            }
            else
            {
                ?>
            <label>Change existing document</label>
            <input type="checkbox" id="checkbox-document" name="checkbox-document" >
            <div id="document-div" style="display: none">
                <input type="file" id="documentnew" name="documentnew" class="form-control">
                <input type="hidden" id="document" name="document" class="form-control" value="<?php echo $row1['document'];?>">
            </div>
            <br>
            <br>
            <label>View Existing Document - <a href="<?php echo $row1['document'];?>">View</a></label>
            
            <?php
            }
            ?>
        </div>
        <div class="col-lg-6">
            <table>
                <tr>
                    <td>
                        <?php
                        $a = $row1['verification'];
                        $b = substr($a,0,2);
                        $c = $row1['compliance'];
                        $d = substr($c,0,2);
                        ?>
            <label>Verification</label>
            <select id="select1" name="select1" class="form-control" >
                <option <?php if(empty($row1['verification'])) {
                    echo "selected";
                } ?> disabled>Please select an option</option>
                <option <?php if($b == "Yes")
                {
                    echo "selected";
                }
                ?> id="Yes">Yes - Verified by <?php echo $uname;?></option>
                <option <?php if(!empty($row1['no_remarks_1']))
                {
                    echo "selected";
                }
                ?> id="No">No</option>
            </select>
                    </td>
                    <td style="padding: 20px">
                        <div id="no-remarks-1-div" style="display: none">
                            <label>Remarks for 'No'</label>
                            <textarea class="form-control" id="no_remarks_1" name="no_remarks_1"><?php echo $row1['no_remarks_1'];?></textarea>
                        </div>
                    </td>
            </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
            <label>Compliance</label>
            <select id="select2" name="select2" class="form-control" >
                <option <?php if(empty($row1['compliance']))
                {
                    echo "selected";
                }
                ?> disabled>Please select an option</option>
                <option <?php if($d == "Yes")
                {
                    echo "selected";
                }
                ?> id="Yes">Yes - by <?php echo $uname; ?></option>
                <option <?php if(!empty($row1['no_remarks_2']))
                {
                    echo "selected";
                }
                ?> id="No">No</option>
            </select>
                    </td>
                    <td style="padding: 20px">
                        <div id="no-remarks-2-div" style="display: none">
                            <label>Remarks for 'No'</label>
                            <textarea class="form-control" id="no_remarks_2" name="no_remarks_2"><?php echo $row1['no_remarks_2'];?></textarea>
                        </div>
                    </td>
            </tr>
            </table>
        </div>
    </div>
        <br>
        <br>
        <br>
        <input type="submit" name="submit" id='submit' class="btn btn-info">
        <input type='reset' name="reset" id='reset' class="btn btn-warning">
        
    
    <?php 
    }
    
    else if($row1['particulars'] == 'Memorandum of Association')
    {
    ?>
    
    <div class="row">
        <div class="col-lg-6">
            
            <label>Object Clause Remarks</label>
            <textarea class="form-control" id="obj_clause_remarks" name="obj_clause_remarks"><?php echo $row1['obj_clause_remarks'];?></textarea>
            <br>
            <label>Authorized Share Capital Remarks</label>
            <textarea class="form-control" id="auth_share_remarks" name="auth_share_remarks"><?php echo $row1['auth_share_remarks'];?></textarea>
            <br>
            <label>Any Documents to Upload?</label>
            <input type="checkbox" id="checkbox-document" name="checkbox-document" >
            <div id="document-div" style="display: none">
                <input type="file" id="documentnew" name="documentnew" class="form-control">
                <input type="hidden" id="document" name="document" class="form-control" value="<?php echo $row1['document'];?>">
            </div>
        </div>
        <div class="col-lg-6">
            <table>
                <tr>
                    <td>
            <label>Verification</label>
            <select id="select1" name="select1" class="form-control" >
                <option <?php if(empty($row1['verification']))
                {
                    echo "selected";
                }
                ?>  disabled>Please select an option</option>
                <option <?php if($b == "Yes")
                {
                    echo "selected";
                }
                ?> id="Yes">Yes - Verified by <?php echo $uname;?></option>
                <option <?php if(!empty($row1['no_remarks_1']))
                {
                    echo "selected";
                }
                ?> id="No">No</option>
            </select>
                    </td>
                    <td style="padding: 20px">
                        <div id="no-remarks-1-div" style="display: none">
                            <label>Remarks for 'No'</label>
                            <textarea class="form-control" id="no_remarks_1" name="no_remarks_1"><?php echo $row1['no_remarks_1'];?></textarea>
                        </div>
                    </td>
            </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
            <label>Compliance</label>
            <select id="select2" name="select2" class="form-control" >
                <option <?php if(empty($row1['compliance']))
                {
                    echo "selected";
                }
                ?> disabled>Please select an option</option>
                <option <?php if($d == "Yes")
                {
                    echo "selected";
                }
                ?> id="Yes">Yes - by <?php echo $uname;?></option>
                <option <?php if(!empty($row1['no_remarks_2']))
                {
                    echo "selected";
                }
                ?> id="No">No</option>
            </select>
                    </td>
                    <td style="padding: 20px">
                        <div id="no-remarks-2-div" style="display: none">
                            <label>Remarks for 'No'</label>
                            <textarea class="form-control" id="no_remarks_2" name="no_remarks_2"><?php echo $row1['no_remarks_2'];?></textarea>
                        </div>
                    </td>
            </tr>
            </table>
        </div>
    </div>
        <br>
        <br>
        <br>
        <input type="submit" name="submit" id='submit' class="btn btn-info">
        <input type='reset' name="reset" id='reset' class="btn btn-warning">
        
    </form>
    <?php
    }
    ?>
    
</div>
<?php
}
include 'footer.php';
?>
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>-->
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>
    
function addNow() {
  nowDate = moment().tz("Europe/London").format('YYYY-MM-DD');
  nowTime = moment().tz("Europe/London").format('HH:mm');
  document.getElementById('registration-date').value = nowDate;
  document.getElementById('registration-time').value = nowTime;
  set = setTimeout(function () { addNow(); }, 1000);
}

function stopNow() {
  clearTimeout(set);
}

$(document).ready(function(){ 
            
            
     addNow();
     stopNow();
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });
    
    
    // process the form
    $('form').submit(function(event) {
        debugger;
var checked = '';
$("input[name='service[]']:checked").each(function ()
{
    checked = checked + $(this).val() + ','; 
});
checked = checked.slice(0, -1); 
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
              "venueid":"55",
            'name'              : $('input[name=name]').val(),
            'emailid'             : $('input[name=emailid]').val(),
            'contact'    : $('input[name=contact]').val(),
	"gender":$('.active input[name=gender]').val(),
        //"appointdate":"2015/11/23",
	//"appointtime":"13:00",
	"appointdate":$('input[name=appointdate]').val(),
	"appointtime":$('input[name=appointtime]').val(),
	"branch":$('select[name=branch]').val(),
	"allservices":checked,
	"additional_services":$('textarea[name=additional_services]').val(),

        };
console.log(formData);
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'http://laravel.bonsoul.com/create_walkin_appointmentfb', // the url where we want to POST
            data        : JSON.stringify(formData), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});


$('#checkbox-document').change(function(){
        if($('#checkbox-document').is(":checked"))
        {
            $('#document-div').show();
        }
            else
            {
            $('#document-div').hide();
    }
    });
    
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