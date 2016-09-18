<?php
session_start();
include 'config.php';
$idnum = $_REQUEST['ID'];
$financial_year = $_REQUEST['financial_year'];
$due_date = $_REQUEST['due_date'];
$query = "SELECT * FROM clients WHERE ID = $idnum";
$result = $conn->query($query);
while ( $row = mysqli_fetch_assoc($result))
{
    $cl_name = $row['cl_name'];
}
$rent_address = $_REQUEST['rent_address'];
$rent_income = $_REQUEST['rent_income'];
$agriculture_income = $_REQUEST['agriculture_income'];
$capital_long = $_REQUEST['capital_long'];
$dedu_ppf = $_REQUEST['dedu_ppf'];
$dedu_insurance = $_REQUEST['dedu_insurance'];
$dedu_tuition = $_REQUEST['dedu_tuition'];
$dedu_loan = $_REQUEST['dedu_loan'];
$dedu_donation = $_REQUEST['dedu_donation'];
$dedu_other = $_REQUEST['dedu_other'];
$dedu_mediclaim = $_REQUEST['dedu_mediclaim'];
$soi_prep = $_REQUEST['soi-prep'];
$check = $_REQUEST['check'];
$query1 = "SELECT * FROM itreturns WHERE parent_id = '$idnum' and financial_year='$financial_year'";

$result1 = $conn->query($query1);
while ($row1 = mysqli_fetch_assoc($result1))
{
if($soi_prep != $row1['soi-prep'])
{
date_default_timezone_set('Asia/Kolkata');
$time = date("H:i:s");
$time1 = date("Y-m-d H:i:s",strtotime($time));
$soi_prep_time = $time1;
}
}
//form 16
if(!empty($_FILES["proof_16"]["name"]) or !empty($_FILES["proof_16_change"]["name"]))
{
if(!empty($_FILES["proof_16"]["name"])){
$target_dir = "uploads/incometax/$cl_name/$financial_year/";
$target_file = $target_dir . basename($_FILES["proof_16"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_16"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["proof_16"]["name"]). " has been uploaded.";
    } 
$sql1 = "INSERT INTO itreturns (`proof_16`) VALUES ('$target_file') WHERE parent_id=$idnum AND financial_year='$financial_year'";    
$conn->query($sql1);
}
else
{
    $target_dir1 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file1 = $target_dir1 . basename($_FILES["proof_16_change"]["name"]);
    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["proof_16_change"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["proof_16_change"]["name"]). " has been uploaded.";
    }
$sql2 = "UPDATE `itreturns` SET `proof_16`='$target_file1' WHERE parent_id=$idnum AND financial_year='$financial_year'";    
$conn->query($sql2);
    
    }
}

//form 16a
if(!empty($_FILES["proof_16a"]["name"]) or !empty($_FILES["proof_16a_change"]["name"]))
{
if(!empty($_FILES["proof_16a"]["name"])){
$target_dir2 = "uploads/incometax/$cl_name/$financial_year/";
$target_file2 = $target_dir2 . basename($_FILES["proof_16a"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_16a"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["proof_16a"]["name"]). " has been uploaded.";
    }
    $sql3 = "UPDATE `itreturns` SET `proof_16a`='$target_file2' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql3);
}
}
else
{
//form 16a change
if(!empty($_FILES["proof_16a_change"]["name"])) 
{
    $target_dir3 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file3 = $target_dir3 . basename($_FILES["proof_16a_change"]["name"]);
    $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["proof_16a_change"]["tmp_name"], $target_file3)) {
        echo "The file ". basename( $_FILES["proof_16a_change"]["name"]). " has been uploaded.";
    }
$sql4 = "UPDATE `itreturns` SET `proof_16a`='$target_file3' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql4);    
}
}

