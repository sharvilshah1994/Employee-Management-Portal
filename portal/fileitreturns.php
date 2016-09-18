<?php 
include 'header.php';
include 'config.php';
$id = $_REQUEST['ID'];
$query = "SELECT year FROM financial_year";
$result = $conn->query($query);
$query1 = "SELECT * FROM clients WHERE ID=$id";
$result1 = $conn->query($query1);
?>
<div class="content-wrapper">
<section class="content-header">
                    <?php
                                                while($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                ?>
                    <h1 class="page-header">File Return for <?php echo $row1['cl_name'];?></h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li><a href="incometax.php">Income Tax</a></li>
                                   <li><a href="itaxreturns.php?ID=<?php echo $row1['ID'];?>"><?php echo $row1['cl_name'];?></a></li>
                                   <li class="active">File return details</li>
          </ol>
</section>
            <!-- /.row -->
            <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="insertit_returns.php?ID=<?php echo $row1['ID'];?>" enctype="multipart/form-data" method="POST">
                                <div class="col-lg-12">
                                    
                                        <?php 
                                                }
                                                ?>
                                        <table>
                                            <tr>
                                                <td width="50%" style="padding: 15px">
                                        <div class="form-group">a)
                                            <label>Select Financial year:</label>
                                            <select id="financial_year" name="financial_year" class="form-control">
                                                <?php
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <option value="<?php echo $row['year'];?>" name="<?php echo $row['year'];?>" id="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div></td>
                                        
                                        <td width="50%">
                                        <div class="form-group registration-date">
                                            <div class="input-group registration-date-time">
                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                <label>Due Date</label>
                                                        <input class="form-control" id="registration-date" type="date" name="due_date" id="due_date">
                                            </div>
                                        </div>
                                        </td>
                                            </tr></table>
                                        <hr>
                                        <div class="form-group">b)
                                            <label>Income Certificates -&nbsp;</label>
                                            
                                            <label>Form No. 16</label>
                                            <input id="checkbox-proof16" name="checkbox-proof16" type="checkbox">
                                            <label>,&nbsp;&nbsp;&nbsp; Form No. 16 A.</label>
                                            <input id="checkbox-proof16a" type="checkbox">
                                            <label>,&nbsp;&nbsp;&nbsp; Form No.26 AS</label>
                                            <input id="checkbox-proof26" type="checkbox">
                                        </div>
                                        <table>
                                            <tr>
                                                <td style="padding:5px">
                                        <div id="proof16" style="display:none">
                                            <label>Please upload Form No. 16:</label>
                                            <input type="file" name="proof_16" id="proof_16" class="form-control">
                                        </div>
                                                </td>
                                                <td style="padding:5px">
                                        <div id="proof16a" style="display:none">
                                            <label>Please upload Form No. 16-A:</label>
                                            <input type="file" name="proof_16a" id="proof_16a" class="form-control">
                                        </div>
                                                </td>
                                                <td style="padding:5px">
                                        <div id="proof26" style="display:none">
                                            <label>Please upload Form No. 26AS:</label>
                                            <input type="file" id="proof_26as" name="proof_26as" class="form-control">
                                        </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>    
                                <div class="form-group">c)
                                            <label>Rented Property (If any):&nbsp;</label>
                                            <input id="checkbox-rent" type="checkbox">
                                        </div>        
                                <div id="rent" style="display:none">
                                    <table>
                                        <tr>
                                            <td style="padding: 10px">
                                            <label>Rented property address</label>
                                            <textarea name="rent_address" id="rent_address" class="form-control"></textarea>
                                            </td>
                                            <td style="padding: 10px">
                                            <label>Yearly Income from rental property (INR)</label>
                                            <input type="text" name="rent_income" id="rent_income" class="form-control">
                                            </td>
                                            </tr>
                                    </table>
                                        </div>
                                        <hr>
                                <div class="form-group">d)
                                            <label>If Business in Partnership:&nbsp;</label>
                                            <input id="checkbox-partnerdeed" type="checkbox">
                                </div>
                                        <div id="partnerdeed" style="display: none">
                                            <label>Please upload Partnership deed: (.pdf or .doc)</label>
                                            <input type="file" id="partner_deed" name="partner_deed" class="form-control">
                                        </div>
                                        <hr>
                                <div class="form-group">e)
                                            <label>Agriculture Income (If any):&nbsp;</label>
                                            <input id="checkbox-agriculture" type="checkbox">
                                </div>      
                                    <div id="agriculture" style="display: none">
                                        <table>
                                            <tr>
                                                <td style="padding:10px">
                                            <label>Income from Agriculture: (INR)</label>
                                            <input type="text" name="agriculture_income" id="agriculture_income" class="form-control">
                                                </td>
                                                <td style="padding:10px">
                                            <label>Upload Profit and Loss Statement:</label>
                                            <input type="file" name="agriculture_pl_statement" id="agriculture_pl_statement" class="form-control">
                                                </td>
                                            </tr>
                                        </table>
                                    </div><hr>
                                        
                                <div class="form-group">f)
                                            <label>Financial Statements-&nbsp;</label>
                                            <br>
                                            <label>Balance Sheet:</label>
                                            <input id="checkbox-balance_sheet" type="checkbox">
                                            <label>,&nbsp;&nbsp;&nbsp; Capital Account:</label>
                                            <input id="checkbox-capital_account" type="checkbox">
                                            <label>,&nbsp;&nbsp;&nbsp; Profit & Loss Statement</label>
                                            <input id="checkbox-pl_statement" type="checkbox">
                                            <label>,&nbsp;&nbsp;&nbsp;Other</label>
                                            <input id="checkbox-other" type="checkbox">
                                </div>        
                                <table>
                                            <tr>
                                                <td style="padding:10px">
                                        <div id="balance_sheet" style="display:none">
                                            <label>Upload Balance Sheet:</label>
                                            <input type="file" id="balancesheet" name="balancesheet" class="form-control">
                                        </div>
                                                </td>
                                                <td style="padding:10px">
                                        <div id="capital_account" style="display:none">
                                            <label>Upload Capital Account:</label>
                                            <input type="file" name="capitalaccount" id="capitalaccount" class="form-control">
                                        </div>
                                                </td>
                                                <td style="padding:10px">
                                        <div id="pl_statement" style="display:none">
                                            <label>Upload Profit & Loss Statement:</label>
                                            <input type="file" name="plstatement" id="plstatement" class="form-control">
                                        </div>
                                                </td>
                                               <td style="padding:10px">
                                        <div id="other" style="display:none">
                                            <label>Upload other major statement(if any):</label>
                                            <input type="file" id="otherstatement" name="otherstatement" class="form-control">
                                        </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <div class="form-group">g)
                                           <label>If books of accounts are maintained (Only if f. section not uploaded): </label>
                                           <input id="checkbox-bank_statement" type="checkbox">
                                        </div>
                                        <div id="bank_statement" style="display:none">
                                            <label>Upload bank statement with major transactions(Excel Sheet):</label>
                                            <input type="file" id="bankstatement" name="bankstatement" class="form-control">
                                        </div>
                                        <hr>
                                        <div class="form-group">h)
                                            <label>Capital Gains Account Statement:&nbsp;</label>
                                            <input type="checkbox" id="checkbox-capital_gains">
                                        </div>
                                        <div id="capital_gains" style="display: none">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 50%; padding:10px">
                                                        <label>Upload Capital Gains Account Excel Sheet:</label>
                                            <input type="file" id="capitalgains" name="capitalgains" class="form-control">
                                                    </td>
                                                    <td style="width: 50%; padding:10px">
                                                        <label>Amount deemed to be Long Term Capital Gains: (INR)</label>
                                                        <input type="text" name="capital_long" id="capital_long" class="form-control">
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        <hr>
                                        <div class="form-group">i)
                                            <label>Interest and Dividend Account:&nbsp;</label>
                                            <input type="checkbox" id="checkbox-interest">
                                        </div>
                                        <div id="interest" style="display: none">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 50% ; padding:10px">
                                                        <label>Upload Interest Account Excel Sheet:</label>
                                            <input type="file" name="interest_account" id="interest_account" class="form-control">
                                                    </td>
                                                    <td style="width: 50%; padding:10px">
                                                        <label>Upload Dividend Account Excel Sheet:</label>
                                                        <input type="file" name="dividend_account" id="dividend_account" class="form-control">
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        <hr>
                                        <div class="form-group">j)
                                            <label>Deductions in INR: (If any)&nbsp;</label>
                                            <input type="checkbox" id="checkbox-relaxation">
                                        </div>
                                        <div id="relaxation" style="display: none">
                                            
                                            <label>Provident Fund:&nbsp;</label>
                                            <input type="text" name="dedu_ppf" id="dedu_ppf" class="form-control"><br><br>
                                            <label>Mediclaim:&nbsp;</label>
                                            <input type="text" name="dedu_mediclaim" id="dedu_mediclaim" class="form-control"><br><br>
                                            <label>Insurance Premium:&nbsp;</label>
                                            <input type="text" name="dedu_insurance" id="dedu_insurance" class="form-control"><br><br>
                                            <label>Kids Tuition:&nbsp;</label>
                                            <input type="text" name="dedu_tuition" id="dedu_tuition" class="form-control"><br><br>
                                            <label>Property Loan EMI:&nbsp;</label>
                                            <input type="text" name="dedu_loan" id="dedu_loan" class="form-control"><br><br>
                                            <label>Donation:&nbsp;</label>
                                            <input type="text" name="dedu_donation" id="dedu_donation" class="form-control"><br><br>
                                            <label>Other:&nbsp;</label>
                                            <input type="text" name="dedu_other" id="dedu_other" class="form-control"><br><br>
                                        </div>
                                        <hr>
                                        <div class="form-group">k)
                                            <label>If Statement of Income Prepared:</label>
                                            <input type="checkbox" name="checkbox-soi" id="checkbox-soi">
                                        </div>
                                        <div id="soi" style="display:none">
                                            <table>
                                                <tr>
                                                    <td style="padding:10px">
                                                        <label>Upload Draft Statement of Income:</label>
                                                        <input type="file" name="draft_soi" id="draft_soi" class="form-control">                                                        
                                                    </td>
                                                    <td style="padding:10px">
                                                        <label>Upload Final Statement of Income:</label>
                                                        <input type="file" name="final_soi" id="final_soi" class="form-control">
                                                    </td>
                                                    <td style="padding:10px">
                                                        <label>If Tax Payable:</label>
                                                        <input type="checkbox" name="checkbox-tax" id="checkbox-tax">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px">
                                                        <label>Statement of Income Prepared by:</label>
                                                        <input class="form-control" type="text" name="soi-prep" class="form-control" id="soi-prep" placeholder="Name of person who prepared SOI">
                                                    </td>
                                                    <td style="padding:10px">
                                                        <div style="display:none" id="tax">
                                                <label>Upload Challan:</label>
                                                <input type="file" id="challan" name="challan" class="form-control">
                                            </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="padding:10px">
                                                        <br>
                                                        <strong style="color: crimson">(Check only one of the following three options)</strong>
                                                        <br>
                                                <label>Checked by Client:</label>
                                                <input type="checkbox" id="check" name="check" value="Checked by Client">
                                                    </td>
                                                </tr>                                                
                                                <tr>
                                                    <td style="padding:10px">
                                                <label>Checked by Concerned CA:</label>
                                                <input type="checkbox" id="check" name="check" value="Checked by Concerned CA">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px">
                                                <label>Checked by Sanjay Sir:</label>
                                                <input type="checkbox" id="check" name="check" value="Checked by Sanjay Sir">
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            
                                        </div>
                                        <hr>
                                        <div class="form-group">l)
                                            <label>Return Uploaded:</label>
                                            <input type="checkbox" id="checkbox-return">
                                        </div>
                                        <div id="return" style="display: none">
                                            <table>
                                                <tr>
                                                    <td style="padding:10px">
                                            <label>Upload the return uploaded:</label>
                                            <input type="file" name="uploaded_return" id="uploaded_return" class="form-control">
                                                    </td>
                                                    <td style="padding:10px">
                                            <label>Audit Report:</label> 
                                            <input type="checkbox" id="checkbox-audit">
                                                    </td>
                                            </tr>
                                            </table>
                                            <br>
                                            <div id="audit" style="display:none">
                                                <table>
                                                    <tr>
                                                        <td style="padding:10px">
                                                <label>Upload Tax Audit Report:</label>
                                                <input type="file" name="tax_audit" id="tax_audit" class="form-control">
                                                        </td>
                                                        <td style="padding:10px">
                                                <label>Upload Statutory Audit Report:</label>
                                                <input type="file" name="statutory_audit" id="statutory_audit" class="form-control">
                                                        </td>
                                                        <td style="padding:10px">
                                                <label>Any Other Audit Report:</label>
                                                <input type="file" name="other_audit" class="form-control" id="other_audit">
                                                        </td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">m)
                                            <label>If Return physically signed : &nbsp;</label>
                                            <input type="checkbox" id="checkbox-physical">
                                            </div>
                                            <div id="physical" style="display: none">
                                                <label>Status:</label><br>
                                                
                                                Sent to Client for Sign:&nbsp;<input type="checkbox" name="radio-status" id="radio-status-1" value="Sent to client for sign"><br>
                                                Sent to Banglore:&nbsp;<input type="checkbox" name="radio-status" id="radio-status-2" value="Sent to banglore"><br>
                                                Received at CPC Banglore:&nbsp;<input type="checkbox" name="radio-status" id="radio-status-3" value="Received at CPC Banglore">
                                                <br><br>
                                                <table>
                                                    <tr>
                                                        <td style="padding:10px">
                                                <div id="status" style="display:none">
                                                    <label>Upload Speed Post Receipt:</label>
                                                    <input type="file" name="speed_post" id="speed_post" class="form-control">
                                                </div>
                                                        </td>
                                                        <td style="padding:10px">
                                                <div id="status1" style="display:none">
                                                    <label>Upload ITR Receipt:</label>
                                                    <input type="file" name="itr_receipt" id="itr_receipt" class="form-control">
                                                </div>
                                                        </td>
                                                    </tr></table>
                                            </div>
                                        <hr>
                                        <div class="form-group">n)
                                            <label>If Order Under Section 143(1) Received:</label>
                                            <input type="checkbox" id="checkbox-order">
                                            <div style="display: none" id="order">
                                                <label>Upload Order Under Section 143(1):</label>
                                                <input type="file" id="order_section" name="order_section" class="form-control">    
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    
                                </div>
                                </form>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success">
                                        <input type="reset" name="reset" class="btn btn-warning">
                        </div>
                        
                    </div>
                </div>
            </div>
            </section>
        </div>
 
