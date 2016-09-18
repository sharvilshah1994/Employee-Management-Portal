<?php
    include 'config.php';
    $ID = $_REQUEST['ID'];
    $financial_year = $_REQUEST['financial_year'];
    $query = "SELECT * FROM itreturns WHERE parent_id='$ID' AND financial_year='$financial_year' ";
    
    $result = $conn->query($query);
    while ($row = mysqli_fetch_assoc($result))
    {
    ?>
<br>
<label>Due Date:</label>
<?php echo $row['due_date'];
echo '<br>';
?>

<?php
if(!empty($row['proof_16']))
{    ?>
<label>Form 16 - Received : Yes</label>&nbsp;
<a href="<?php echo $row['proof_16'];?>" >View Form 16</a>
<br>
    <?php
}
?>

<?php
if(!empty($row['proof_16a']))
{    ?>
<label>Form 16a - Received : Yes</label>&nbsp;
<a href="<?php echo $row['proof_16a'];?>" >View Form 16a</a>
<br>
    <?php
}
?>

<?php
if(!empty($row['proof_26as']))
{    ?>
<label>Form 26as - Received : Yes</label>&nbsp;
<a href="<?php echo $row['proof_26as'];?>" >View Form 26-AS</a>
<br>
    <?php
}
?>

<?php
if(!empty($row['rent_address']))
{    ?>

<label>Property on rent: Yes</label>&nbsp;
<br>
<label>Rented Property Address: &nbsp;</label>
<?php echo $row['rent_address'];?>
<br>
<label>Rented Property Income:</label>&nbsp;
<?php echo $row['rent_income'];?>
<br>
<?php
}
?>


<?php
if(!empty($row['agriculture_income']))
{    ?>
<label>Client having Agriculture Income: Yes</label>&nbsp;
<label>Agriculture Income: &nbsp;</label>
<?php echo $row['agriculture_income'];?>
<a href="<?php echo $row['agriculture_pl_statement'];?>" >View Statement</a>
<br>
    <?php
}
?>


<?php
if(!empty($row['plstatement']) && empty($row['capitalaccount']) && empty($row['balancesheet']))
{    ?>
<label>Profit and Loss Statement - </label>
<a href="<?php echo $row['plstatement'];?>" >View</a><br>
<label>Capital Account Statement - </label>
<a href="<?php echo $row['capitalaccount'];?>" >View</a><br>
<label>Balance Sheet - </label>
<a href="<?php echo $row['balancesheet'];?>" >View</a>
    <?php
}?>
 
    <?php
if(!empty($row['bankstatement']))
{
?>
<label>Client is maintaining Books of Records-</label>
<a href="<?php echo $row['bankstatement']?>" >View Records</a>
<?php }
?>
<?php
if(!empty($row['otherstatement']))
{    ?>
<br>
<label>Any other major statement</label>&nbsp;
<a href="<?php echo $row['otherstatement'];?>" >View Statement</a>
<br>
<?php
}
?>


<?php
if(!empty($row['captialgains']))
{    ?>
<label>Capital Gains Excel Sheet</label>&nbsp;
<a href="<?php echo $row['capital Gains'];?>" >View</a>
<label>Long Term Capital Gain (in INR):</label>&nbsp;
<br>
    <?php echo $row['capital_long']?>
<?php
}
?>


<?php
if(!empty($row['interest_account']))
{    ?>
<label>Interest Account:</label>&nbsp;
<a href="<?php echo $row['interest_account'];?>">View</a>
<br>
    <?php
}
?>


<?php
if(!empty($row['dividend_account']))
{    ?>
<label>Dividend Account:</label>&nbsp;
<a href="<?php echo $row['dividend_account'];?>" >View</a>
<?php
}
?>

<?php
if(!empty($row['dedu_ppf']) && !empty($row['dedu_insurance']) && !empty($row['dedu_tuition']) && !empty($row['dedu_loan']) && !empty($row['dedu_donation']) && !empty($row['dedu_other']) )
{
?>
<label>Deduction and Donation Details:</label>
<?php
}?>
<br>
<?php 
if (!empty($row['dedu_ppf']))
{?>
<label>PPF: Rs.</label>
<?php echo $row['dedu_ppf']; ?>
<br>
<?php    
}?>


<?php 
if (!empty($row['dedu_mediclaim']))
{?>
<label>Mediclaim: Rs.</label>
<?php echo $row['dedu_mediclaim']; ?>
<br>
<?php    
}?>


<?php 
if (!empty($row['dedu_insurance']))
{?>
<label>Insurance: Rs.</label>
<?php echo $row['dedu_insurance']; ?>
<br>
<?php    
}?>


<?php 
if (!empty($row['dedu_tuition']))
{?>
<label>Children Tuition: Rs.</label>
<?php echo $row['dedu_tuition']; ?>
<br>
    <?php    
}?>


<?php 
if (!empty($row['dedu_loan']))
{?>
<label>Housing Loan EMI: Rs.</label>
<?php echo $row['dedu_loan']; ?>
<br>
    <?php    
}?>


<?php 
if (!empty($row['dedu_donation']))
{?>
<label>Donation: Rs.</label>
<?php echo $row['dedu_donation']; ?>
<br>
    <?php    
}?>


<?php 
if (!empty($row['dedu_other']))
{?>
<label>Any Other Deduction: </label>
<?php echo $row['dedu_other']; ?>
<br>
    <?php    
}?>

<?php 
if (!empty($row['draft_soi']))
{?>
<label>Draft Statement of income prepared - </label>
<a href="<?php echo $row['draft_soi'];?>" >View</a>
<br>
<label>SOI Prepared By - <?php echo $name = $row['soi-prep'];?></label>
<?php 
$time3 = $row['soi-prep-time'];
if(!empty($name) and $time3 != '0000-00-00 00:00:00')
{
    echo $time3;
}
?>
<br>
<?php 

echo $row['check'];?>
<br>
    <?php    
}
elseif (!empty($row['final_soi']))
{
    ?>
<label>Final Statement of income prepared - </label>
<a href="<?php echo $row['final_soi'];?>" >View</a>



<br>
<label>SOI Prepared By- <?php echo $name = $row['soi-prep'];?></label>
<?php 
$time3 = $row['soi-prep-time'];
if(!empty($name) and $time3 != '0000-00-00 00:00:00')
{
    echo $time3;
}
?>
<br>
<?php echo $row['check'];?>
<br>
    <?php    
}
?>

<?php 
if (!empty($row['challan']))
{?>
<label>Tax Challan - </label>
<a href="<?php echo $row['challan'];?>" >View</a>
<br>
    <?php    
}?>

<?php 
if (!empty($row['uploaded_return']))
{?>
<label>Final return prepared and uploaded - </label>
<a href="<?php echo $row['uploaded_return'];?>" >View</a>
<br>
    <?php
}
else
    {
    ?>
<label>Return Not Uploaded Yet</label>
<br>
    <?php

}?>

<?php 
if (!empty($row['tax_audit']))
{?>
<label>Uploaded Tax Audit Report - </label>
<a href="<?php echo $row['tax_audit'];?>" >View</a>
<br>
    <?php
}
?>

    <?php 
if (!empty($row['statutory_audit']))
{?>
<label>Uploaded Statutory Audit Report - </label>
<a href="<?php echo $row['statutoy_audit'];?>" >View</a>
<br>
    <?php
}
?>

<?php 
if (!empty($row['other_audit']))
{?>
<label>Any other Audit Report Uploaded - </label>
<a href="<?php echo $row['other_audit'];?>" >View</a>
<br>
    <?php
}
?>

<?php 
if (!empty($row['speed_post']))
{?>
<label>Return sent to Banglore via speed post - </label>
<a href="<?php echo $row['speed_post'];?>" >View Receipt</a>
<br>
<?php
}
?>

<?php 
if (!empty($row['itr_receipt']))
{?>
<label>Return received at Banglore CPC - </label>
<a href="<?php echo $row['itr_receipt'];?>" >View Receipt</a>
<br>
<?php
}
?>



<?php 
if (!empty($row['order_section']))
{?>
<label>Order under Section 143(1) received - </label>
<a href="<?php echo $row['order_section'];?>" >View</a>
<br>
    <?php
}
?>


    
    
    <?php
    }
    ?>