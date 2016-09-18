<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();

$query="SELECT * FROM type_entity";
$result=$conn->query($query);

?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Audit Section</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <h4>Please select type of audit from below-</h4>
            <ul>
                <?php 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                <a href="audit_type.php?type=<?php echo $row['name'];?>"><li><?php echo $row['name'];?> Audit</li></a>
                <?php
                }
                ?>
            </ul>

</div>
<?php
include("footer.php");
?>