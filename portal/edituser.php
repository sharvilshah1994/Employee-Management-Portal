<?php

include("header.php");
include '../config.php';
$id = $_REQUEST['ID'];
$query = "SELECT * FROM department";
$result = $conn->query($query);
$query2 = "SELECT * FROM department";
$result2 = $conn->query($query2);
$query3 = "SELECT * FROM department";
$result3 = $conn->query($query3);
$query1 = "SELECT * FROM users WHERE id=$id";
$result1 = $conn->query($query1);
$row1=  mysqli_fetch_assoc($result1);

?>
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


     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Edit User</h1>
        </section>
                <!-- /.col-lg-12 -->
            
            <!-- /.row -->
            
                <section class="content">    
               <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit details of the user
                        </div>
                        <div class="panel-body">
                            <form role="form" action="update.php?id=<?php echo $row1['id'];?>" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <table>
                                            <tr><td style="padding-right: 100px">
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" required class="form-control" name="name" id="name" value="<?php echo $row1['name'];?>">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" required class="form-control" name="lname" id="lname" value="<?php echo $row1['lname'];?>">
                                            
                                        </div></td>
                                            </tr></table>
                                          <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Birth</label>
                        <input class="form-control" id="registration-date" type="date" name="bdate" value="<?php echo $row1['dob'];?>">
            		
            	</div>
            </div>                          
                                        
                                         <div class="form-group">
                                            <label>Address</label>
                                            <textarea required class="form-control" name="address" ><?php echo $row1['address'];?></textarea>
                                        </div>
                                            
                                    
                                    <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="department">
                                                <option <?php if(empty($row1['department'])){
                                                    echo 'selected="selected"';
                                                    }?> disabled>Please select an option</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option <?php if($row1['department'] == $row['name']){
                                                    echo 'selected="selected"';
                                                }?> id="department"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }
                                        ?>
                                                </select>
                                        </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                            <label>2nd Department </label>&nbsp;<span style="color: crimson">(If in single department or all, leave this field blank)</span>
                                            <select class="form-control" name="department1">
                                                <option <?php if(empty($row1['department1'])){
                                                    echo 'selected="selected"';
                                                    }?> disabled>Please select 2nd department for user</option>
                                                <?php
                                     while($row = mysqli_fetch_assoc($result2))
                                        {
                                            ?>
                                                
                                                <option <?php if($row1['department1'] == $row['name']){
                                                    echo 'selected="selected"';
                                                }?> id="department1"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }
                                        ?>
                                                </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>3rd Department</label>&nbsp;<span style="color: crimson">(If only in 2 departments or all, leave this field blank)</span>
                                            <select class="form-control" name="department2">
                                                <option <?php if(empty($row1['department2'])){
                                                    echo 'selected="selected"';
                                                    }?> disabled>Please select 3rd department for user</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result3))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option <?php if($row1['department2'] == $row['name']){
                                                    echo 'selected="selected"';
                                                }?> id="department2"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                        
                                        <table><tr><td style="padding-right: 100px">
                                        <div class="form-group">
                                            <label>Email Id</label>
                                            <input type="email" required class="form-control" name="email" value="<?php echo $row1['email'];?>">
                                        </div></td><td>
                                         <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" required class="form-control" name="number" value="<?php echo $row1['phone'];?>">
                                         </div></td></tr></table>
                                        
                                       
                                </div>
                                 <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Employee Photo</label>
                                            <input type="file" class="form-control" name="fileToUpload">
                                            <input type="hidden" class="form-control" name="fileToUploadnew" value="<?php echo $row1['photo'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <img src="<?php echo $row1['photo'];?>" style="height: 100px; width: 100px">
                                        </div>
                                          <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Joining</label>
                        <input class="form-control" id="registration-date" type="date" name="doj" value="<?php echo $row1['doj']; ?>">
            		
            	</div>
            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">User id&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="populateuserid();">Generate</a></label>
                                                <input class="form-control" id="userid" name="userid" type="text" value="<?php echo $row1['username']?>">
                                            </div>
                                                     <div class="form-group">
                                                <label for="disabledSelect">Password&nbsp;&nbsp;&nbsp;<a href="#" onclick="populatepassword();">Generate</a></label>
                                                <input class="form-control" id="password" name="password" type="text" value="<?php echo $row1['password']?>">
                                            </div>
                                           
                                        <table><tr><td style="padding-right: 100px">
                                            <div class="form-group">
                                            <label>DGSM Partner</label>
                                            <select selected="<?php echo $row1['partner'];?>" class="form-control" name="partner">
                                                <option <?php if($row1['partner'] == 'Yes'){
                                                    echo 'selected="selected"';
                                                }?>>Yes</option>
                                                     <option <?php if($row1['partner'] == 'No'){
                                                    echo 'selected="selected"';
                                                }?>>No</option>
                                           
                                                </select>
                                            </div></td>
                                            <td>
                                                <div class="form-group">
                                            <label>Admin of Portal</label>
                                            <select class="form-control" name="admin">
                                                <option <?php if($row1['admin'] == 'Yes'){
                                                    echo 'selected="selected"';
                                                }?>>Yes</option>
                                                     <option <?php if($row1['admin'] == 'No'){
                                                    echo 'selected="selected"';
                                                }?>>No</option>
                                           
                                                </select>
                                            </div>
                                                
                                            </td>
                                            </tr>
                                        </table>
                                                                <div class="form-group registration-date">
                                                                        
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Anniversary</label>
                        <input class="form-control" value="<?php echo $row1['doa']; ?>" id="registration-date" type="date" name="doa">
            		
            	</div>
            </div>
                                            
                                    
                                    
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                                <input type="submit" class="btn btn-success" value="Update">
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

    </div>
                                            
                                       
                                    </form>
                                <?php
                                include("footer.php");
                                ?>
<script>
                                    
                                    function populatepassword() {
                                        var ma = Math.floor((Math.random() * 10) + 1);
                                        var ll = document.getElementById('lname').value;
                                        var lower = ll.toLowerCase();
                                        var x = document.getElementById('name').value;
                                        var z = x.toLowerCase();
                                        var y = z.substr(0,3);
                                        var d = document.getElementById('department').value;
                                        var l = d.toLowerCase();
                                        var e = l.substr(0,4);
                                        var a = y.concat(e,ma);
                                        var b = z.concat(lower,ma);
    document.getElementById('password').value = a;
    }
    function populateuserid()
    {
        var ma = Math.floor((Math.random() * 10) + 1);
                                        var ll = document.getElementById('lname').value;
                                        var lower = ll.toLowerCase();
                                        var x = document.getElementById('name').value;
                                        var z = x.toLowerCase();
                                        var y = z.substr(0,3);
                                        var d = document.getElementById('department').value;
                                        var l = d.toLowerCase();
                                        var e = l.substr(0,4);
                                        var a = y.concat(e,ma);
                                        var b = z.concat(lower,ma);
    document.getElementById('userid').value = b;
}
                                    </script>