<?php
include 'footer.php';
?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>
    
//checkbox check 

//$(document).ready(function(){
    $('#checkbox-proof16').change(function(){
        if($('#checkbox-proof16').is(":checked"))
        {   
            $('#proof16').show();
        }
            else
            {
            $('#proof16').hide();
    }
    });
    
    $('#checkbox-proof16a').change(function(){
        if($('#checkbox-proof16a').is(":checked"))
        {
            $('#proof16a').show();
        }
            else
            {
            $('#proof16a').hide();
    }
    });
    
    $('#checkbox-proof26').change(function(){
        if($('#checkbox-proof26').is(":checked"))
        {
            $('#proof26').show();
        }
            else
            {
            $('#proof26').hide();
    }
    });
    
     $('#checkbox-rent').change(function(){
        if($('#checkbox-rent').is(":checked"))
        {
            $('#rent').show();
        }
            else
            {
            $('#rent').hide();
    }
    });
    
    $('#checkbox-partnerdeed').change(function(){
        if($('#checkbox-partnerdeed').is(":checked"))
        {
            $('#partnerdeed').show();
        }
            else
            {
            $('#partnerdeed').hide();
    }
    });
    
    $('#checkbox-agriculture').change(function(){
        if($('#checkbox-agriculture').is(":checked"))
        {
            $('#agriculture').show();
        }
            else
            {
            $('#agriculture').hide();
    }
    });
    
    
    $('#checkbox-balance_sheet').change(function(){
        if($('#checkbox-balance_sheet').is(":checked"))
        {
            $('#balance_sheet').show();
        }
            else
            {
            $('#balance_sheet').hide();
    }
    });
    
    $('#checkbox-capital_account').change(function(){
        if($('#checkbox-capital_account').is(":checked"))
        {
            $('#capital_account').show();
        }
            else
            {
            $('#capital_account').hide();
    }
    });
    
    $('#checkbox-pl_statement').change(function(){
        if($('#checkbox-pl_statement').is(":checked"))
        {
            $('#pl_statement').show();
        }
            else
            {
            $('#pl_statement').hide();
    }
    });
    
    $('#checkbox-capital_gains').change(function(){
        if($('#checkbox-capital_gains').is(":checked"))
        {
            $('#capital_gains').show();
        }
            else
            {
            $('#capital_gains').hide();
    }
    });

     $('#checkbox-interest').change(function(){
        if($('#checkbox-interest').is(":checked"))
        {
            $('#interest').show();
        }
            else
            {
            $('#interest').hide();
    }
    });
    
    $('#checkbox-relaxation').change(function(){
        if($('#checkbox-relaxation').is(":checked"))
        {
            $('#relaxation').show();
        }
            else
            {
            $('#relaxation').hide();
    }
    });
    
    $('#checkbox-other').change(function(){
        if($('#checkbox-other').is(":checked"))
        {
            $('#other').show();
        }
            else
            {
            $('#other').hide();
    }
    });
    
    $('#checkbox-bank_statement').change(function(){
        if($('#checkbox-bank_statement').is(":checked"))
        {
            $('#bank_statement').show();
        }
            else
            {
            $('#bank_statement').hide();
    }
    });
    
    $('#checkbox-return').change(function(){
        if($('#checkbox-return').is(":checked"))
        {
            $('#return').show();
        }
            else
            {
            $('#return').hide();
    }
    });
    
    $('#checkbox-physical').change(function(){
        if($('#checkbox-physical').is(":checked"))
        {
            $('#physical').show();
        }
            else
            {
            $('#physical').hide();
    }
    });
    $('#radio-status-2').change(function(){
        if($('#radio-status-2').is(":checked"))
        {
            $('#status').show();
        }
            else
            {
            $('#status').hide();
    }
    });
    
    $('#radio-status-3').change(function(){
        if($('#radio-status-3').is(":checked"))
        {
            $('#status1').show();
        }
            else
            {
            $('#status1').hide();
    }
    });
    
    $('#checkbox-order').change(function(){
        if($('#checkbox-order').is(":checked"))
        {
            $('#order').show();
        }
            else
            {
            $('#order').hide();
    }
    });
    
    $('#checkbox-soi').change(function(){
        if($('#checkbox-soi').is(":checked"))
        {
            $('#soi').show();
        }
            else
            {
            $('#soi').hide();
    }
    });
    
    $('#checkbox-audit').change(function(){
        if($('#checkbox-audit').is(":checked"))
        {
            $('#audit').show();
        }
            else
            {
            $('#audit').hide();
    }
    });
    
    $('#checkbox-tax').change(function(){
        if($('#checkbox-tax').is(":checked"))
        {
            $('#tax').show();
        }
            else
            {
            $('#tax').hide();
    }
    });
//});
    
    
    
    
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
