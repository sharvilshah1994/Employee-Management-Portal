<?php
session_start();
include 'config.php';
$due_date = $_REQUEST['due_date'];
$ID = $_REQUEST['ID'];
$query = "SELECT * FROM clients WHERE ID = $ID";
$result = $conn->query($query);
while ( $row = mysqli_fetch_assoc($result))
{
    $cl_name = $row['cl_name'];
}
$financial_year = $_REQUEST['financial_year'];
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

date_default_timezone_set('Asia/Kolkata');
    $time = date("H:i:s");
    $time1 = date("Y-m-d H:i:s",strtotime($time));
$soi_prep_time = $time1;
if (!file_exists("uploads/incometax/$cl_name/$financial_year")) {
    mkdir("uploads/incometax/$cl_name/$financial_year", 0777, true);
}

//form 16
if(!empty($_FILES["proof_16"]["name"])){
$target_dir = "uploads/incometax/$cl_name/$financial_year/";
$target_file = $target_dir . basename($_FILES["proof_16"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_16"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["proof_16"]["name"]). " has been uploaded.";
    } else {
        
    }
}
//form 16a
if(!empty($_FILES["proof_16a"]["name"])){
$target_dir1 = "uploads/incometax/$cl_name/$financial_year/";
$target_file1 = $target_dir1 . basename($_FILES["proof_16a"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_16a"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["proof_16a"]["name"]). " has been uploaded.";
    } else {
        
    }    
}
//form 26as
if(!empty($_FILES["proof_26as"]["name"])){
$target_dir2 = "uploads/incometax/$cl_name/$financial_year/";
$target_file2 = $target_dir2 . basename($_FILES["proof_26as"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["proof_26as"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["proof_26as"]["name"]). " has been uploaded.";
    } else {
       
    }
}
//partner deed
if(!empty($_FILES["partner_deed"]["name"])){
$target_dir3 = "uploads/incometax/$cl_name/$financial_year/";
$target_file3 = $target_dir3 . basename($_FILES["partner_deed"]["name"]);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["partner_deed"]["tmp_name"], $target_file3)) {
        echo "The file ". basename( $_FILES["partner_deed"]["name"]). " has been uploaded.";
    } else {
        
    }    
}
//agriculture_pl_statement
if(!empty($_FILES["agriculture_pl_statement"]["name"])){
$target_dir4 = "uploads/incometax/$cl_name/$financial_year/";
$target_file4 = $target_dir4 . basename($_FILES["agriculture_pl_statement"]["name"]);
$imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["agriculture_pl_statement"]["tmp_name"], $target_file4)) {
        echo "The file ". basename( $_FILES["agriculture_pl_statement"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//plstatement
if(!empty($_FILES["plstatement"]["name"]))
{
$target_dir5 = "uploads/incometax/$cl_name/$financial_year/";
$target_file5 = $target_dir5 . basename($_FILES["plstatement"]["name"]);
$imageFileType5 = pathinfo($target_file5,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["plstatement"]["tmp_name"], $target_file5)) {
        echo "The file ". basename( $_FILES["plstatement"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//balancesheet
if(!empty($_FILES["balancesheet"]["name"])){
$target_dir6 = "uploads/incometax/$cl_name/$financial_year/";
$target_file6 = $target_dir6 . basename($_FILES["balancesheet"]["name"]);
$imageFileType6 = pathinfo($target_file6,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["balancesheet"]["tmp_name"], $target_file6)) {
        echo "The file ". basename( $_FILES["balancesheet"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//capitalaccount
if(!empty($_FILES["capitalaccount"]["name"])){
$target_dir7 = "uploads/incometax/$cl_name/$financial_year/";
$target_file7 = $target_dir7 . basename($_FILES["capitalaccount"]["name"]);
$imageFileType7 = pathinfo($target_file7,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["capitalaccount"]["tmp_name"], $target_file7)) {
        echo "The file ". basename( $_FILES["capitalaccount"]["name"]). " has been uploaded.";
    } else {
        
    }            
}

//otherstatement
if(!empty($_FILES["otherstatement"]["name"]))
{
$target_dir8 = "uploads/incometax/$cl_name/$financial_year/";
$target_file8 = $target_dir8 . basename($_FILES["otherstatement"]["name"]);
$imageFileType8 = pathinfo($target_file8,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["otherstatement"]["tmp_name"], $target_file8)) {
        echo "The file ". basename( $_FILES["otherstatement"]["name"]). " has been uploaded.";
    } else {
        
    }    
}   
//bankstatement
if(!empty($_FILES["bankstatement"]["name"]))
{
$target_dir9 = "uploads/incometax/$cl_name/$financial_year/";
$target_file9 = $target_dir9 . basename($_FILES["bankstatement"]["name"]);
$imageFileType9 = pathinfo($target_file9,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["bankstatement"]["tmp_name"], $target_file9)) {
        echo "The file ". basename( $_FILES["bankstatement"]["name"]). " has been uploaded.";
    } else {
        
    }    
}
//capitalgains
if(!empty($_FILES["capitalgains"]["name"]))
{
$target_dir10 = "uploads/incometax/$cl_name/$financial_year/";
$target_file10 = $target_dir10 . basename($_FILES["capitalgains"]["name"]);
$imageFileType10 = pathinfo($target_file10,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["capitalgains"]["tmp_name"], $target_file10)) {
        echo "The file ". basename( $_FILES["capitalgains"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//interest_account
if(!empty($_FILES["interest_account"]["name"]))
{
$target_dir11 = "uploads/incometax/$cl_name/$financial_year/";
$target_file11 = $target_dir11 . basename($_FILES["interest_account"]["name"]);
$imageFileType11 = pathinfo($target_file11,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["interest_account"]["tmp_name"], $target_file11)) {
        echo "The file ". basename( $_FILES["interest_account"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//dividend_account
if(!empty($_FILES["dividend_account"]["name"]))
{
$target_dir12 = "uploads/incometax/$cl_name/$financial_year/";
$target_file12 = $target_dir12 . basename($_FILES["dividend_account"]["name"]);
$imageFileType12 = pathinfo($target_file12,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["dividend_account"]["tmp_name"], $target_file12)) {
        echo "The file ". basename( $_FILES["dividend_account"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//draft_soi
if(!empty($_FILES["draft_soi"]["name"]))
{
$target_dir13 = "uploads/incometax/$cl_name/$financial_year/";
$target_file13 = $target_dir13 . basename($_FILES["draft_soi"]["name"]);
$imageFileType13 = pathinfo($target_file13,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["draft_soi"]["tmp_name"], $target_file13)) {
        echo "The file ". basename( $_FILES["draft_soi"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//final_soi
if(!empty($_FILES["final_soi"]["name"]))
{
$target_dir14 = "uploads/incometax/$cl_name/$financial_year/";
$target_file14 = $target_dir14 . basename($_FILES["final_soi"]["name"]);
$imageFileType14 = pathinfo($target_file14,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["final_soi"]["tmp_name"], $target_file14)) {
        echo "The file ". basename( $_FILES["final_soi"]["name"]). " has been uploaded.";
    } else {
        
    }        
}
//uploaded_return
if(!empty($_FILES["uploaded_return"]["name"]))
{
$target_dir15 = "uploads/incometax/$cl_name/$financial_year/";
$target_file15 = $target_dir15 . basename($_FILES["uploaded_return"]["name"]);
$imageFileType15 = pathinfo($target_file15,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["uploaded_return"]["tmp_name"], $target_file15)) {
        echo "The file ". basename( $_FILES["uploaded_return"]["name"]). " has been uploaded.";
    } else {
        
    }    
}   
//speed_post
if(!empty($_FILES["speed_post"]["name"]))
{
$target_dir16 = "uploads/incometax/$cl_name/$financial_year/";
$target_file16 = $target_dir16 . basename($_FILES["speed_post"]["name"]);
$imageFileType16 = pathinfo($target_file16,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["speed_post"]["tmp_name"], $target_file16)) {
        echo "The file ". basename( $_FILES["speed_post"]["name"]). " has been uploaded.";
    } else {
        
    }
}
//order_section
if(!empty($_FILES["order_section"]["name"]))
{
$target_dir17 = "uploads/incometax/$cl_name/$financial_year/";
$target_file17 = $target_dir17 . basename($_FILES["order_section"]["name"]);
$imageFileType17 = pathinfo($target_file17,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["order_section"]["tmp_name"], $target_file17)) {
        echo "The file ". basename( $_FILES["order_section"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//tax_audit
if(!empty($_FILES["tax_audit"]["name"]))
{
$target_dir18 = "uploads/incometax/$cl_name/$financial_year/";
$target_file18 = $target_dir18 . basename($_FILES["tax_audit"]["name"]);
$imageFileType18 = pathinfo($target_file18,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["tax_audit"]["tmp_name"], $target_file18)) {
        echo "The file ". basename( $_FILES["tax_audit"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//statutory_audit
if(!empty($_FILES["statutory_audit"]["name"]))
{
$target_dir19 = "uploads/incometax/$cl_name/$financial_year/";
$target_file19 = $target_dir19 . basename($_FILES["statutory_audit"]["name"]);
$imageFileType19 = pathinfo($target_file19,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["statutory_audit"]["tmp_name"], $target_file19)) {
        echo "The file ". basename( $_FILES["statutory_audit"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//other_audit
if(!empty($_FILES["other_audit"]["name"]))
{
$target_dir20 = "uploads/incometax/$cl_name/$financial_year/";
$target_file20 = $target_dir20 . basename($_FILES["other_audit"]["name"]);
$imageFileType20 = pathinfo($target_file20,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["other_audit"]["tmp_name"], $target_file20)) {
        echo "The file ". basename( $_FILES["other_audit"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//challan
if(!empty($_FILES["challan"]["name"]))
{
$target_dir21 = "uploads/incometax/$cl_name/$financial_year/";
$target_file21 = $target_dir21 . basename($_FILES["challan"]["name"]);
$imageFileType21 = pathinfo($target_file21,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["challan"]["tmp_name"], $target_file21)) {
        echo "The file ". basename( $_FILES["challan"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

//itr_receipt
if(!empty($_FILES["itr_receipt"]["name"]))
{
$target_dir22 = "uploads/incometax/$cl_name/$financial_year/";
$target_file22 = $target_dir22 . basename($_FILES["itr_receipt"]["name"]);
$imageFileType22 = pathinfo($target_file22,PATHINFO_EXTENSION);

 if (move_uploaded_file($_FILES["itr_receipt"]["tmp_name"], $target_file22)) {
        echo "The file ". basename( $_FILES["itr_receipt"]["name"]). " has been uploaded.";
    } else {
        
    }    
}

$sql = "INSERT INTO `itreturns`(`parent_id`, `financial_year`, `due_date`, `proof_16`, `proof_16a`, `proof_26as`, `rent_address`, `rent_income`, `partner_deed`, `agriculture_income`, `agriculture_pl_statement`, `plstatement`, `balancesheet`, `capitalaccount`, `otherstatement`, `bankstatement`, `capitalgains`, `capital_long`, `interest_account`, `dividend_account`, `dedu_ppf`, `dedu_insurance`, `dedu_tuition`, `dedu_loan`, `dedu_donation`, `dedu_other`, `draft_soi`, `final_soi`, `uploaded_return`, `speed_post`, `order_section`, `tax_audit`, `statutory_audit`, `other_audit`, `challan`, `itr_receipt`, `dedu_mediclaim`,`soi-prep`,`soi-prep-time`,`check`) VALUES "
        . "('$ID','$financial_year','$due_date','$target_file','$target_file1','$target_file2','$rent_address','$rent_income','$target_file3','$agriculture_income','$target_file4','$target_file5','$target_file6','$target_file7','$target_file8','$target_file9','$target_file10','$capital_long','$target_file11','$target_file12','$dedu_ppf','$dedu_insurance','$dedu_tuition','$dedu_loan','$dedu_donation','$dedu_other','$target_file13','$target_file14','$target_file15','$target_file16','$target_file17','$target_file18','$target_file19','$target_file20','$target_file21','$target_file22','$dedu_mediclaim','$soi_prep','$soi_prep_time','$check')";

if ($conn->query($sql) === TRUE) {
    
    echo "<script type='text/javascript'> window.location = 'http://$servername/portal/incometax.php' </script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
