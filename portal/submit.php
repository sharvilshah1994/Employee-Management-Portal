<?php
session_start();
include 'config.php';
$name = $_REQUEST['name'];
$lname = $_REQUEST['lname'];
$bdate = $_REQUEST['bdate'];
$address = $_REQUEST['address'];
$doj = $_REQUEST['doj'];
$department = $_REQUEST['department'];
$department1 = $_REQUEST['department1'];
$department2 = $_REQUEST['department2'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$userid = $_REQUEST['userid'];
$password = $_REQUEST['password'];
$doa = $_REQUEST['doa'];
$partner = $_REQUEST['partner'];
$admin = $_REQUEST['admin'];
$defaultfile = $_REQUEST['defaultfile'];
$pf_num = $_REQUEST['pf_num'];
$co_date_contract = $_REQUEST['co_date_contract'];
$co_valid_contract = $_REQUEST['co_valid_contract'];
//$co_app_copy = $_REQUEST['co_app_copy'];
//$co_biodata = $_REQUEST['co_biodata'];
//$co_certi = $_REQUEST['co_certi'];
//$co_exp = $_REQUEST['co_exp'];
$co_pan = $_REQUEST['co_pan'];
//$co_residence = $_REQUEST['co_residence'];
$ar_date_reg = $_REQUEST['ar_date_reg'];
//$ar_agreement = $_REQUEST['ar_agreement'];
$ar_extra_permission = $_REQUEST['ar_extra_permission'];
//$ar_biodata = $_REQUEST['ar_biodata'];
//$ar_certi = $_REQUEST['ar_certi'];
//$ar_exp = $_REQUEST['ar_exp'];
$ar_pan = $_REQUEST['ar_pan'];
//$ar_residence = $_REQUEST['ar_residence'];


if (!file_exists("uploads/Employees/$name")) {
    mkdir("uploads/Employees/$name", 0777, true);
}


if(!empty($_FILES["fileToUpload"]["name"]))
{
$target_dir = "uploads/Employees/$name/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 else {
$target_file = $defaultfile;
 }
 
//co_app_copy
 $target_dir1 = "uploads/Employees/$name/";
$target_file1 = $target_dir1 . basename($_FILES["co_app_copy"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["co_app_copy"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["co_app_copy"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

//co_biodata
 $target_dir2 = "uploads/Employees/$name/";
$target_file2 = $target_dir2 . basename($_FILES["co_biodata"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["co_biodata"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["co_biodata"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    
//co_certi
 $target_dir3 = "uploads/Employees/$name/";
$target_file3 = $target_dir3 . basename($_FILES["co_certi"]["name"]);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["co_certi"]["tmp_name"], $target_file3)) {
        echo "The file ". basename( $_FILES["co_certi"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    
//co_exp
 $target_dir4 = "uploads/Employees/$name/";
$target_file4 = $target_dir4 . basename($_FILES["co_exp"]["name"]);
$imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["co_exp"]["tmp_name"], $target_file4)) {
        echo "The file ". basename( $_FILES["co_exp"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    
//co_residence
 $target_dir5 = "uploads/Employees/$name/";
$target_file5 = $target_dir5 . basename($_FILES["co_residence"]["name"]);
$imageFileType5 = pathinfo($target_file5,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["co_residence"]["tmp_name"], $target_file5)) {
        echo "The file ". basename( $_FILES["co_residence"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    
//ar_agreement
$target_dir6 = "uploads/Employees/$name/";
$target_file6 = $target_dir6 . basename($_FILES["ar_agreement"]["name"]);
$imageFileType6 = pathinfo($target_file6,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["ar_agreement"]["tmp_name"], $target_file6)) {
        echo "The file ". basename( $_FILES["ar_agreement"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }        
    
//ar_biodata
$target_dir7 = "uploads/Employees/$name/";
$target_file7 = $target_dir7 . basename($_FILES["ar_biodata"]["name"]);
$imageFileType7 = pathinfo($target_file7,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["ar_biodata"]["tmp_name"], $target_file7)) {
        echo "The file ". basename( $_FILES["ar_biodata"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }      
    
//ar_exp
$target_dir8 = "uploads/Employees/$name/";
$target_file8 = $target_dir8 . basename($_FILES["ar_exp"]["name"]);
$imageFileType8 = pathinfo($target_file8,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["ar_exp"]["tmp_name"], $target_file8)) {
        echo "The file ". basename( $_FILES["ar_exp"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    
//ar_certi
$target_dir9 = "uploads/Employees/$name/";
$target_file9 = $target_dir9 . basename($_FILES["ar_certi"]["name"]);
$imageFileType9 = pathinfo($target_file9,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["ar_certi"]["tmp_name"], $target_file9)) {
        echo "The file ". basename( $_FILES["ar_certi"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }        
    
//ar_residence
$target_dir10 = "uploads/Employees/$name/";
$target_file10 = $target_dir10 . basename($_FILES["ar_residence"]["name"]);
$imageFileType10 = pathinfo($target_file10,PATHINFO_EXTENSION);


 if (move_uploaded_file($_FILES["ar_residence"]["tmp_name"], $target_file10)) {
        echo "The file ". basename( $_FILES["ar_residence"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }    
    

$sql = "INSERT INTO users (username,password,name,lname,address,email,phone,photo,doj,department,partner,admin,"
        . "dob,doa,department1,department2,co_app_copy,co_biodata,co_certi,co_exp,co_residence,ar_agreement,"
        . "ar_biodata,ar_exp,ar_certi,ar_residence,pf_num,co_date_contract,co_valid_contract,co_pan,ar_date_reg,"
        . "ar_extra_permission,ar_pan) "
        . "VALUES ('$userid','$password','$name','$lname','$address','$email','$number','$target_file','$doj',"
        . "'$department','$partner','$admin','$bdate','$doa','$department1','$department2','$target_file1','$target_file2','$target_file3'"
        . ",'$target_file4','$target_file5','$target_file6','$target_file7','$target_file8','$target_file9','$target_file10',"
        . "'$pf_num','$co_date_contract','$co_valid_contract','$co_pan','$ar_date_reg','$ar_extra_permission','$ar_pan')";


if ($conn->query($sql) === TRUE) {
    if($_REQUEST['dept_head'] == '1')
{
    $sql2 = "UPDATE users SET dept_head='1' WHERE username = '$userid'";
    $conn->query($sql2);
}

if($_REQUEST['dept_head_1'] == '1')
{
    $sql3 = "UPDATE users SET dept_head_1='1' WHERE username = '$userid'";
    $conn->query($sql3);
}   

if($_REQUEST['dept_head_2'] == '1')
{
    $sql4 = "UPDATE users SET dept_head_2='1' WHERE username = '$userid'";
    $conn->query($sql4);
}
    $sql1 = "SELECT * FROM users WHERE username='$userid'";
    $result1 = $conn->query($sql1);
    while ($row1 = mysqli_fetch_assoc($result1))
    {
                $id = $row1['id'];
                date_default_timezone_set('Asia/Kolkata');
                $time = date("Y-m-d h:i:s");
                $sql2 = "INSERT INTO log (parent_id,login,logout) VALUES ('$id','$time','$time')";
    }
    if ($conn->query($sql2) === TRUE)
    {
    echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/portal/viewuser.php" </script>';
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        ?>