//form 26as
if(!empty($_FILES["proof_26as"]["name"]) or !empty($_FILES["proof_26as_change"]["name"]))
{
if(!empty($_FILES["proof_26as"]["name"])){
$target_dir4 = "uploads/incometax/$cl_name/$financial_year/";
$target_file4 = $target_dir4 . basename($_FILES["proof_26as"]["name"]);
$imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_26as"]["tmp_name"], $target_file4)) {
        echo "The file ". basename( $_FILES["proof_26as"]["name"]). " has been uploaded.";
    } 
$sql5 = "UPDATE `itreturns` SET `proof_26as`='$target_file4' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql5);       
}
}
 else {
//form 26as change
if(!empty($_FILES["proof_26as_change"]["name"])) 
{
    $target_dir5 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file5 = $target_dir5 . basename($_FILES["proof_26as_change"]["name"]);
    $imageFileType5 = pathinfo($target_file5,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["proof_26as_change"]["tmp_name"], $target_file5)) {
        echo "The file ". basename( $_FILES["proof_26as_change"]["name"]). " has been uploaded.";
    }
    $sql6 = "UPDATE `itreturns` SET `proof_26as`='$target_file5' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql6);    
}
 }
//Partnership deed
if(!empty($_FILES["partner_deed"]["name"]) or !empty($_FILES["partner_deed_change"]["name"]))
{
 if(!empty($_FILES["partner_deed"]["name"])){
$target_dir6 = "uploads/incometax/$cl_name/$financial_year/";
$target_file6 = $target_dir6 . basename($_FILES["partner_deed"]["name"]);
$imageFileType6 = pathinfo($target_file6,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["partner_deed"]["tmp_name"], $target_file6)) {
        echo "The file ". basename( $_FILES["partner_deed"]["name"]). " has been uploaded.";
    }

$sql7 = "UPDATE `itreturns` SET `partner_deed`='$target_file6' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql7);    
}
}
else
{
//Partnership deed change
if(!empty($_FILES["partner_deed_change"]["name"])) 
{
    $target_dir7 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file7 = $target_dir7 . basename($_FILES["partner_deed_change"]["name"]);
    $imageFileType7 = pathinfo($target_file7,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["partner_deed_change"]["tmp_name"], $target_file7)) {
        echo "The file ". basename( $_FILES["partner_deed_change"]["name"]). " has been uploaded.";
    }
$sql8 = "UPDATE `itreturns` SET `partner_deed`='$target_file7' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql8);    
}   
}


//Agriculture Profit and loss statement
if(!empty($_FILES["agriculture_pl_statement"]["name"]) or !empty($_FILES["agriculture_pl_statement_change"]["name"]))
{
if(!empty($_FILES["agriculture_pl_statement"]["name"])){
$target_dir8 = "uploads/incometax/$cl_name/$financial_year/";
$target_file8 = $target_dir8 . basename($_FILES["agriculture_pl_statement"]["name"]);
$imageFileType8 = pathinfo($target_file8,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["agriculture_pl_statement"]["tmp_name"], $target_file8)) {
        echo "The file ". basename( $_FILES["agriculture_pl_statement"]["name"]). " has been uploaded.";
    } 
    $sql9 = "UPDATE `itreturns` SET `agriculture_pl_statement`='$target_file8' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql9);
}
}
//Agriculture Profit and loss statement change
else
    {
if(!empty($_FILES["agriculture_pl_statement_change"]["name"])) 
{
    $target_dir9 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file9 = $target_dir9 . basename($_FILES["agriculture_pl_statement_change"]["name"]);
    $imageFileType9 = pathinfo($target_file9,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["agriculture_pl_statement_change"]["tmp_name"], $target_file9)) {
        echo "The file ". basename( $_FILES["agriculture_pl_statement_change"]["name"]). " has been uploaded.";
    }
    $sql10 = "UPDATE `itreturns` SET `agriculture_pl_statement`='$target_file9' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql10);
}
}
//balancesheet
if(!empty($_FILES["balancesheet"]["name"]) or !empty($_FILES["balancesheet_change"]["name"]))
{
if(!empty($_FILES["balancesheet"]["name"])){
$target_dir10 = "uploads/incometax/$cl_name/$financial_year/";
$target_file10 = $target_dir10 . basename($_FILES["balancesheet"]["name"]);
$imageFileType10 = pathinfo($target_file10,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["balancesheet"]["tmp_name"], $target_file10)) {
        echo "The file ". basename( $_FILES["balancesheet"]["name"]). " has been uploaded.";
    }
    $sqll1 = "UPDATE `itreturns` SET `balancesheet`='$target_file10' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll1);
}
}
//balancesheet change
else
{
if(!empty($_FILES["balancesheet_change"]["name"])) 
{
    $target_dir11 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file11 = $target_dir11 . basename($_FILES["balancesheet_change"]["name"]);
    $imageFileType11 = pathinfo($target_file11,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["balancesheet_change"]["tmp_name"], $target_file11)) {
        echo "The file ". basename( $_FILES["balancesheet_change"]["name"]). " has been uploaded.";
    }
$sqll2 = "UPDATE `itreturns` SET `balancesheet`='$target_file11' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll2);
    
    }
}

