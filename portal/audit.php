<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();

$query="SELECT * FROM type_entity";
$result=$conn->query($query);

?>
<div class="content-wrapper">
    <section class="content-header">
                    <h1 class="page-header">Audit Section</h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                   <li class="active">Audit</li>
                                  
          </ol>
    </section>
    <section class="content">
            <!-- /.row -->
            <h4>Please select type of audit from below-</h4>
            <ul>
                <?php 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                <a href="audit_type.php?type=<?php echo $row['name'];?>&dept=<?php echo $row['dept'];?>"><li><?php echo $row['name'];?> Audit</li></a>
                <?php
                }
                ?>
            </ul>
    </section>
</div>
<?php
include("footer.php");
?>