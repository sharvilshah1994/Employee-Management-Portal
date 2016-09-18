<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$idnum = $_REQUEST['ID'];
$query="SELECT * FROM clients WHERE ID=$idnum";
$result=$conn->query($query);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Client Master Database for Income Tax</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <table>
                                <tr>
                                    
                                    <td style="width: 68%">
                                        <label>Client Details</label>
                                    </td>
                                     <?php
                                        while ($row=  mysqli_fetch_assoc($result))
                                        {
                                            $ID=$row["ID"];
                                            ?>
                                    <td><label>Owner CA:&nbsp;</label><?php echo $row['owner_ca'];?></td>
                                    <td style="padding-left: 20px"><a href="editclient_it.php?ID=<?php echo $row['ID']?>" class="btn btn-warning">Edit Client Details</a></td>
                                </tr>
                                
                            </table>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                
                                <table width="100%" style="vertical-align: top"><tr style="vertical-align: top; "><td width="40%" style="padding: 10px">
                                            <label>Client Details</label><br><br>
                                            <label>Name:</label>
                                <?php echo $row['cl_name'];?><br>
                                <label>Date of Birth:</label>
                                <?php echo $row['cl_dob'];?><br>
                                <label>Contact Number:</label>
                                <?php echo $row['cl_number'];?><br>
                                <label>Email:</label>
                                <?php echo $row['cl_email'];?><br>
                                <label>Office Number:</label>
                                <?php echo $row['cl_off_number'];?><br>
                                <label>Pan Number:</label>
                                <a href="pan_it.php?ID=<?php echo $row['ID'];?>"><?php echo $row['cl_pan'];?></a><br>
                                 <label>Passport Number:</label>
                                 <a href="passport_it.php?ID=<?php echo $row['ID'];?>"><?php echo $row['cl_passport'];?></a><br>    
                                <label>Aadhar Card Number:</label>
                                <a href="adhar_it.php?ID=<?php echo $row['ID'];?>"> <?php echo $row['cl_adhar'];?></a><br>
                                <label>Physical File location:</label>
                                <?php echo $row['file_location'];?><br>
                                <label>E-File location:</label>
                                <?php echo $row['e_file_location'];?><br>
                                <label>Digital Sign Information:</label>
                                <?php echo $row['digital_sign'];?><br>        
                                        </td>
                                        
                                        <td style="padding: 10px; ">
                                <label>Accountant Details</label><br><br>
                                            <label>Accountant Name:</label>
                                <?php echo $row['ac_name'];?><br>
                                <label>Accountant Contact Number:</label>
                                <?php echo $row['ac_number'];?><br>
                                <label>Accountant Email:</label>
                                <?php echo $row['ac_email'];?><br></td></tr>
                                
                                </table>
                                    <?php
                                        }?>
                            </div>
        

<?php
include("footer.php");
?>