//capitalaccount
if(!empty($_FILES["capitalaccount"]["name"]) or !empty($_FILES["capitalaccount_change"]["name"]))
{
if(!empty($_FILES["capitalaccount"]["name"])){
$target_dir12 = "uploads/incometax/$cl_name/$financial_year/";
$target_file12 = $target_dir12 . basename($_FILES["capitalaccount"]["name"]);
$imageFileType12 = pathinfo($target_file12,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["capitalaccount"]["tmp_name"], $target_file12)) {
        echo "The file ". basename( $_FILES["capitalaccount"]["name"]). " has been uploaded.";
    }
    $sqll3 = "UPDATE `itreturns` SET `capitalaccount`='$target_file12' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll3);
}
}
//capitalaccount change
else
    {
    if(!empty($_FILES["capitalaccount_change"]["name"])) 
{
    $target_dir13 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file13 = $target_dir13 . basename($_FILES["capitalaccount_change"]["name"]);
    $imageFileType13 = pathinfo($target_file13,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["capitalaccount_change"]["tmp_name"], $target_file13)) {
        echo "The file ". basename( $_FILES["capitalaccount_change"]["name"]). " has been uploaded.";
    }
    $sqll4 = "UPDATE `itreturns` SET `capitalaccount`='$target_file13' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll4);
}
    }    
    
//plstatement
if(!empty($_FILES["plstatement"]["name"]) or !empty($_FILES["plstatement_change"]["name"]))
{
    if(!empty($_FILES["plstatement"]["name"])){
$target_dir14 = "uploads/incometax/$cl_name/$financial_year/";
$target_file14 = $target_dir14 . basename($_FILES["plstatement"]["name"]);
$imageFileType14 = pathinfo($target_file14,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["plstatement"]["tmp_name"], $target_file14)) {
        echo "The file ". basename( $_FILES["plstatement"]["name"]). " has been uploaded.";
    } 
    $sqll5 = "UPDATE `itreturns` SET `plstatement`='$target_file14' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll5);
}
}
//plstatement change
else {    
if(!empty($_FILES["plstatement_change"]["name"])) 
{
    $target_dir15 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file15 = $target_dir15 . basename($_FILES["plstatement_change"]["name"]);
    $imageFileType15 = pathinfo($target_file15,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["plstatement_change"]["tmp_name"], $target_file15)) {
        echo "The file ". basename( $_FILES["plstatement_change"]["name"]). " has been uploaded.";
    }
    $sqll6 = "UPDATE `itreturns` SET `plstatement`='$target_file15' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll6);
}    

    }
    
