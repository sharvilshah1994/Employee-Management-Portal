<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$uname = $_SESSION['username'];
$query1 = "SELECT * FROM cash_book_audit WHERE parent_id='$parent_id' AND ID='$id'";
$result1 = $conn->query($query1);
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
                    <h1 class="page-header">Edit details of Cash book verification for <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <form role="form" action="updatecash_book_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
        <div class="col-lg-6">
            
            <?php 
            while($row1=  mysqli_fetch_assoc($result1))
            {
            ?>
                
                <label>Sr No</label>
                <input type="text" name="srno" id="srno" class="form-control" value="<?php echo $row1['srno'];?>">
                <br>
                <div class="form-group registration-date">
            <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date</label>
                        <input class="form-control" id="date_checking" type="date" name="date_checking" value="<?php echo $row1['date_checking'];?>">
            		
            </div>
            </div>
                <label>Voucher Number</label>
                <input type="text" id="voucher_no" name="voucher_no" class="form-control" value="<?php echo $row1['voucher_no'];?>">
                <br>
                <label>Account Head</label>
                <input type="text" id="account_head" name="account_head" class="form-control" value="<?php echo $row1['account_head'];?>">
                <br>
                </div>
        <div class="col-lg-6">
                <label>Amount (Dr/Cr)</label>
                <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $row1['amount'];?>">
                <br>
                <label>Particulars</label>
                <input type="text" name="particulars" id="particulars" class="form-control" value="<?php echo $row1['particulars'];?>">
                <br>
                <label>Remarks</label>
                <input type="text" name="remarks" id="remarks" class="form-control" value="<?php echo $row1['remarks'];?>">        
                <br>
                <label>Status</label>
                <select id="status" name="status" class="form-control">
                    <option <?php if(empty($row1['status'])) { echo "selected"; } ?> disabled>Please select an option</option>
                    <option <?php if($row1['status'] == 'Completed') { echo "selected"; } ?>>Completed</option>
                    <option <?php if($row1['status'] == 'Not Completed') { echo "selected"; } ?>>Not Completed</option>
                </select>
                
            <br>
            
            <?php 
            }
            ?>
        </div>
        <input type="submit" name="submit" id="submit" value="Update" class="btn btn-info">
            <input type="reset" name="reset" id="reset" class="btn btn-warning"> 
            </form>
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
