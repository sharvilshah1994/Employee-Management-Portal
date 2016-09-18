<?php
include 'header.php';
include 'config.php';
$query = "SELECT * FROM department";
$result = $conn->query($query);

$query2 = "SELECT * FROM department";
$result2 = $conn->query($query2);

$query3 = "SELECT * FROM department";
$result3 = $conn->query($query3);
$query1 = "SELECT * FROM users";

$result1 = $conn->query($query1);
$row1=  mysqli_fetch_assoc($result1);
?>
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                              <h1 class="page-header">Add User</h1>
                               <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add User</li>
          </ol>
        </section>
            <!-- /.row -->
            <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Give details of the user
                        </div>
                        <div class="panel-body">
                            <form role="form" action="submit.php" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <table>
                                            <tr><td style="padding-right: 100px">
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" required class="form-control" id='name' name="name">
                                            
                                        </div></td><td>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" required class="form-control" id='lname' name="lname">
                                            
                                        </div></td>
                                            </tr></table>
                                          <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date of Birth</label>
                        <input class="form-control" id="registration-date" type="date" name="bdate">
            		
            	</div>
            </div>                          
                                        
                                         <div class="form-group">
                                            <label>Address</label>
                                            <textarea required class="form-control" name="address">
                                            </textarea>
                                        </div>
                                    <table>
                                        <tr>
                                            <td style="padding-right: 100px">
                                            <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="department" id="department">
                                                <option selected disabled>Please select department for user</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                            </td>
                                            <td>
                                    <div class="form-group">
                                        <label>dept head</label>
                                        <input type="checkbox" name="dept_head" id="dept_head" value="1">
                                        
                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right: 100px">
                                        <div class="form-group">
                                            <label>2nd Department </label>&nbsp;<span style="color: crimson">(If in single department or all, leave this field blank)</span>
                                            <select class="form-control" name="department1">
                                                <option selected disabled>Please select 2nd department for user</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result2))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option id="department1"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                            </td>
                                            <td>
                                     <div class="form-group">
                                        <label>2nd dept head</label>
                                        <input type="checkbox" name="dept_head_1" id="dept_head_1" value="1">
                                        
                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right: 100px">
                                        <div class="form-group">
                                            <label>3rd Department</label>&nbsp;<span style="color: crimson">(If only in 2 departments or all, leave this field blank)</span>
                                            <select class="form-control" name="department2">
                                                <option selected disabled>Please select 3rd department for user</option>
                                                <?php
                                        while ($row=  mysqli_fetch_assoc($result3))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                            
                                                <option id="department2"><?php echo $row['name'];?></option>
                                                
                                            
                                            <?php
                                        }?>
                                                </select>
                                        </div>
                                            </td>
                                            <td>
                                    <div class="form-group">
                                        <label>3rd dept head</label>
                                        <input type="checkbox" name="dept_head_2" id="dept_head_2" value="1">
                                        
                                    </div>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                     
                                        <div class="form-group">
                                            <label>Email Id</label>
                                            <input type="email" required class="form-control" id="email" name="email">
                                        </div>
                                    
                                </div>
                                
                                 <div class="col-lg-6">
           
                                     <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" required class="form-control" name="number">
                                         </div>
                                        <div class="form-group">
                                            <label>Employee Photo</label>
                                            <input type="file" class="form-control" name="fileToUpload">
                                            <input type="hidden" class="form-control" name="defaultfile" value="uploads/default.png">
                                        </div>
                                     <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation" id="designation">
                                            
                                        </div>
                                          <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Joining</label>
                        <input class="form-control" id="registration-date" type="date" name="doj">
            		
            	</div>
            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">User id&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="populateuserid();">Generate</a></label>
                                                <input class="form-control" id="userid" name="userid" type="text" required>
                                            </div>
                                                     <div class="form-group">
                                                         <label for="disabledSelect">Password&nbsp;&nbsp;&nbsp;<a href="#" onclick="populatepassword();">Generate</a></label>
                                                
                                                         <input class="form-control" id="password" name="password" type="text" required>
                                            </div>
                                        
                                        <table><tr><td style="padding-right: 100px">
                                            <div class="form-group">
                                            <label>DGSM Partner</label>
                                            <select class="form-control" name="partner" id="partner">
                                                <option selected disabled>Please select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                           
                                                </select>
                                            </div></td>
                                            <td>
                                                <div class="form-group">
                                            <label>Admin of Portal</label>
                                            <select class="form-control" name="admin" id="admin">
                                                <option selected disabled>Please select an option</option>
                                                <option value="Yes">Yes</option>
                                                     <option value="No">No</option>
                                           
                                                </select>
                                            </div>
                                                
                                            </td>
                                            </tr>
                                        </table>
                                                                <div class="form-group registration-date">
                                                                        
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<label>Date of Anniversary</label>
                        <input class="form-control" id="registration-date" type="date" name="doa">
            		
            	</div>
            </div>  
                                         
                                </div>
                                
                                <div class="col-lg-12">
                                    
                                    <hr>
                                </div>
                                <div class="col-lg-6">
                                    <div id="emp" name="emp" style="display: none">
                                    <label>Select type of employee</label>
                                    <br>
                                    <input type="radio" class="emp_type" name="emp_type" id="emp_type" value="contract">&nbsp;Contract Based
                                    <br>
                                    <input type="radio" class="emp_type" name="emp_type" id="emp_type" value="pf">&nbsp;PF Based
                                    <br>
                                    <input type="radio" class="emp_type" name="emp_type" id="emp_type" value="article">&nbsp;Article Clerk
                                    </div>
                                </div>
                                    <div id="pf_div" name="pf_div" style="display: none">
                                        <br>
                                        <div class="col-lg-6">
                                        <label>PF Number</label>
                                        <input type="text" id="pf_num" name="pf_num" class="form-control"> 
                                        </div>
                                        </div>
                                    
                        <div id="contract_div" name="contract_div" style="display: none">
                                        
                                        <br>
                                        <div class="col-lg-12">
                                            <br>
                                            <div class="col-lg-6">
                                        <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date of contract</label>
                        <input class="form-control" id="co_date_contract" type="date" name="co_date_contract">
                            </div>
                        </div>             
                                        <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Contract Valid upto</label>
                        <input class="form-control" id="co_valid_contract" type="date" name="co_valid_contract">
                            </div>
                        </div>
                                    <div class="form-group">
                                            <label>Application Scanned Copy</label>
                                            <input type="file" name="co_app_copy" name="co_app_copy" class="form-control">
                                    </div>
                                                <div class="form-group">
                                        <label>Biodata/CV</label>
                                        <input type="file" name="co_biodata" id="co_biodata" class="form-control">
                                    </div>
                        </div>
                                        
                                        <div class="col-lg-6">
                                    
                                            <div class="form-group">
                                        <label>Qualification Certificates</label>
                                        <input type="file" name="co_certi" id="co_certi" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>Experience Certificates</label>
                                        <input type="file" name="co_exp" id="co_exp" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>PAN Number</label>
                                        <input type="text" name="co_pan" id="co_pan" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>Residence Proof</label>
                                        <input type="file" name="co_residence" id="co_residence" class="form-control">
                                    </div>
                                            
                        </div>
                                            
                        </div>
                        </div>
                                
                                    
                                    <div id="article_div" name="article_div" style="display: none">
                                        <br>
                                        <div class="col-lg-12">
                                            <br>
                                            <div class="col-lg-6">
                                        <div class="form-group registration-date">
                
                                              <div class="input-group registration-date-time">
            		<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            		<label>Date of Registration</label>
                        <input class="form-control" id="ar_date_reg" type="date" name="ar_date_reg">
                            </div>
                        </div>             
                                        <div class="form-group">
            		<label>Agreement for registration</label>
                        <input class="form-control" id="ar_agreement" type="file" name="ar_agreement">
                            
                        </div>
                                    <div class="form-group">
                                            <label>Details for extra permission</label>
                                            <textarea id="ar_extra_permission" name="ar_extra_permission" class="form-control"></textarea>
                                    </div>
                                                <div class="form-group">
                                        <label>Biodata/CV</label>
                                        <input type="file" name="ar_biodata" id="ar_biodata" class="form-control">
                                    </div>
                        </div>
                                        
                                        <div class="col-lg-6">
                                    
                                            <div class="form-group">
                                        <label>Qualification Certificates</label>
                                        <input type="file" name="ar_certi" id="ar_certi" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>Experience Certificates</label>
                                        <input type="file" name="ar_exp" id="ar_exp" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>PAN Number / Any other identity number (Please mention which identity)</label>
                                        <input type="text" name="ar_pan" id="ar_pan" class="form-control">
                                    </div>
                                            <div class="form-group">
                                        <label>Residence Proof</label>
                                        <input type="file" name="ar_residence" id="ar_residence" class="form-control">
                                    </div>
                                            
                        </div>
                                            
                        </div>
                                        
                                    </div>
                                        
                                    </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                            
                                <br>
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

    </div>
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
                                    <script src="plugins/jQueryUI/jquery-ui.js" ></script>
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
    
    $('#partner').on('change', function() {
      if ( this.value == 'Yes')
      {
        $("#emp").hide();
      }
      else
      {
        $("#emp").show();
      }
    });
    
    $("input[name$='emp_type']").click(function() {
      if ( this.value == 'pf')
      {
        $("#pf_div").show();
      }
      else
      {
        $("#pf_div").hide();
      }
    });
    
    $("input[name$='emp_type']").click(function() {
      if ( this.value == 'contract')
      {
        $("#contract_div").show();
      }
      else
      {
        $("#contract_div").hide();
      }
    });
    
    $("input[name$='emp_type']").click(function() {
      if ( this.value == 'article')
      {
        $("#article_div").show();
      }
      else
      {
        $("#article_div").hide();
      }
    });

    </script>