//otherstatement
if(!empty($_FILES["otherstatement"]["name"]) or !empty($_FILES["otherstatement_change"]["name"]))
{
if(!empty($_FILES["otherstatement"]["name"])){
$target_dir16 = "uploads/incometax/$cl_name/$financial_year/";
$target_file16 = $target_dir16 . basename($_FILES["otherstatement"]["name"]);
$imageFileType16 = pathinfo($target_file16,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["otherstatement"]["tmp_name"], $target_file16)) {
        echo "The file ". basename( $_FILES["otherstatement"]["name"]). " has been uploaded.";
    }
    $sqll7 = "UPDATE `itreturns` SET `otherstatement`='$target_file16' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll7);
}
}
//otherstatement change
else
{
if(!empty($_FILES["otherstatement_change"]["name"])) 
{
    $target_dir17 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file17 = $target_dir17 . basename($_FILES["otherstatement_change"]["name"]);
    $imageFileType17 = pathinfo($target_file17,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["otherstatement_change"]["tmp_name"], $target_file17)) {
        echo "The file ". basename( $_FILES["otherstatement_change"]["name"]). " has been uploaded.";
    }
    $sqll8 = "UPDATE `itreturns` SET `otherstatement`='$target_file17' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll8);
}    
}   
    
//bankstatement
if(!empty($_FILES["bankstatement"]["name"]) or !empty($_FILES["bankstatement_change"]["name"]))
{
if(!empty($_FILES["bankstatement"]["name"])){
$target_dir18 = "uploads/incometax/$cl_name/$financial_year/";
$target_file18 = $target_dir18 . basename($_FILES["bankstatement"]["name"]);
$imageFileType18 = pathinfo($target_file18,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["bankstatement"]["tmp_name"], $target_file18)) {
        echo "The file ". basename( $_FILES["bankstatement"]["name"]). " has been uploaded.";
    } 
    $sqll9 = "UPDATE `itreturns` SET `bankstatement`='$target_file18' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sqll9);
}
}
//bankstatement change
else
    {
if(!empty($_FILES["bankstatement_change"]["name"])) 
{
    $target_dir19 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file19 = $target_dir19 . basename($_FILES["bankstatement_change"]["name"]);
    $imageFileType19 = pathinfo($target_file19,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["bankstatement_change"]["tmp_name"], $target_file19)) {
        echo "The file ". basename( $_FILES["bankstatement_change"]["name"]). " has been uploaded.";
    }
    $sql20 = "UPDATE `itreturns` SET `bankstatement`='$target_file19' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql20);
    
}
    }

//capitalgains
if(!empty($_FILES["capitalgains"]["name"]) or !empty($_FILES["capitalgains_change"]["name"]))
{
if(!empty($_FILES["capitalgains"]["name"])){
$target_dir20 = "uploads/incometax/$cl_name/$financial_year/";
$target_file20 = $target_dir20 . basename($_FILES["capitalgains"]["name"]);
$imageFileType20 = pathinfo($target_file20,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["capitalgains"]["tmp_name"], $target_file20)) {
        echo "The file ". basename( $_FILES["capitalgains"]["name"]). " has been uploaded.";
    } 
    $sql21 = "UPDATE `itreturns` SET `capitalgains`='$target_file20' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql21);
}
}
//capitalgains change
else
{
if(!empty($_FILES["capitalgains_change"]["name"])) 
{
    $target_dir21 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file21 = $target_dir21 . basename($_FILES["capitalgains_change"]["name"]);
    $imageFileType21 = pathinfo($target_file21,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["capitalgains_change"]["tmp_name"], $target_file21)) {
        echo "The file ". basename( $_FILES["capitalgains_change"]["name"]). " has been uploaded.";
    }
    $sql22 = "UPDATE `itreturns` SET `capitalgains`='$target_file21' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql22);
}
}

