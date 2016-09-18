<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'config.php';
session_start();
$id = $_REQUEST['ID'];
$query = "SELECT * FROM task WHERE ID=$id";
$result = $conn -> query($query);
$row = mysqli_fetch_assoc($result);
$view = $row['view'];
                        if($view == '0')
                        {
                            $query1 = "UPDATE task SET view = '1' WHERE ID='$id'";
                            $conn->query($query1);
                        }
include 'header.php';


?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    
                    <h1 class="page-header">Assigned Task</h1>
        </section>
        <section class="content">
    
    <label>Task:</label>
    <?php echo $row['task'];?>
    <br>
    <label>Client Name:</label>
    <?php echo $row['client'];?>
    <br>
    <label>Department:</label>
    <?php echo $row['dept'];?>
    <br>
    <label>Time Stamp:</label>
    <?php echo $row['date'];?>
    <br>
    <form action="completetask.php?ID=<?php echo $row['ID'];?>">
        <br>
        <input type="submit" value="Complete Task" class="btn btn-success">&nbsp;<span style="color: crimson">(Pressing this button would send assigner notification that you have completed task)</span>
    </form>
        </section>
</div>



<?php
include 'footer.php';
?>