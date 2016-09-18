<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$sql = "SELECT * FROM clients_audit WHERE ID='$id' AND type_entity='$type'";
$result = $conn -> query($sql);
$query1 = "SELECT * FROM financial_year";
$result1 = $conn->query($query1);
$query2 = "SELECT * FROM checklist_company WHERE parent_id='$id'";
$result2 = $conn->query($query2);
?>

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#home" data-toggle="tab">General Information</a>
                                </li>
                                <li  class="active"><a href="#checklist" data-toggle="tab">Checklist</a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
    <?php while($row = mysqli_fetch_assoc($result))
   {
       ?>
   <div id="home" class="tab-pane fade">
     <div class="col-md-4">
         <br>
    <label>Client/Entity Details - </label>
    <br>
    <br>
    <label>CIN Number:</label>
    <?php echo $row['cin_number'];?>
    <br>
    <label>Name:</label>
    <?php echo $row['cl_name'];?>
    <br>
    <label>Contact Number:</label>
    <?php echo $row['cl_number'];?>
    <br>
    <label>Email:</label>
    <?php echo $row['cl_email'];?>
    
    <br>
    <label>Type of Entity:</label>
    <?php echo $row['type_entity'];?>
    <br>    
    <label>Physical Location of file:</label>
    <?php echo $row['physical_location'];?>
    <br>
    <label>E-file Location:</label>
    <?php echo $row['e_file_location'];?>
    <br>
    <br>
    <br>
    <label>Digital Sign Information-</label>
    <br>
    <label>Information:</label>
    <?php echo $row['digital_sign'];?>
    <br>
    <label>Location:</label>
    <?php echo $row['digital_location'];?>
    <br>
    <label>Validity:</label>
    <?php echo $row['digital_validity'];?>
    </div>
    <div class="col-md-4">
        <br>
        <label>Contact Person Details-</label>
        <br>
        <br>
        <label>Name:</label>
        <?php echo $row['ac_name'];?>
        <br>
        <label>Contact Number:</label>
        <?php echo $row['ac_number'];?>
        <br>
        <label>Email:</label>
        <?php echo $row['ac_email'];?>
    </div>
    <div class="col-md-4">
        <br>
        <label>Nature of Audit:</label>
        <?php echo $row['nature_audit'];?>
        <br>
        <label>Name of Auditor:</label>
        CA&nbsp;<?php echo $row['owner_ca'];?>
        <br>
        <label>Team:</label>
        <?php echo $row['team'];?>
        <br>
        <label>Due Date:</label>
        <?php echo $row['due_date'];?>
        <br>
             <a href="editclient_audit.php?id=<?php echo $row['ID'];?>&type=<?php echo $row['type_entity'];?>" class="btn btn-info">Edit</a><br><br>
    </div>
</div>   
                            <div id="checklist" class="tab-pane fade  in active" >
                                <?php
                                if($type == 'Company')
                                {
                                ?>
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
    padding: 20px;
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
                                            Sr No.
                                        </th>
                                        <th style="width:100px">
                                            Particulars
                                        </th>
                                        <th>
                                            Team Responsible
                                        </th>
                                        <th style="width:400px">
                                            Remarks
                                        </th>
                                        <th style="width:150px">
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                    
                                    <?php
                                    while($row2 = mysqli_fetch_assoc($result2))
                                    {
                                        ?>
                                    
                                    <tr>
                                        <td class="head">
                                            <?php echo $row2['srno'];?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $row2['link'];?>?id=<?php echo $row2['ID'];?>&parent_id=<?php echo $row2['parent_id'];?>"><?php echo $row2['particulars'];?></a>                                            
                                        </td>
                                        <td>
                                            <?php echo $row2['team'];?>
                                        </td>
                                        <td>
                                            <?php echo $row2['remarks'];?>
                                        </td>
                                        <td>
                                            <?php echo $row2['status'];?>
                                        </td>
                                        <td>
                                            <a href="editchecklist.php?ID=<?php echo $row2['ID'];?>&type=<?php echo $type?>&parent_id=<?php echo $id?>" class="btn btn-info">Edit</a>
                                        </td>
                                        
                                    </tr>
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                </table>
                                <br>
                                    <br>
                                    <br>
                                <?php 
                                }
                                ?>
                            </div>

                        
                            </div>
                                      
                        </div>
    </div>
    </div>
</div>
</div>

<?php
                    }
include 'footer.php';
?>