//interest_account
if(!empty($_FILES["interest_account"]["name"]) or !empty($_FILES["interest_account_change"]["name"]))
{
if(!empty($_FILES["interest_account"]["name"])){
$target_dir22 = "uploads/incometax/$cl_name/$financial_year/";
$target_file22 = $target_dir22 . basename($_FILES["interest_account"]["name"]);
$imageFileType22 = pathinfo($target_file22,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["interest_account"]["tmp_name"], $target_file22)) {
        echo "The file ". basename( $_FILES["interest_account"]["name"]). " has been uploaded.";
    }
    $sql23 = "UPDATE `itreturns` SET `interest_account`='$target_file22' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql23);
}
}
//interest_account change
else
    {
if(!empty($_FILES["interest_account_change"]["name"])) 
{
    $target_dir23 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file23 = $target_dir23 . basename($_FILES["interest_account_change"]["name"]);
    $imageFileType23 = pathinfo($target_file23,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["interest_account_change"]["tmp_name"], $target_file23)) {
        echo "The file ". basename( $_FILES["interest_account_change"]["name"]). " has been uploaded.";
    }
    $sql24 = "UPDATE `itreturns` SET `interest_account`='$target_file23' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql24);
}
    }


//dividend_account
if(!empty($_FILES["dividend_account"]["name"]) or !empty($_FILES["dividend_account_change"]["name"]))
{
if(!empty($_FILES["dividend_account"]["name"])){
$target_dir24 = "uploads/incometax/$cl_name/$financial_year/";
$target_file24 = $target_dir24 . basename($_FILES["dividend_account"]["name"]);
$imageFileType24 = pathinfo($target_file24,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["dividend_account"]["tmp_name"], $target_file24)) {
        echo "The file ". basename( $_FILES["dividend_account"]["name"]). " has been uploaded.";
    } 
    $sql25 = "UPDATE `itreturns` SET `dividend_account`='$target_file24' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql25);
}
}
//dividend_account change
else
{
if(!empty($_FILES["dividend_account_change"]["name"])) 
{
    $target_dir25 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file25 = $target_dir25 . basename($_FILES["dividend_account_change"]["name"]);
    $imageFileType25 = pathinfo($target_file25,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["dividend_account_change"]["tmp_name"], $target_file25)) {
        echo "The file ". basename( $_FILES["dividend_account_change"]["name"]). " has been uploaded.";
    }
    $sql26 = "UPDATE `itreturns` SET `dividend_account`='$target_file25' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql26);
}
}

//draft_soi
if(!empty($_FILES["draft_soi"]["name"]) or !empty($_FILES["draft_soi_change"]["name"]))
{
if(!empty($_FILES["draft_soi"]["name"])){
$target_dir26 = "uploads/incometax/$cl_name/$financial_year/";
$target_file26 = $target_dir26 . basename($_FILES["draft_soi"]["name"]);
$imageFileType26 = pathinfo($target_file26,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["draft_soi"]["tmp_name"], $target_file26)) {
        echo "The file ". basename( $_FILES["draft_soi"]["name"]). " has been uploaded.";
    } 
    $sql27 = "UPDATE `itreturns` SET `draft_soi`='$target_file26' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql27);
}
}
//draft_soi change
else
{
if(!empty($_FILES["draft_soi_change"]["name"])) 
{
    $target_dir27 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file27 = $target_dir27 . basename($_FILES["draft_soi_change"]["name"]);
    $imageFileType27 = pathinfo($target_file27,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["draft_soi_change"]["tmp_name"], $target_file27)) {
        echo "The file ". basename( $_FILES["draft_soi_change"]["name"]). " has been uploaded.";
    }
    $sql28 = "UPDATE `itreturns` SET `draft_soi`='$target_file27' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql28);
}
}

