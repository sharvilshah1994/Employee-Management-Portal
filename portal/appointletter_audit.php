<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM appointletter_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="content-wrapper">
    <section class="content-header">
                    <h1 class="page-header">Appointment Letter for <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li><a href="audit.php">Audit</a></li>
                                   <li><a href="audit_type.php?type=<?php echo $row['type_entity'];?>"><?php echo $row['type_entity'];?> Audit</a></li>
                                   <li><a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>"><?php echo $row['cl_name'];?></a></li>
                                   <li class="active">Appointment Letter</li>
          </ol>
    </section>
    <section class="content">
    <div class="row">
        
        <div class="col-lg-6">
            
            <a href="viewaudit.php?id=<?php echo $parent_id;?>&type=<?php echo $row['type_entity'] ;?>">Go Back to checklist</a>
            <form role="form" action="submitappointletter_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
            <a href="editappointletter_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
            ?>
                <label>Received Date-</label>
                <?php echo $row1['rcv_date'];?>
                <br>
            
                <label>Appointment Letter-</label>
                <a href="<?php echo $row1['letter']?>">View Letter</a>&nbsp;(Copy to be kept in file)
                <br>
                  
            <label>Remarks-</label>
            <?php echo $row1['remarks'];?><br>            
            <label>Verification by-</label>
            <?php echo $row1['verification'];?><br>
            
                 <?php
                
            if(!empty($row1['edited_by']))
            {
            ?>
            <br>
            <br>
            <i style="font-size: 20px">Last updated by - <?php echo $row1['edited_by'];?> at <?php echo $row1['time_edit'];?></i>
            <?php
            }
            
            
            }
            }
            else
            {
            ?>
            
            <div class="form-group registration-date">
            <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Received Date</label>
                        <input class="form-control" id="rcv_date" type="date" name="rcv_date">
            		
            </div>
            </div>   
            <br>
            <label>Appointment Letter</label>
            <input type="file" id="letter" name="letter" class="form-control">
            <br>
            <label>Remarks</label>
            <input type="text" id="remarks" name="remarks" class="form-control">
            <br>
            <label>Verification by</label>
            <input type="text" id="verification" name="verification" class="form-control">
            <br>
            
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            <input type="reset" name="reset" id="reset" class="btn btn-warning"> 
            </form>
            <?php
            }
            ?>
        </div>
    </div>
    </section>
</div>
<?php
}
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
