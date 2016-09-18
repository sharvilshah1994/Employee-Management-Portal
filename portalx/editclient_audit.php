<?php
include 'footer.php';
include 'header.php';
include 'config.php';
$idnum = $_REQUEST["id"];
$type = $_REQUEST['type'];
$query = "SELECT * from ca";
$result=$conn->query($query);
$query1= "SELECT * FROM clients_audit WHERE ID=$idnum";
$result1=$conn->query($query1);
$query2 = "SELECT * from ca";
$result2=$conn->query($query2);
$query3 = "SELECT * FROM financial_year";
$result3 = $conn->query($query3);
?>
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

</script>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Client Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit details of the Client
                        </div>
                        <div class="panel-body">
                            <form role="form" action="updateclient_audit.php?ID=<?php echo $idnum;?>&type=<?php echo $type;?>" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                 
                                <div class="col-lg-6">
                                    <?php
                                        while ($row1=  mysqli_fetch_assoc($result1))
                                        {
                                            $ID=$row1["ID"];
                                            ?>
                                   
                                        
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Client/Entity Name</label>
                                            <input type="text" required class="form-control" id='cl_name' name="cl_name" value="<?php echo $row1['cl_name'];?>"> 
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Client/Entity Mobile Number</label>
                                            <input type="text" required class="form-control" id='cl_number' name="cl_number" value="<?php echo $row1['cl_number'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                        <div class="form-group">
                                            <label>Client email</label>
                                            <input type="text" required id="cl_email" class="form-control" name="cl_email" value="<?php echo $row1['cl_email'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>CIN Number</label>
                                            <input type="text" required id="cin_number" class="form-control" name="cin_number" value="<?php echo $row1['cin_number'];?>">
                                        </div>
                                        <label>Name of Auditor</label>
                                        <select id="owner_ca" name="owner_ca" class="form-control">
                                            <option <?php if(empty($row1['owner_ca'])) { echo "selected"; } ?> disabled>Please select</option>
                                            <?php 
                                            while($row2 = mysqli_fetch_assoc($result2))
                                            {
                                            ?>
                                            <option <?php if($row1['owner_ca'] == $row2['ca_name']) { echo "selected"; } ?>><?php echo $row2['ca_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>  
                                        <br>
                                        <label>Nature of Audit</label>
                                        <select id="nature_audit" name="nature_audit" class="form-control">
                                            <option <?php if(empty($row1['nature_audit'])) { echo "selected"; } ?> disabled>Please select</option>
                                            
                                            <option <?php if($row1['nature_audit'] == 'Concurrent/Internal Audit') { echo "selected"; } ?>>Concurrent/Internal Audit</option>
                                            <option <?php if($row1['nature_audit'] == 'Statutory Audit') { echo "selected"; } ?>>Statutory Audit</option>
                                            <option <?php if($row1['nature_audit'] == 'Tax Audit') { echo "selected"; } ?>>Tax Audit</option>
                                        </select>
                                        <br>
                                        <label>Select financial year</label>
                                        <select id="financial_year" name="financial_year" class="form-control">
                                            <option <?php if(empty($row1['financial_year'])) { echo "selected"; } ?> disabled>Please select</option>
                                            <?php 
                                            while($row3 = mysqli_fetch_assoc($result3))
                                            {
                                            ?>
                                            <option <?php if($row1['financial_year'] == $row3['year']) { echo "selected"; } ?>><?php echo $row3['year'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <br>
                                        <label>Team</label>&nbsp;(Please write name of all team members)
                                        <input type="text" id="team" name="team" class="form-control" value="<?php echo $row1['team'];?>">
                                       
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Due Date</label>
                        <input class="form-control" id="due_date" type="date" name="due_date" value="<?php echo $row1['due_date'];?>">
            		
            	</div>
            </div>      
                                    
                                        <div class="form-group">
                                            <label>Physical File Location</label>
                                            <input type="text" id="physical_location" name="physical_location" class="form-control" value="<?php echo $row1['physical_location'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>E-File Location</label>
                                            <input type="text" id="e_file_location" name="e_file_location" class="form-control" value="<?php echo $row1['e_file_location'];?>">
                                        
                                        </div>
                                      
                                        <table>
                                            <tr>
                                                <td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Digital Sign Information</label>
                                            <input type="text" id="digital_sign"  name="digital_sign" class="form-control" value="<?php echo $row1['digital_sign'];?>">
                                        </div>
                                                </td>
                                                <td>
                                        <div class="form-group" style="padding-right: 80px">
                                            <label>Digital Sign Location</label>
                                            <input type="text" id="digital_location"  name="digital_location" class="form-control" value="<?php echo $row1['digital_location'];?>">
                                        </div>
                                                </td>
                                                <td >
                                        <div class="form-group">
                                            <label>Digital Sign Validity</label>
                                            <input type="text" id="digital_validity"  name="digital_validity" class="form-control" value="<?php echo $row1['digital_validity'];?>">
                                        </div>
                                                </td>
                                        </table>
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Contact Person Name</label>
                                            <input type="text" required class="form-control" id='ac_name' name="ac_name" value="<?php echo $row1['ac_name'];?>">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Contact Person Number</label>
                                            <input type="text" required class="form-control" id='ac_number' name="ac_number" value="<?php echo $row1['ac_number'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                        <div class="form-group">
                                            <label>Contact Person Email ID </label>
                                            <input type="text" required class="form-control" id='ac_email' name="ac_email" value="<?php echo $row1['ac_email'];?>">
                                        </div>
                                            <?php
                                        }
                                            ?>
                                    
                                    
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                                <br>
                                <input type="submit" value="Update" class="btn btn-info">
                                <input type="reset" value="Reset" class="btn btn-warning">
</form>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
                                            
                                       
                                    </form>
                                </div>