//final_soi
if(!empty($_FILES["final_soi"]["name"]) or !empty($_FILES["final_soi_change"]["name"]))
{
if(!empty($_FILES["final_soi"]["name"])){
$target_dir28 = "uploads/incometax/$cl_name/$financial_year/";
$target_file28 = $target_dir28 . basename($_FILES["final_soi"]["name"]);
$imageFileType28 = pathinfo($target_file28,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["final_soi"]["tmp_name"], $target_file28)) {
        echo "The file ". basename( $_FILES["final_soi"]["name"]). " has been uploaded.";
    } 
    $sql29 = "UPDATE `itreturns` SET `final_soi`='$target_file28' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql29);
}
}
//final_soi change
else {
if(!empty($_FILES["final_soi_change"]["name"])) 
{
    $target_dir29 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file29 = $target_dir29 . basename($_FILES["final_soi_change"]["name"]);
    $imageFileType29 = pathinfo($target_file29,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["final_soi_change"]["tmp_name"], $target_file29)) {
        echo "The file ". basename( $_FILES["final_soi_change"]["name"]). " has been uploaded.";
    }
    $sql30 = "UPDATE `itreturns` SET `final_soi`='$target_file29' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql30);
}
}

//uploaded_return
if(!empty($_FILES["uploaded_return"]["name"]) or !empty($_FILES["uploaded_return_change"]["name"]))
{
if(!empty($_FILES["uploaded_return"]["name"])){
$target_dir30 = "uploads/incometax/$cl_name/$financial_year/";
$target_file30 = $target_dir30 . basename($_FILES["uploaded_return"]["name"]);
$imageFileType30 = pathinfo($target_file30,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["uploaded_return"]["tmp_name"], $target_file30)) {
        echo "The file ". basename( $_FILES["uploaded_return"]["name"]). " has been uploaded.";
    } 
    $sql31 = "UPDATE `itreturns` SET `uploaded_return`='$target_file30' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql31);
}
}
//uploaded_return change
else
{
if(!empty($_FILES["uploaded_return_change"]["name"])) 
{
    $target_dir31 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file31 = $target_dir31 . basename($_FILES["uploaded_return_change"]["name"]);
    $imageFileType31 = pathinfo($target_file31,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["uploaded_return_change"]["tmp_name"], $target_file31)) {
        echo "The file ". basename( $_FILES["uploaded_return_change"]["name"]). " has been uploaded.";
    }
    $sql32 = "UPDATE `itreturns` SET `uploaded_return`='$target_file31' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql32);
}
}


//tax_audit
if(!empty($_FILES["tax_audit"]["name"]) or !empty($_FILES["tax_audit_change"]["name"]))
{
if(!empty($_FILES["tax_audit"]["name"])){
$target_dir32 = "uploads/incometax/$cl_name/$financial_year/";
$target_file32 = $target_dir32 . basename($_FILES["tax_audit"]["name"]);
$imageFileType32 = pathinfo($target_file32,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["tax_audit"]["tmp_name"], $target_file32)) {
        echo "The file ". basename( $_FILES["tax_audit"]["name"]). " has been uploaded.";
    } 
    $sql33 = "UPDATE `itreturns` SET `tax_audit`='$target_file32' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql33);
}
}
//tax_audit change
else {
if(!empty($_FILES["tax_audit_change"]["name"])) 
{
    $target_dir33 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file33 = $target_dir33 . basename($_FILES["tax_audit_change"]["name"]);
    $imageFileType33 = pathinfo($target_file33,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["tax_audit_change"]["tmp_name"], $target_file33)) {
        echo "The file ". basename( $_FILES["tax_audit_change"]["name"]). " has been uploaded.";
    }
    $sql34 = "UPDATE `itreturns` SET `tax_audit`='$target_file33' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql34);
}
}

