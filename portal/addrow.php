<?php
include 'header.php';
include 'config.php';
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$dept = $_REQUEST['dept'];

?>
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                              <h1 class="page-header">Add row</h1>

        </section>
            <!-- /.row -->
            <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Give details for adding a row
                        </div>
                        <div class="panel-body">
                            <form role="form" action="#" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                                 
                                </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                            
                                <br>
                                <input type="submit" class="btn btn-success">
                                <input type="reset" class="btn btn-warning">
                            </div>
                                </form>
                            <!-- /.row (nested) -->
                        
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
                                    include "footer.php";
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
