<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM final_report_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit details of final audit report of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            
            <form role="form" action="updatefinal_report_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
                
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
             ?>
                
                <label>Final Report</label><br>
                <input type="file" id="reportnew" name="reportnew" class="form-control"><br>
                <input type="hidden" id="report" name="report" class="form-control" value="<?php echo $row1['report'];?>">
                <?php 
                if(!empty($row1['report']))
                {
                ?>
                <a href="<?php echo $row1['report'];?>" >View last uploaded report</a>
                <br>
                <?php
                }
                ?>
                <br>
            <label>Bill details</label><br>
            <textarea id="bill_details" name="bill_details" class="form-control"><?php echo $row1['bill_details'];?></textarea><br>
            
            <input type="submit" name="submit" value="Update" class="btn btn-info">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
            
            <?php
            }
            ?>
            
            
            </form>
            <?php
            }
            ?>
        </div>
    </div>
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