//statutory_audit
if(!empty($_FILES["statutory_audit"]["name"]) or !empty($_FILES["statutory_audit_change"]["name"]))
{
if(!empty($_FILES["statutory_audit"]["name"])){
$target_dir34 = "uploads/incometax/$cl_name/$financial_year/";
$target_file34 = $target_dir34 . basename($_FILES["statutory_audit"]["name"]);
$imageFileType34 = pathinfo($target_file34,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["statutory_audit"]["tmp_name"], $target_file34)) {
        echo "The file ". basename( $_FILES["statutory_audit"]["name"]). " has been uploaded.";
    } 
    $sql35 = "UPDATE `itreturns` SET `statutory_audit`='$target_file34' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql35);
}
}
//statutory_audit change
else
{
if(!empty($_FILES["statutory_audit_change"]["name"])) 
{
    $target_dir35 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file35 = $target_dir35 . basename($_FILES["statutory_audit_change"]["name"]);
    $imageFileType35 = pathinfo($target_file35,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["statutory_audit_change"]["tmp_name"], $target_file35)) {
        echo "The file ". basename( $_FILES["statutory_audit_change"]["name"]). " has been uploaded.";
    }
    $sql36 = "UPDATE `itreturns` SET `statutory_audit`='$target_file35' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql36);
}
}

//other_audit
if(!empty($_FILES["other_audit"]["name"]) or !empty($_FILES["other_audit_change"]["name"]))
{
if(!empty($_FILES["other_audit"]["name"])){
$target_dir36 = "uploads/incometax/$cl_name/$financial_year/";
$target_file36 = $target_dir36 . basename($_FILES["other_audit"]["name"]);
$imageFileType36 = pathinfo($target_file36,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["other_audit"]["tmp_name"], $target_file36)) {
        echo "The file ". basename( $_FILES["other_audit"]["name"]). " has been uploaded.";
    } 
    $sql37 = "UPDATE `itreturns` SET `other_audit`='$target_file36' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql37);
}
}
//other_audit change
else {
if(!empty($_FILES["other_audit_change"]["name"])) 
{
    $target_dir37 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file37 = $target_dir37 . basename($_FILES["other_audit_change"]["name"]);
    $imageFileType37 = pathinfo($target_file37,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["other_audit_change"]["tmp_name"], $target_file37)) {
        echo "The file ". basename( $_FILES["other_audit_change"]["name"]). " has been uploaded.";
    }
    $sql38 = "UPDATE `itreturns` SET `other_audit`='$target_file37' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql38);
}
}

//speed_post
if(!empty($_FILES["speed_post"]["name"]) or !empty($_FILES["speed_post_change"]["name"]))
{
if(!empty($_FILES["speed_post"]["name"])){
$target_dir38 = "uploads/incometax/$cl_name/$financial_year/";
$target_file38 = $target_dir38 . basename($_FILES["speed_post"]["name"]);
$imageFileType38 = pathinfo($target_file38,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["speed_post"]["tmp_name"], $target_file38)) {
        echo "The file ". basename( $_FILES["speed_post"]["name"]). " has been uploaded.";
    } 
    $sql39 = "UPDATE `itreturns` SET `speed_post`='$target_file38' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql39);
}
}
//speed_post change
else {
if(!empty($_FILES["speed_post_change"]["name"])) 
{
    $target_dir39 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file39 = $target_dir39 . basename($_FILES["speed_post_change"]["name"]);
    $imageFileType39 = pathinfo($target_file39,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["speed_post_change"]["tmp_name"], $target_file39)) {
        echo "The file ". basename( $_FILES["speed_post_change"]["name"]). " has been uploaded.";
    }
    $sql40 = "UPDATE `itreturns` SET `speed_post`='$target_file39' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql40);
}
}

//order_section
if(!empty($_FILES["order_section"]["name"]) or !empty($_FILES["order_section_change"]["name"]))
{
if(!empty($_FILES["order_section"]["name"])){
$target_dir40 = "uploads/incometax/$cl_name/$financial_year/";
$target_file40 = $target_dir40 . basename($_FILES["order_section"]["name"]);
$imageFileType40 = pathinfo($target_file40,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["order_section"]["tmp_name"], $target_file40)) {
        echo "The file ". basename( $_FILES["order_section"]["name"]). " has been uploaded.";
    } 
    $sql41 = "UPDATE `itreturns` SET `order_section`='$target_file40' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql41);
}
}
//order_section change
else
{
if(!empty($_FILES["order_section_change"]["name"])) 
{
    $target_dir41 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file41 = $target_dir41 . basename($_FILES["order_section_change"]["name"]);
    $imageFileType41 = pathinfo($target_file41,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["order_section_change"]["tmp_name"], $target_file41)) {
        echo "The file ". basename( $_FILES["order_section_change"]["name"]). " has been uploaded.";
    }
    $sql42 = "UPDATE `itreturns` SET `order_section`='$target_file41' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql42);
}
}

