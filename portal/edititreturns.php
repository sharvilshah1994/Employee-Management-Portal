<?php 
include 'header.php';
$idnum = $_REQUEST['ID'];
$financial_year = $_REQUEST['financial_year'];
$query = "SELECT * FROM clients c,itreturns i WHERE c.ID=$idnum AND i.parent_id=$idnum AND i.financial_year='$financial_year'";

$result = $conn -> query($query);
?>
<form action="updateitreturns.php?ID=<?php echo $idnum?>&financial_year=<?php echo $financial_year ?>" enctype="multipart/form-data" role="form" method="POST">
    <div class="content-wrapper">   
        <section class="content-header">
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                    
                    <h1 class="page-header">Edit IT returns for <?php echo $row['cl_name'];?>, Financial Year - <?php echo $financial_year;?></h1>
              <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li><a href="incometax.php">Income Tax</a></li>
                                   <li><a href="itaxreturns.php?ID=<?php echo $idnum;?>"><?php echo $row['cl_name'];?></a></li>
                                   <li class="active">Edit IT Return Details</li>
                    </ol>      
    </section>
    <section class="content">
        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Edit Information</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    
                        <div class="form-group registration-date">
                                            <div class="input-group registration-date-time">
                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                <label>Due Date</label>
                                                <input class="form-control" id="registration-date" value="<?php echo $row['due_date'];?>" type="date" name="due_date" id="due_date">
                                            </div>
                                        </div>
                                    <hr>
                                    <label>Income Certificates-</label><br>
                                        <label>Form  16:</label>
                                    <?php
                                    if(!empty($row['proof_16']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['proof_16'];?>">View</a>&nbsp;
                                    <a href="#" id="change-proof_16" name="change-proof_16">Change</a>
                                    <br>
                                    <div id="div-proof_16" name="div-proof_16" style="display: none">
                                        <input type="file" id="proof_16_change" name="proof_16_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-proof_16" name="checkbox-proof_16">
                                    <div id="proof_16-upload" style="display:none">
                                    <input type="file" id="proof_16" name="proof_16">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                                <label>Form  16a:</label>
                                    <?php
                                    if(!empty($row['proof_16a']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['proof_16a'];?>" >View</a>&nbsp;
                                    <a href="#" id="change-proof_16a" name="change-proof_16a">Change</a>
                                    <br>
                                    <div id="div-proof_16a" name="div-proof_16a" style="display: none">
                                        <input type="file" id="proof_16a_change" name="proof_16a_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-proof_16a" name="checkbox-proof_16a">
                                    <div id="proof_16a-upload" style="display:none">
                                    <input type="file" id="proof_16a" name="proof_16a">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                            
                                                <label>Form  26as:</label>
                                    <?php
                                    if(!empty($row['proof_26as']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['proof_26as'];?>">View</a>&nbsp;
                                    <a href="#" id="change-proof_26as" name="change-proof_26as">Change</a>
                                    <br>
                                    <div id="div-proof_26as" name="div-proof_26as" style="display: none">
                                        
                                        <input type="file" id="proof_26as_change" name="proof_26as_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-proof_26as" name="checkbox-proof_26as">
                                    <div id="proof_26as-upload" style="display:none">
                                    <input type="file" id="proof_26as" name="proof_26as">
                                    </div>
                                    <br>
                                     <?php
                                    }
                                    ?>
                                    <hr>
                                    <label>Rented Property-</label><br><br>
                                    <label>Address:</label>
                                    <textarea id="rent_address" name="rent_address"><?php echo $row['rent_address'];?></textarea>
                                    <br><label>Income: (in INR)</label>
                                    <input type="text" id="rent_income" name="rent_income" value="<?php echo $row['rent_income']?>">
                                    <hr>
                                    <label>Business in Partnership-</label><br>
                                    <?php 
                                    if(!empty($row['partner_deed']))
                                    {
                                        ?>
                                    <label>Partnership Deed:</label>
                                    <a href="<?php echo $row['partner_deed']?>">View</a>
                                    &nbsp;
                                    <a href="#" id="change-partner_deed" name="change-partner_deed">Change</a>
                                    <br>
                                    <div id="div-partner_deed" name="div-partner_deed" style="display: none">
                                        <input type="file" id="partner_deed_change" name="partner_deed_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-partner_deed" name="checkbox-partner_deed">
                                    <div id="partner_deed-upload" style="display:none">
                                    <input type="file" id="partner_deed" name="partner_deed">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <label>Agriculture Income-</label><br>
                                    <label>Income from Agriculture: (INR)</label>
                                    <input type="text" id="agriculture_income" name="agriculture_income" value="<?php echo $row['agriculture_income'];?>">
                                    <br><label>Profit and Loss Statement:</label>
                                    <?php 
                                    if(empty($row['agriculture_pl_statement']))
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-agriculture_pl_statement" name="checkbox-agriculture_pl_statement">
                                    <div id="agriculture_pl_statement-upload" style="display:none">
                                    <input type="file" id="agriculture_pl_statement" name="agriculture_pl_statement">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    else
                                    {
                    ?>
                                    <label>Profit and Loss Statement:</label>
                                    <a href="<?php echo $row['agriculture_pl_statement'];?>">View</a>&nbsp;
                                    <a href="#" id="change-agriculture_pl_statement" name="change-agriculture_pl_statement">Change</a>
                                    <br>
                                    <div id="div-agriculture_pl_statement" name="div-agriculture_pl_statement" style="display: none">
                                        <input type="file" id="agriculture_pl_statement_change" name="agriculture_pl_statement_change">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <hr>
                                    <label>Financial Statements-</label><br>
                                        <label>Balance Sheet:</label>
                                    <?php
                                    if(!empty($row['balancesheet']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['balancesheet'];?>">View</a>&nbsp;
                                    <a href="#" id="change-balancesheet" name="change-balancesheet">Change</a>
                                    <br>
                                    <div id="div-balancesheet" name="div-balancesheet" style="display: none">
                                        <input type="file" id="balancesheet_change" name="balancesheet_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-balancesheet" name="checkbox-balancesheet">
                                    <div id="balancesheet-upload" style="display:none">
                                    <input type="file" id="balancesheet" name="balancesheet">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                                <label>Capital Account:</label>
                                    <?php
                                    if(!empty($row['capitalaccount']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['capitalaccount'];?>" >View</a>&nbsp;
                                    <a href="#" id="change-capitalaccount" name="change-capitalaccount">Change</a>
                                    <br>
                                    <div id="div-capitalaccount" name="div-capitalaccount" style="display: none">
                                        <input type="file" id="capitalaccount_change" name="capitalaccount_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-capitalaccount" name="checkbox-capitalaccount">
                                    <div id="capitalaccount-upload" style="display:none">
                                    <input type="file" id="capitalaccount" name="capitalaccount">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                            
                                                <label>Profit and Loss Statement:</label>
                                    <?php
                                    if(!empty($row['plstatement']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['plstatement'];?>">View</a>&nbsp;
                                    <a href="#" id="change-plstatement" name="change-plstatement">Change</a>
                                    <br>
                                    <div id="div-plstatement" name="div-plstatement" style="display: none">
                                        
                                        <input type="file" id="plstatement_change" name="plstatement_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-plstatement" name="checkbox-plstatement">
                                    <div id="plstatement-upload" style="display:none">
                                    <input type="file" id="plstatement" name="plstatement">
                                    </div>
                                    <br>
                                     <?php
                                    }
                                    ?>
                                    
                                               <label>Other Statement:</label>
                                    <?php
                                    if(!empty($row['otherstatement']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['otherstatement'];?>">View</a>&nbsp;
                                    <a href="#" id="change-otherstatement" name="change-otherstatement">Change</a>
                                    <br>
                                    <div id="div-otherstatement" name="div-otherstatement" style="display: none">
                                        
                                        <input type="file" id="otherstatement_change" name="otherstatement_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-otherstatement" name="checkbox-otherstatement">
                                    <div id="otherstatement-upload" style="display:none">
                                    <input type="file" id="otherstatement" name="otherstatement">
                                    </div>
                                     <?php
                                    }
                                    ?>
                                    <hr>
                                    
                                                <label>If books of accounts are maintained:</label>
                                    <?php
                                    if(!empty($row['bankstatement']))   
                                    {
                                    ?>
                                    Yes           
                                    <a href="<?php echo $row['bankstatement'];?>">View</a>&nbsp;
                                    <a href="#" id="change-bankstatement" name="change-bankstatement">Change</a>
                                    <br>
                                    <div id="div-bankstatement" name="div-bankstatement" style="display: none">
                                        
                                        <input type="file" id="bankstatement_change" name="bankstatement_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-bankstatement" name="checkbox-bankstatement">
                                    <div id="bankstatement-upload" style="display:none">
                                    <input type="file" id="bankstatement" name="bankstatement">
                                    </div>
                                     <?php
                                    }
                                    ?>
                                    
                                    <hr>
                                    <label>Capital Gains Account-</label>
                                    <br><label>Capital Gains Account Sheet:</label>
                                    <?php 
                                    if(empty($row['capitalgains']))
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-capitalgains" name="checkbox-capitalgains">
                                    <div id="capitalgains-upload" style="display:none">
                                    <input type="file" id="capitalgains" name="capitalgains">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                    ?>
                                    <label>Profit and Loss Statement:</label>
                                    <a href="<?php echo $row['capitalgains'];?>">View</a>&nbsp;
                                    <a href="#" id="change-capitalgains" name="change-capitalgains">Change</a>
                                    <br>
                                    <div id="div-capitalgains" name="div-capitalgains" style="display: none">
                                        <input type="file" id="capitalgains_change" name="capitalgains_change">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <label>Amount deemed to be Long Term Capital Gains: (INR)</label>
                                    <input type="text" id="capital_long" name="capital_long" value="<?php echo $row['capital_long'];?>">
                                    <hr>
                                </div>
                                    <div class="col-lg-6">
                                    <label>Interest and Dividend Account-</label><br>
                                        <label>Interest Account:</label>
                                    <?php
                                    if(!empty($row['interest_account']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['interest_account'];?>">View</a>&nbsp;
                                    <a href="#" id="change-interest_account" name="change-interest_account">Change</a>
                                    <br>
                                    <div id="div-interest_account" name="div-interest_account" style="display: none">
                                        <input type="file" id="interest_account_change" name="interest_account_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-interest_account" name="checkbox-interest_account">
                                    <div id="interest_account-upload" style="display:none">
                                    <input type="file" id="interest_account" name="interest_account">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                                <label>Dividend Account:</label>
                                    <?php
                                    if(!empty($row['dividend_account']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['dividend_account'];?>" >View</a>&nbsp;
                                    <a href="#" id="change-dividend_account" name="change-dividend_account">Change</a>
                                    <br>
                                    <div id="div-dividend_account" name="div-dividend_account" style="display: none">
                                        <input type="file" id="dividend_account_change" name="dividend_account_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-dividend_account" name="checkbox-dividend_account">
                                    <div id="dividend_account-upload" style="display:none">
                                    <input type="file" id="dividend_account" name="dividend_account">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <label>Deductions (INR)-</label><br>
                                    <label>Provident Fund:</label>
                                    <input type="text" id="dedu_ppf" name="dedu_ppf" value="<?php echo $row['dedu_ppf'];?>">
                                    <br>
                                    <label>Mediclaim:</label>
                                    <input type="text" id="dedu_mediclaim" name="dedu_mediclaim" value="<?php echo $row['dedu_mediclaim'];?>">
                                    <br>
                                    <label>Insurance Premium:</label>
                                    <input type="text" id="dedu_insurance" name="dedu_insurance" value="<?php echo $row['dedu_insurance'];?>">
                                    <br>
                                    <label>Kids Tuition:</label>
                                    <input type="text" id="dedu_tuition" name="dedu_tuition" value="<?php echo $row['dedu_tuition'];?>">
                                    <br>
                                    <label>Property Loan EMI:</label>
                                    <input type="text" id="dedu_loan" name="dedu_loan" value="<?php echo $row['dedu_loan'];?>">
                                    <br>
                                    <label>Donation:</label>
                                    <input type="text" id="dedu_donation" name="dedu_donation" value="<?php echo $row['dedu_donation'];?>">
                                    <br>
                                    <label>Other:</label>
                                    <input type="text" id="dedu_other" name="dedu_other" value="<?php echo $row['dedu_other'];?>">
                                    <hr>
                                    <label>Statement of Income-</label>
                                    <br>
                                    <label>Draft Statement of Income:</label>
                                    <?php
                                    if(!empty($row['draft_soi']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['draft_soi'];?>">View</a>&nbsp;
                                    <a href="#" id="change-draft_soi" name="change-draft_soi">Change</a>
                                    <br>
                                    <div id="div-draft_soi" name="div-draft_soi" style="display: none">
                                        <input type="file" id="draft_soi_change" name="draft_soi_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-draft_soi" name="checkbox-draft_soi">
                                    <div id="draft_soi-upload" style="display:none">
                                    <input type="file" id="draft_soi" name="draft_soi">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                                <label>Final Statement of Income:</label>
                                    <?php
                                    if(!empty($row['final_soi']))   
                                    {
                                    ?>
                                    <a href="<?php echo $row['final_soi'];?>" >View</a>&nbsp;
                                    <a href="#" id="change-final_soi" name="change-final_soi">Change</a>
                                    <br>
                                    <div id="div-final_soi" name="div-final_soi" style="display: none">
                                        <input type="file" id="final_soi_change" name="final_soi_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-final_soi" name="checkbox-final_soi">
                                    <div id="final_soi-upload" style="display:none">
                                    <input type="file" id="final_soi" name="final_soi">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    <label>Challan:</label>
                                    <?php 
                                    if(empty($row['challan']))
                                    {
                                        ?>
                                    No challan Uploaded. Upload?
                                    <input type="checkbox" id="checkbox-challan" name="checkbox-challan">
                                    <div id="challan-upload" style="display:none">
                                    <input type="file" id="challan" name="challan">
                                    </div>
                                    <br>
                                    <?php 
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="<?php echo $row['challan'];?>" >View</a>&nbsp;
                                    <a href="#" id="change-challan" name="change-challan">Change</a>
                                    <br>
                                    <div id="div-challan" name="div-challan" style="display: none">
                                        <input type="file" id="challan_change" name="challan_change">
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <br>
                                    <label>Statement of Income Prepared by:</label>
                                    <input type="text" name="soi-prep" id="soi-prep" value="<?php echo $row['soi-prep'];?>">
                                    <br>
                                    <strong style="color: crimson">(Check only one of the following three options)</strong>
                                    <br>
                                    <label>Checked by Client:</label>
                                    <input type="checkbox" id="check" name="check" value="Checked by Client" <?php if($row['check']=='Checked by Client') { echo "checked"; }?>>
                                    <br>
                                    <label>Checked by Concerned CA:</label>
                                    <input type="checkbox" id="check" name="check" value="Checked by Concerned CA" <?php if($row['check']=='Checked by Concerned CA') { echo "checked"; }?>>
                                    <br>
                                    <label>Checked by Sanjay sir:</label>
                                    <input type="checkbox" id="check" name="check" value="Checked by Sanjay sir" <?php if($row['check']=='Checked by Sanjay sir') { echo "checked"; }?>>
                                    <hr>
                                    <label>Uploaded Return-</label>
                                    <br>
                                    <label>Return:</label>
                                    <?php
                                    if(!empty($row['uploaded_return']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['uploaded_return'];?>">View</a>&nbsp;
                                    <a href="#" id="change-uploaded_return" name="change-uploaded_return">Change</a>
                                    <br>
                                    <div id="div-uploaded_return" name="div-uploaded_return" style="display: none">
                                        <input type="file" id="uploaded_return_change" name="uploaded_return_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-uploaded_return" name="checkbox-uploaded_return">
                                    <div id="uploaded_return-upload" style="display:none">
                                    <input type="file" id="uploaded_return" name="uploaded_return">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    <label>Statutory Audit Report:</label>
                                    <?php
                                    if(!empty($row['statutory_audit']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['statutory_audit'];?>">View</a>&nbsp;
                                    <a href="#" id="change-statutory_audit" name="change-statutory_audit">Change</a>
                                    <br>
                                    <div id="div-statutory_audit" name="div-statutory_audit" style="display: none">
                                        <input type="file" id="statutory_audit_change" name="statutory_audit_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-statutory_audit" name="checkbox-statutory_audit">
                                    <div id="statutory_audit-upload" style="display:none">
                                    <input type="file" id="statutory_audit" name="statutory_audit">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    <label>Tax Audit Report:</label>
                                    <?php
                                    if(!empty($row['tax_audit']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['tax_audit'];?>">View</a>&nbsp;
                                    <a href="#" id="change-tax_audit" name="change-tax_audit">Change</a>
                                    <br>
                                    <div id="div-tax_audit" name="div-tax_audit" style="display: none">
                                        <input type="file" id="tax_audit_change" name="tax_audit_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-tax_audit" name="checkbox-tax_audit">
                                    <div id="tax_audit-upload" style="display:none">
                                    <input type="file" id="tax_audit" name="tax_audit">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    
                                     <label>Any Other Audit Report:</label>
                                    <?php
                                    if(!empty($row['other_audit']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['other_audit'];?>">View</a>&nbsp;
                                    <a href="#" id="change-other_audit" name="change-other_audit">Change</a>
                                    <br>
                                    <div id="div-other_audit" name="div-other_audit" style="display: none">
                                        <input type="file" id="other_audit_change" name="other_audit_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-other_audit" name="checkbox-other_audit">
                                    <div id="other_audit-upload" style="display:none">
                                    <input type="file" id="other_audit" name="other_audit">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    
                                    <hr>
                                    <label>If Return Physically Signed-</label>
                                    <br>
                                    <label>Sent to Bangalore:</label>
                                    <?php
                                    if(!empty($row['speed_post']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['speed_post'];?>">View</a>&nbsp;
                                    <a href="#" id="change-speed_post" name="change-speed_post">Change</a>
                                    <br>
                                    <div id="div-speed_post" name="div-speed_post" style="display: none">
                                        <input type="file" id="speed_post_change" name="speed_post_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-speed_post" name="checkbox-speed_post">
                                    <div id="speed_post-upload" style="display:none">
                                    <input type="file" id="speed_post" name="speed_post">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    <label>Received at CPC Bangalore :</label>
                                    <?php
                                    if(!empty($row['itr_receipt']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['itr_receipt'];?>">View</a>&nbsp;
                                    <a href="#" id="change-itr_receipt" name="change-itr_receipt">Change</a>
                                    <br>
                                    <div id="div-itr_receipt" name="div-itr_receipt" style="display: none">
                                        <input type="file" id="itr_receipt_change" name="itr_receipt_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-itr_receipt" name="checkbox-itr_receipt">
                                    <div id="itr_receipt-upload" style="display:none">
                                    <input type="file" id="itr_receipt" name="itr_receipt">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                
                                    <hr>
                                    <label>If Order under Section 143(1)-</label>
                                    <br>
                                    <label>Order under Section 143(1):</label>
                                    <?php
                                    if(!empty($row['order_section']))   
                                    {
                                    ?>
                                        <a href="<?php echo $row['order_section'];?>">View</a>&nbsp;
                                    <a href="#" id="change-order_section" name="change-order_section">Change</a>
                                    <br>
                                    <div id="div-order_section" name="div-order_section" style="display: none">
                                        <input type="file" id="order_section_change" name="order_section_change">
                                    </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    No file found! Upload?
                                    <input type="checkbox" id="checkbox-order_section" name="checkbox-order_section">
                                    <div id="order_section-upload" style="display:none">
                                    <input type="file" id="order_section" name="order_section">
                                    </div>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                
                                    
                                </div>
                            
                            <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
                            <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-warning">
    <br>
                            <br>
                            </div>

                        </div>
                    
                    </div>
                
                </div>
    </section>            
            </div>

</form>

<?php
                    }
include 'footer.php';
?>
<script>
     $(function(){
    $('#change-proof_16').on('click', function(){
       $("#div-proof_16").show();
    });
});

$('#checkbox-proof_16').change(function(){
        if($('#checkbox-proof_16').is(":checked"))
        {
            $('#proof_16-upload').show();
        }
            else
            {
            $('#proof_16-upload').hide();
    }
    });

    $(function(){
    $('#change-proof_16a').on('click', function(){
       $("#div-proof_16a").show();
    });
});

$('#checkbox-proof_16a').change(function(){
        if($('#checkbox-proof_16a').is(":checked"))
        {
            $('#proof_16a-upload').show();
        }
            else
            {
            $('#proof_16a-upload').hide();
    }
    });

 $(function(){
    $('#change-proof_26as').on('click', function(){
       $("#div-proof_26as").show();
    });
});
$('#checkbox-proof_26as').change(function(){
        if($('#checkbox-proof_26as').is(":checked"))
        {
            $('#proof_26as-upload').show();
        }
            else
            {
            $('#proof_26as-upload').hide();
    }
    });

$(function(){
    $('#change-partner_deed').on('click', function(){
       $("#div-partner_deed").show();
    });
});
$('#checkbox-partner_deed').change(function(){
        if($('#checkbox-partner_deed').is(":checked"))
        {
            $('#partner_deed-upload').show();
        }
            else
            {
            $('#partner_deed-upload').hide();
    }
    });


$(function(){
    $('#change-agriculture_pl_statement').on('click', function(){
       $("#div-agriculture_pl_statement").show();
    });
});
$('#checkbox-agriculture_pl_statement').change(function(){
        if($('#checkbox-agriculture_pl_statement').is(":checked"))
        {
            $('#agriculture_pl_statement-upload').show();
        }
            else
            {
            $('#agriculture_pl_statement-upload').hide();
    }
    });


$(function(){
    $('#change-balancesheet').on('click', function(){
       $("#div-balancesheet").show();
    });
});
$('#checkbox-balancesheet').change(function(){
        if($('#checkbox-balancesheet').is(":checked"))
        {
            $('#balancesheet-upload').show();
        }
            else
            {
            $('#balancesheet-upload').hide();
    }
    });


$(function(){
    $('#change-capitalaccount').on('click', function(){
       $("#div-capitalaccount").show();
    });
});
$('#checkbox-capitalaccount').change(function(){
        if($('#checkbox-capitalaccount').is(":checked"))
        {
            $('#capitalaccount-upload').show();
        }
            else
            {
            $('#capitalaccount-upload').hide();
    }
    });

$(function(){
    $('#change-plstatement').on('click', function(){
       $("#div-plstatement").show();
    });
});
$('#checkbox-plstatement').change(function(){
        if($('#checkbox-plstatement').is(":checked"))
        {
            $('#plstatement-upload').show();
        }
            else
            {
            $('#plstatement-upload').hide();
    }
    });


$(function(){
    $('#change-otherstatement').on('click', function(){
       $("#div-otherstatement").show();
    });
});
$('#checkbox-otherstatement').change(function(){
        if($('#checkbox-otherstatement').is(":checked"))
        {
            $('#otherstatement-upload').show();
        }
            else
            {
            $('#otherstatement-upload').hide();
    }
    });

$(function(){
    $('#change-bankstatement').on('click', function(){
       $("#div-bankstatement").show();
    });
});
$('#checkbox-bankstatement').change(function(){
        if($('#checkbox-bankstatement').is(":checked"))
        {
            $('#bankstatement-upload').show();
        }
            else
            {
            $('#bankstatement-upload').hide();
    }
    });


$(function(){
    $('#change-capitalgains').on('click', function(){
       $("#div-capitalgains").show();
    });
});
$('#checkbox-capitalgains').change(function(){
        if($('#checkbox-capitalgains').is(":checked"))
        {
            $('#capitalgains-upload').show();
        }
            else
            {
            $('#capitalgains-upload').hide();
    }
    });



$(function(){
    $('#change-interest_account').on('click', function(){
       $("#div-interest_account").show();
    });
});
$('#checkbox-interest_account').change(function(){
        if($('#checkbox-interest_account').is(":checked"))
        {
            $('#interest_account-upload').show();
        }
            else
            {
            $('#interest_account-upload').hide();
    }
    });


$(function(){
    $('#change-dividend_account').on('click', function(){
       $("#div-dividend_account").show();
    });
});
$('#checkbox-dividend_account').change(function(){
        if($('#checkbox-dividend_account').is(":checked"))
        {
            $('#dividend_account-upload').show();
        }
            else
            {
            $('#dividend_account-upload').hide();
    }
    });

$(function(){
    $('#change-draft_soi').on('click', function(){
       $("#div-draft_soi").show();
    });
});
$('#checkbox-draft_soi').change(function(){
        if($('#checkbox-draft_soi').is(":checked"))
        {
            $('#draft_soi-upload').show();
        }
            else
            {
            $('#draft_soi-upload').hide();
    }
    });

$(function(){
    $('#change-final_soi').on('click', function(){
       $("#div-final_soi").show();
    });
});
$('#checkbox-final_soi').change(function(){
        if($('#checkbox-final_soi').is(":checked"))
        {
            $('#final_soi-upload').show();
        }
            else
            {
            $('#final_soi-upload').hide();
    }
    });

$(function(){
    $('#change-challan').on('click', function(){
       $("#div-challan").show();
    });
});
$('#checkbox-challan').change(function(){
        if($('#checkbox-challan').is(":checked"))
        {
            $('#challan-upload').show();
        }
            else
            {
            $('#challan-upload').hide();
    }
    });


$(function(){
    $('#change-uploaded_return').on('click', function(){
       $("#div-uploaded_return").show();
    });
});
$('#checkbox-uploaded_return').change(function(){
        if($('#checkbox-uploaded_return').is(":checked"))
        {
            $('#uploaded_return-upload').show();
        }
            else
            {
            $('#uploaded_return-upload').hide();
    }
    });


$(function(){
    $('#change-statutory_audit').on('click', function(){
       $("#div-statutory_audit").show();
    });
});
$('#checkbox-statutory_audit').change(function(){
        if($('#checkbox-statutory_audit').is(":checked"))
        {
            $('#statutory_audit-upload').show();
        }
            else
            {
            $('#statutory_audit-upload').hide();
    }
    });

$(function(){
    $('#change-tax_audit').on('click', function(){
       $("#div-tax_audit").show();
    });
});
$('#checkbox-tax_audit').change(function(){
        if($('#checkbox-tax_audit').is(":checked"))
        {
            $('#tax_audit-upload').show();
        }
            else
            {
            $('#tax_audit-upload').hide();
    }
    });


$(function(){
    $('#change-other_audit').on('click', function(){
       $("#div-other_audit").show();
    });
});
$('#checkbox-other_audit').change(function(){
        if($('#checkbox-other_audit').is(":checked"))
        {
            $('#other_audit-upload').show();
        }
            else
            {
            $('#other_audit-upload').hide();
    }
    });


$(function(){
    $('#change-speed_post').on('click', function(){
       $("#div-speed_post").show();
    });
});
$('#checkbox-speed_post').change(function(){
        if($('#checkbox-speed_post').is(":checked"))
        {
            $('#speed_post-upload').show();
        }
            else
            {
            $('#speed_post-upload').hide();
    }
    });

$(function(){
    $('#change-itr_receipt').on('click', function(){
       $("#div-itr_receipt").show();
    });
});
$('#checkbox-itr_receipt').change(function(){
        if($('#checkbox-itr_receipt').is(":checked"))
        {
            $('#itr_receipt-upload').show();
        }
            else
            {
            $('#itr_receipt-upload').hide();
    }
    });


$(function(){
    $('#change-order_section').on('click', function(){
       $("#div-order_section").show();
    });
});
$('#checkbox-order_section').change(function(){
        if($('#checkbox-order_section').is(":checked"))
        {
            $('#order_section-upload').show();
        }
            else
            {
            $('#order_section-upload').hide();
    }
    });
</script>