<?php 
session_start();
include 'config.php';
include 'header.php';
$id = $_REQUEST['id'];
$parent_id = $_REQUEST['parent_id'];
$uname = $_SESSION['name'];
$query = "SELECT * FROM clients_audit WHERE ID='$parent_id'";
$result = $conn -> query($query);
$query1 = "SELECT * FROM constdoc_audit WHERE parent_id='$parent_id'";
$result1 = $conn -> query($query1);

date_default_timezone_set('Asia/Kolkata');
$time1 = date("H:i:s");
$time = date("Y-m-d H:i:s",strtotime($time1));
?>
<?php 
while($row = mysqli_fetch_assoc($result))
{
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Constitutional Documents of <span style="color: crimson"><?php echo $row['cl_name'];?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
    <div class="row">
        <div class="col-lg-12">
            <style>
/*
body {
    width: 600px;
    margin: 40px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 14px;
    color: #444;
}*/

table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px;
    border-radius: 0 0 6px 6px;
}  
</style>
<table class="bordered">
                <tr>
                    <th class="head">
                        Sr No
                    </th>
                    <th style="width: 200px">
                        Particulars
                    </th>
                    <th style="width: 300px">
                        Requirements
                    </th>
                    <th style="width: 300px">
                        Remarks
                    </th>
                    <th>
                        Document (if any)
                    </th>
                    <th>
                        Verification
                    </th>
                    <th>
                        Compliance
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
                <?php 
                
                
                
                while($row1 = mysqli_fetch_assoc($result1))
                {
                ?>
                <?php
                
                    $colstan1='';
//                    $colstan2 = '';
                        if($row1['particulars'] === "Memorandum of Association" )
                        {
                        $colstan1='colspan="2"';    
                        } 
                            ?>
                <tr>
                    <td>
                        <?php echo $row1['srno'];?>
                    </td>
                    <td>
                        <?php 
                        if($row1['srno'] === '1' or $row1['srno'] === '2' or $row1['srno'] === '3' or $row1['srno'] === '4' or $row1['srno'] === '5' or $row1['srno'] === '6' )
                        {
                            ?>
                        <strong><?php echo $row1['particulars'];?></strong>
                        <?php
                        }
                        else
                        {
                        ?>
                        <?php echo $row1['particulars'];?>
                            <?php
                        }
                        ?>
                    </td>
                    
                    <td <?php  echo $colstan1; ?>>
                       
                        <?php 
                        if($row1['particulars'] === "Memorandum of Association")
                        {
                            ?>
                        <table>
                            <tr>
                                <td>a) Object Clause - <?php echo $row1['obj_clause_remarks'];?></td>
                            </tr>
                
                <tr >
                    <td>b) Authorized Share Capital - <?php echo $row1['auth_share_remarks'];?>
                    </td></tr>
                        </table>
                        
                        <?php
                        }
                        else
                        {
                        ?>
                        <?php echo $row1['requirement'];?>
                         <?php
                        }
                        ?>
                        
                    </td>
                    <?php 
                    if($row1['particulars'] != "Memorandum of Association")
                        {
                        ?>
                    
                    <td>
                        <?php echo $row1['remarks'];?>
                    </td>
                    <?php
                    }
                    ?>
                    <td>
                        <?php 
                        if(!empty($row1['document']))
                        {
                        ?>
                        <a href="<?php echo $row1['document'];?>">View</a>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row1['verification'];
                        if(!empty($row1['no_remarks_1']))
                        {
                        ?>
                        - <br>
                        Reason - <?php echo $row1['no_remarks_1'];?>
                        
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row1['compliance'];
                        if(!empty($row1['no_remarks_2']))
                        {
                        ?>
                        - <br>
                        Reason - <?php echo $row1['no_remarks_2'];?>
                        
                        <?php
                        }
                        ?>
                        
                    </td>
                    <td>
                        <?php
                        if($row1['particulars']!='Articles of Association' and $row1['particulars']!='Registrar of Companies Website inspection')
                        {
                        ?>
                        <a href="editconstdoc_audit.php?id=<?php echo $row1['ID'];?>&parent_id=<?php echo $row1['parent_id'];?>" class="btn btn-info">Edit</a>
                        <?php
                        }
 else { 
     
 }
                        ?>
                    </td>
                </tr>
                
                    <?php
                }
                $query2 = "SELECT particulars,remarks,compliance,verification FROM "
                        . "`constdoc_audit` WHERE particulars!='Articles of Association' "
                        . "AND particulars!='Registrar of Companies Website inspection' "
                        . "AND particulars!='Memorandum of Association' "
                        . "AND particulars!='Any other provision related to account & audit' "
                        . "AND particulars!='Any other matter' AND (remarks = '' or compliance = '' or verification = '')";
                $result2 = $conn -> query($query2);
                
                
                if($result2->num_rows == 0)
                {
                    
                    $query3 = "UPDATE `checklist_company` SET `status`='Completed at $time' WHERE ID='$id' AND parent_id='$parent_id'";
                    $conn->query($query3);
                }
                else
                {
                    $query3 = "UPDATE `checklist_company` SET `status`='Not completed' WHERE ID='$id' AND parent_id='$parent_id'";
                    $conn->query($query3);
                }
                
                
                
                ?>
            </table>
            
<br>
<br>
<br>
<br>
<br>
<br>
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