//challan
if(!empty($_FILES["challan"]["name"]) or !empty($_FILES["challan_change"]["name"]))
{
if(!empty($_FILES["challan"]["name"])){
$target_dir42 = "uploads/incometax/$cl_name/$financial_year/";
$target_file42 = $target_dir42 . basename($_FILES["challan"]["name"]);
$imageFileType42 = pathinfo($target_file42,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["challan"]["tmp_name"], $target_file42)) {
        echo "The file ". basename( $_FILES["challan"]["name"]). " has been uploaded.";
    }
    $sql43 = "UPDATE `itreturns` SET `challan`='$target_file42' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql43);
}
}

//challan change
else {
if(!empty($_FILES["challan_change"]["name"])) 
{
    $target_dir43 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file43 = $target_dir43 . basename($_FILES["challan_change"]["name"]);
    $imageFileType43 = pathinfo($target_file43,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["challan_change"]["tmp_name"], $target_file43)) {
        echo "The file ". basename( $_FILES["challan_change"]["name"]). " has been uploaded.";
    }
    $sql44 = "UPDATE `itreturns` SET `challan`='$target_file43' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql44);
}
}

//itr_receipt
if(!empty($_FILES["itr_receipt"]["name"]) or !empty($_FILES["itr_receipt_change"]["name"]))
{
if(!empty($_FILES["itr_receipt"]["name"])){
$target_dir44 = "uploads/incometax/$cl_name/$financial_year/";
$target_file44 = $target_dir44 . basename($_FILES["itr_receipt"]["name"]);
$imageFileType44 = pathinfo($target_file44,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["itr_receipt"]["tmp_name"], $target_file44)) {
        echo "The file ". basename( $_FILES["itr_receipt"]["name"]). " has been uploaded.";
    } 
    $sql45 = "UPDATE `itreturns` SET `itr_receipt`='$target_file44' WHERE parent_id='$idnum' AND financial_year='$financial_year'";    
$conn->query($sql45);
}
}
//challan change
else
{
if(!empty($_FILES["itr_receipt_change"]["name"])) 
{
    $target_dir45 = "uploads/incometax/$cl_name/$financial_year/";
    $target_file45 = $target_dir45 . basename($_FILES["itr_receipt_change"]["name"]);
    $imageFileType45 = pathinfo($target_file45,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["itr_receipt_change"]["tmp_name"], $target_file45)) {
        echo "The file ". basename( $_FILES["itr_receipt_change"]["name"]). " has been uploaded.";
    }
    $sql46 = "UPDATE `itreturns` SET `itr_receipt`='$target_file45' WHERE parent_id='$idnum' AND financial_year='$financial_year' ";    
$conn->query($sql46);
}
}


$sql =  "UPDATE `itreturns` SET `due_date`='$due_date',`rent_address`='$rent_address',`rent_income`='$rent_income',`agriculture_income`='$agriculture_income',"
        . "`capital_long`='$capital_long',`dedu_ppf`='$dedu_ppf',`dedu_mediclaim`='$dedu_mediclaim',`dedu_insurance`='$dedu_insurance',"
        . "`dedu_tuition`='$dedu_tuition',`dedu_loan`='$dedu_loan',`dedu_donation`='$dedu_donation',`dedu_other`='$dedu_other',`soi-prep`='$soi_prep', `soi-prep-time`='$soi_prep_time', `check`='$check' WHERE parent_id='$idnum' AND financial_year='$financial_year'";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.location = 'http://$servername/dgsm1/portal/itaxreturns.php?ID=$idnum' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
