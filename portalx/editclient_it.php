<?php
include 'footer.php';
include 'header.php';
include '../config.php';
$idnum = $_REQUEST["ID"];
$query = "SELECT * from ca";
$result=$conn->query($query);
$query1= "SELECT * FROM clients WHERE ID=$idnum";
$result1=$conn->query($query1);
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                        while ($row1=  mysqli_fetch_assoc($result1))
                                        {
                                            $ID=$row1["ID"];
                                            ?>
                                    <form role="form" action="updateclient_it.php?ID=<?php echo $row1["ID"];?>" enctype="multipart/form-data" method="POST">
                                        
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Client Name</label>
                                            <input type="text" required class="form-control" id='cl_name' name="cl_name" value="<?php echo $row1['cl_name'];?>"> 
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Client Mobile Number</label>
                                            <input type="text" required class="form-control" id='cl_number' name="cl_number" value="<?php echo $row1['cl_number'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                        <div class="form-group">
                                            <label>Client Status:</label>
                                            <input type="text" required id="cl_status" class="form-control" name="cl_status" value="<?php echo $row1['cl_status'];?>">
                                        </div>
                                          <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Birth</label>
                        <input class="form-control" id="registration-date" type="date" name="cl_dob" value="<?php echo $row1['cl_dob'];?>">
            		
            	</div>
            </div>   
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Client email</label>
                                            <input type="text" required class="form-control" id='cl_email' name="cl_email" value="<?php echo $row1['cl_email'];?>">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Client Office Number</label>
                                            <input type="text" required class="form-control" id='cl_off_number' name="cl_off_number" value="<?php echo $row1['cl_off_number'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                        
<!--                                            <div class="form-group">
                                            <label>Owner CA</label>
                                            <select class="form-control" name="owner_ca" id="owner_ca">
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option selected="selected" value="<?php echo $row1['owner_ca']?>"><?php echo $row['ca_name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>-->
                                        <div class="form-group">
                                            <label>Passport Number</label>
                                            <input type="text" id="cl_passport" name="cl_passport" value="<?php echo $row1['cl_passport'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Passport Scanned Copy</label>
                                        <input type="file" class="form-control" name="fileToUpload1">
                                        <input type="hidden" class="form-control" name="fileToUploadnew1" value="<?php echo $row1['cl_passport_image'];?>">
                                        </div>
                                      
                                        <br>
                                         <button type="submit" class="btn btn-success">Update</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                       
                                </div>
                                 <div class="col-lg-6">
                                    
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Aadhar Card ID</label>
                                            <input type="text" id="cl_passport" name="cl_adhar" value="<?php echo $row1['cl_adhar'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Aadhar Card Scanned Copy</label>
                                            
                                        <input type="file" class="form-control" name="fileToUpload2"        >
                                            <input type="hidden" class="form-control" name="fileToUploadnew2" value="<?php echo $row1['cl_adhar_image'];?>">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>PAN Number</label>
                                            <input type="text" id="cl_pan" name="cl_pan" value="<?php echo $row1['cl_pan'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>PAN Card Scanned Copy</label>
                                            
                                        <input type="file" class="form-control" name="fileToUpload3">
                                            <input type="hidden" class="form-control" name="fileToUploadnew3" value="<?php echo $row1['cl_pan_image'];?>">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Physical File Location</label>
                                            <input type="text" id="file_location" name="file_location" value="<?php echo $row1['file_location'];?>">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>E-File Location</label>
                                            <input type="text" id="e_file_location" name="e_file_location" value="<?php echo $row1['e_file_location'];?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Digital Sign Information</label>
                                            <input type="text" id="digital_sign"  name="digital_sign" value="<?php echo $row1['digital_sign'];?>">
                                        </div>
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Accountant Name</label>
                                            <input type="text" required class="form-control" id='ac_name' name="ac_name" value="<?php echo $row1['ac_name'];?>">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Accountant Number</label>
                                            <input type="text" required class="form-control" id='ac_number' name="ac_number" value="<?php echo $row1['ac_number'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                        <div class="form-group">
                                            <label>Accountant Email ID </label>
                                            <input type="text" required class="form-control" id='ac_email' name="ac_email" value="<?php echo $row1['ac_email'];?>">
                                        </div>
                                            <?php
                                        }
                                            ?>
                                    </form>
                                    
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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



