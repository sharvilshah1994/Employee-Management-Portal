<?php
include 'header.php';
include 'config.php';
$type = $_REQUEST['type'];
$query = "SELECT * from ca";
$result=$conn->query($query);
$query1 = "SELECT * FROM financial_year";
$result1 = $conn->query($query1);
?>



<div class="content-wrapper">
    <section class="content-header">
                    <h1 class="page-header">Add Client/Entity for <strong style="color: crimson"><?php echo $type?> Audit</strong></h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li><a href="audit.php">Audit</a></li>
                                   <li><a href="audit_type.php?type=<?php echo $type?>"><?php echo $type;?> Audit</a></li>
                                   <li class="active">Add Client</li>
          </ol>
    </section>
    
    <section class="content">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Give details of the Client/Entity
                        </div>
                        <div class="panel-body">
                            
                                <form role="form" action="submitclient_audit.php?type=<?php echo $type?>" enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                    
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Client/Entity Name</label>
                                            <input type="text" required class="form-control" id='cl_name' name="cl_name">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Client/Entity Mobile Number</label>
                                            <input type="text" required class="form-control" id='cl_number' name="cl_number" >
                                            
                                        </div></td>
                                            </tr></table>
                                        
                                        <div class="form-group">
                                            <label>Client email</label>
                                            <input type="text" required class="form-control" id='cl_email' name="cl_email">
                                            
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>CIN Number</label>
                                            <input type="text" required class="form-control" id='cin_number' name="cin_number">
                                            
                                        </div>
                                            
                                            <div class="form-group">
                                            <label>Name of Auditor</label>
                                            <select class="form-control" name="owner_ca" id="owner_ca">
                                                <option disabled selected>Select name of Auditor</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                                
                                                <option><?php echo $row['ca_name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Nature of Audit</label>
                                            <select class="form-control" name="nature_audit" id="nature_audit">
                                                <option disabled selected>Select Nature of Audit</option>
                                                <option>Concurrent/Internal Audit</option>
                                                <option>Statutory Audit</option>
                                                <option>Tax Audit</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Select financial year</label>
                                
                               <select id="year" name="year" class="form-control">
                                   <option disabled selected>Please select year</option>
                   <?php
                    while ($row1 =  mysqli_fetch_assoc($result1))
                        {
                ?>
                                        <option><?php echo $row1['year'];?></option>
                                        <?php
                        }
                                        ?>
                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Team</label>&nbsp;(Please write name of all team members)
                                            <input type="text" class="form-control" id="team" name="team" placeholder="Name1, Name2, etc.">
                                        </div>
                                        
                                        
                                        <br>
                                        <br>
                                </div>
                                
                                
                                 <div class="col-lg-6">
                                      <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Due Date</label>
                        <input class="form-control" id="due_date" type="date" name="due_date">
            		
            	</div>
            </div>      
                                     
                                     <div class="form-group">
                                            <label>Physical File Location</label>
                                            <input type="text" id="file_location" name="file_location" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>E-File Location</label>
                                            <input type="text" id="e_file_location" name="e_file_location" class="form-control">
                                        </div>
                                        <table>
                                            <tr>
                                                <td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Digital Sign Information</label>
                                            <input type="text" id="digital_sign"  name="digital_sign" class="form-control">
                                        </div>
                                                </td>
                                                <td>
                                        <div class="form-group" style="padding-right: 80px">
                                            <label>Digital Sign Location</label>
                                            <input type="text" id="digital_location"  name="digital_location" class="form-control">
                                        </div>
                                                </td>
                                                <td >
                                        <div class="form-group">
                                            <label>Digital Sign Validity</label>
                                            <input type="text" id="digital_validity"  name="digital_validity" class="form-control">
                                        </div>
                                                </td>
                                        </table>
                                        <table>
                                            <tr><td style="padding-right: 80px">
                                        <div class="form-group">
                                            <label>Contact Person Name</label>
                                            <input type="text" required class="form-control" id='ac_name' name="ac_name">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Contact Person Number</label>
                                            <input type="text" required class="form-control" id='ac_number' name="ac_number">
                                            
                                        </div></td>
                                            </tr></table>
                                        <div class="form-group">
                                            <label>Contact Person Email ID </label>
                                            <input type="text" required class="form-control" id='ac_email' name="ac_email">
                                        </div>
                                     
                                            
                                    
                                    
                                </div>
                                    </div>
                            <input type="submit" class="btn btn-success">
                                        <input type="reset" class="btn btn-warning">
                                    
                                </form>
                                
                            
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    </section>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

                                            
                                       


<?php
include 'footer.php';
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