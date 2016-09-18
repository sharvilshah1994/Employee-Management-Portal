<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$type_tax = $_REQUEST['type'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM stat_comp_audit WHERE parent_id='$parent_id' AND type_tax='$type_tax'";
$result1 = $conn -> query($query1);
$query2 = "SELECT * FROM comm_comp WHERE parent_id='$parent_id' AND type_tax='$type_tax' AND type_comm='order'";
$result2 = $conn->query($query2);
$query3 = "SELECT * FROM comm_comp WHERE parent_id='$parent_id' AND type_tax='$type_tax' AND type_comm='notice'";
$result3 = $conn->query($query3);
$query4 = "SELECT * FROM comm_comp WHERE parent_id='$parent_id' AND type_tax='$type_tax' AND type_comm='reply'";
$result4 = $conn->query($query4);
$query5 = "SELECT * FROM comm_comp WHERE parent_id='$parent_id' AND type_tax='$type_tax' AND type_comm='other'";
$result5 = $conn->query($query5);
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<style>
    table
    {
        width: 100%;
    }
    tr,td,th{
        
        padding: 10px;
        border: 1px solid black;
    }
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statutory Compliance of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-6">
            
            <a href="stat_comp_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id ;?>">Go Back to Statutory Compliance</a>
            <form role="form" action="submitstat_comp_audit.php?id=<?php echo $id;?>&parent_id=<?php echo $parent_id; ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if ($result1->num_rows > 0)
            {
               ?>
            <a href="editstat_comp_audit.php?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a>
            <br>
            <br>
            <?php
            while($row1 = mysqli_fetch_assoc($result1))
            {
                
            ?>
                <label>Name of verifying person-</label>
                <?php echo $row1['v_person'];?>&nbsp;on&nbsp;<?php echo $row1['v_date'];?>
                <br>
                <br>
                <label>Payment of Tax:</label>
                <br>
                <label>Verification with books of account-</label>
                <br>
                <?php echo $row1['v_book_acc'];?>
                <br>
                <label>Discrepancy (if any)- </label>
                <?php echo $row1['disc_book_acc'];?>
                <br>
                <label>Verification of return with books of account-</label>
                <br>
                <?php echo $row1['v_return_acc'];?>
                <br>
                <label>Discrepancy (if any)- </label>
                <?php echo $row1['disc_return_acc'];?>
                
            <?php
            }
            }
            else
            {
            ?>
            
            <label>Name of verifying person</label>
            <input type='text' id='v_person' name="v_person" class="form-control">
            <br>
            
            <div class="form-group registration-date">
            <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of verification</label>
                        <input class="form-control" id="v_date" type="date" name="v_date">
            		
            </div>
            </div>
                <br>
                <label>Payment of Tax:</label>
                <br>
                <label>Verification with books of account-</label>
                <textarea id='v_book_acc' name="v_book_acc" class="form-control"></textarea>                
                <br>
                <label>Discrepancy (if any)- </label>
                <textarea id='disc_book_acc' name="disc_book_acc" class="form-control"></textarea>   
                <br>
                <label>Verification of return with books of account-</label>
                <textarea id='v_return_acc' name="v_return_acc" class="form-control"></textarea>                
                
                <br>
                <label>Discrepancy (if any)- </label>
               <textarea id='disc_return_acc' name="disc_return_acc" class="form-control"></textarea>   
               <br>
               </div>
        <div class="col-lg-6">
            <br>
            
               <label>Verification of communication:</label>
               <br>
               <br>
               <label>Order</label>
               -<a href="addcomm_comp.php?parent_id=<?php echo $parent_id?>&type_tax=<?php echo $type_tax?>&type_comm=order"> Add record for order</a>
               <br>
               <table>
                   <tr>
                       <th>
                           Sr No
                       </th>
                       <th>
                           Date
                       </th>
                       <th>
                           Reference Number
                       </th>
                       <th>
                           Particulars
                       </th>
                       <th>
                           Remarks
                       </th>
                       <th>
                           Actions
                       </th>
                   </tr>
                   <?php while($row2 = mysqli_fetch_assoc($result2))
                   {
                       ?>
                   <tr>
                       <td><?php echo $row2['srno'];?></td>
                       <td><?php echo $row2['date'];?></td>
                       <td><?php echo $row2['ref_no'];?></td>
                       <td><?php echo $row2['particulars'];?></td>
                       <td><?php echo $row2['remarks'];?></td>
                       <td><a href="editcomm_comp.php?id=<?php echo $row2['ID']?>&type_tax=<?php echo $row2['type_tax'];?>&type_comm=<?php echo $row2['type_comm'];?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a></td>
                   </tr>
                   <?php 
                   
                   }
                   ?>
               </table>
               <br>
               <label>Notice</label>
               -<a href="addcomm_comp.php?parent_id=<?php echo $parent_id?>&type_tax=<?php echo $type_tax?>&type_comm=notice"> Add record for notice</a>
               <br>
               <table>
                   <tr>
                       <th>
                           Sr No
                       </th>
                       <th>
                           Date
                       </th>
                       <th>
                           Reference Number
                       </th>
                       <th>
                           Particulars
                       </th>
                       <th>
                           Remarks
                       </th>
                       <th>
                           Actions
                       </th>
                   </tr>
                   <?php while($row3 = mysqli_fetch_assoc($result3))
                   {
                       ?>
                   <tr>
                       <td><?php echo $row3['srno'];?></td>
                       <td><?php echo $row3['date'];?></td>
                       <td><?php echo $row3['ref_no'];?></td>
                       <td><?php echo $row3['particulars'];?></td>
                       <td><?php echo $row3['remarks'];?></td>
                       <td><a href="editcomm_comp.php?id=<?php echo $row3['ID']?>&type_tax=<?php echo $row3['type_tax'];?>&type_comm=<?php echo $row3['type_comm'];?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a></td>
                   </tr>
                   <?php 
                   
                   }
                   ?>
               </table>
               
               <br>
               <label>Reply</label>
               -<a href="addcomm_comp.php?parent_id=<?php echo $parent_id?>&type_tax=<?php echo $type_tax?>&type_comm=reply"> Add record for reply</a>
               <br>
               <table>
                   <tr>
                       <th>
                           Sr No
                       </th>
                       <th>
                           Date
                       </th>
                       <th>
                           Reference Number
                       </th>
                       <th>
                           Particulars
                       </th>
                       <th>
                           Remarks
                       </th>
                       <th>
                           Actions
                       </th>
                   </tr>
                   <?php while($row4 = mysqli_fetch_assoc($result4))
                   {
                       ?>
                   <tr>
                       <td><?php echo $row4['srno'];?></td>
                       <td><?php echo $row4['date'];?></td>
                       <td><?php echo $row4['ref_no'];?></td>
                       <td><?php echo $row4['particulars'];?></td>
                       <td><?php echo $row4['remarks'];?></td>
                       <td><a href="editcomm_comp.php?id=<?php echo $row4['ID']?>&type_tax=<?php echo $row4['type_tax'];?>&type_comm=<?php echo $row4['type_comm'];?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a></td>
                   </tr>
                   <?php 
                   
                   }
                   ?>
               </table>
               <br>
                <label>Other</label>
               -<a href="addcomm_comp.php?parent_id=<?php echo $parent_id?>&type_tax=<?php echo $type_tax?>&type_comm=other"> Add record for other</a>
               <br>
               <table>
                   <tr>
                       <th>
                           Sr No
                       </th>
                       <th>
                           Date
                       </th>
                       <th>
                           Reference Number
                       </th>
                       <th>
                           Particulars
                       </th>
                       <th>
                           Remarks
                       </th>
                       <th>
                           Actions
                       </th>
                   </tr>
                   <?php while($row5 = mysqli_fetch_assoc($result5))
                   {
                       ?>
                   <tr>
                       <td><?php echo $row5['srno'];?></td>
                       <td><?php echo $row5['date'];?></td>
                       <td><?php echo $row5['ref_no'];?></td>
                       <td><?php echo $row5['particulars'];?></td>
                       <td><?php echo $row5['remarks'];?></td>
                       <td><a href="editcomm_comp.php?id=<?php echo $row5['ID']?>&type_tax=<?php echo $row5['type_tax'];?>&type_comm=<?php echo $row5['type_comm'];?>&parent_id=<?php echo $parent_id;?>" class="btn btn-info">Edit</a></td>
                   </tr>
                   <?php 
                   
                   }
                   ?>
               </table>
               
        </div>
    </div>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            <input type="reset" name="reset" id="reset" class="btn btn-warning"> 
            <br>
            
            </form>
            <?php
            }
            ?>
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
