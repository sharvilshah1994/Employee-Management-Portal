<?php
include 'config.php';
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

session_start();

$uname = $_SESSION['username'];

if(empty($uname))
{
    echo "<script>alert('You need to login to access portal!');</script>";
    echo "<script>window.location = 'http://$servername/dgsm1/';</script>"; /* Redirect browser */
    exit;
}

$query = "SELECT log.* FROM log INNER JOIN users ON users.id=log.parent_id WHERE users.username='$uname' ORDER BY ID DESC LIMIT 1";

$result = $conn->query($query);
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 15 minutes ago
    date_default_timezone_set('Asia/Kolkata');
    $time = date("H:i:s");
    $time1 = date("Y-m-d H:i:s",strtotime($time));
    while($row=  mysqli_fetch_assoc($result))
    { 
    $y = $row['login'];    
    $query1 = "UPDATE log SET logout='$time1' WHERE login='$y'";
    }
    $conn->query($query1);
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    echo '<script type="text/javascript"> alert("No activity since last 15 mins. Click ok to login again!"); </script>';
    echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/" </script>';
}
$_SESSION['LAST_ACTIVITY'] = time();


$query2 = "SELECT * FROM users WHERE username='$uname'";

$result2 = $conn->query($query2);
$row2 = mysqli_fetch_assoc($result2);
    $name = $row2['name'];
    $lname = $row2['lname'];
    $photo = $row2['photo'];
    $designation = $row2['designation'];
    $admin = $row2['admin'];
    $department = $row2['department'];
    $department1 = $row2['department1'];
    $department2 = $row2['department2'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>D G S M | Dashboard</title>
    <link rel="shortcut icon" type="image/" href="../img/100x100.jpg" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bootstrap/css/ionsicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CA</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>D G S M</b> & Co</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- Notification menu -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success"></span>
                </a>
                </li>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
             
              <?php
              
              
              $query4 = "SELECT * FROM task INNER JOIN users ON task.user_id=users.ID";
              $result4 = $conn->query($query4);
              $row4 = mysqli_fetch_assoc($result4);
              $user_name = $row4['name'];
              $user_lname = $row4['lname'];
              $user_username = $row4['username'];
              
              $query5 = "SELECT count(*) as count FROM task WHERE view='0' AND completed='0'";
              $result5 = $conn->query($query5);
              $row5 = mysqli_fetch_assoc($result5);
              $notification_num = $row5['count'];
              ?>
              <!--<div id="tasks" name="tasks">-->
              <!-- Tasks: style can be found in dropdown.less -->
              
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger"  id="noti" name="noti"><?php echo $notification_num; ?></span>
                </a>
                <ul class="dropdown-menu">
                  
                  <li>
                      
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php 
                        $query6 = "SELECT * FROM task INNER JOIN users ON task.user_id=users.ID WHERE users.username = '$uname' AND view='0' AND completed='0' ORDER BY task.ID DESC";
                        $result6 = $conn->query($query6);
                        while($row6 = mysqli_fetch_assoc($result6))
                        {
                           $time1 = $row6['date'];
                            $time = strtotime($time1);
                        ?>
                        <li style="background: lightgoldenrodyellow"><!-- Task item -->
                        <a href="viewtask.php?ID=<?php echo $row6['ID'];?>">
                          <h3>
                            <?php echo $row6['client'];?> -  <?php echo $row6['dept'];?>
                          
                              <small class="pull-right" ><?php echo humanTiming($time);?> ago</small><br>
                              <?php
                              $assign_id = $row6['assign_id'];
                              $query3 = "SELECT * FROM users WHERE ID='$assign_id'";
                                $result3 = $conn->query($query3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $assign_name = $row3['name'];
                                $assign_lname = $row3['lname'];
                              ?>
                            <small class="pull-right"><?php echo $assign_name;?>&nbsp;<?php echo $assign_lname;?></small>
                          </h3>
                            <div>
                                <div>
                            <?php echo $row6['task'];?>
                                </div>
                          </div>
                            
                        </a>
                            
                      </li> 
                      <?php
                        }
                        ?>
                        
                        <?php 
                        $query6 = "SELECT * FROM task INNER JOIN users ON task.user_id=users.ID WHERE users.username = '$uname' AND view='1' AND completed='0' ORDER BY task.ID DESC";
                        $result6 = $conn->query($query6);
                        while($row6 = mysqli_fetch_assoc($result6))
                        {
                           $time1 = $row6['date'];
                            $time = strtotime($time1);
                        ?>
                      <li><!-- Task item -->
                          <a href="viewtask.php?ID=<?php echo $row6['ID'];?>">
                          <h3>
                            <?php echo $row6['client'];?> -  <?php echo $row6['dept'];?>
                          
                              <small class="pull-right" ><?php echo humanTiming($time);?> ago</small><br>
                              <?php
                              $assign_id = $row6['assign_id'];
                              $query3 = "SELECT * FROM users WHERE ID='$assign_id'";
                                $result3 = $conn->query($query3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $assign_name = $row3['name'];
                                $assign_lname = $row3['lname'];
                              ?>
                            <small class="pull-right"><?php echo $assign_name;?>&nbsp;<?php echo $assign_lname;?></small>
                          </h3>
                            <div>
                                <div>
                            <?php echo $row6['task'];?>
                                </div>
                          </div>
                            
                        </a>
                      </li> 
                      <?php
                        }
                        ?>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $photo;?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $name; ?>&nbsp;<?php echo $lname;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $photo;?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $name;?>&nbsp;<?php echo $lname;?> - <?php echo $designation; ?>
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Lock</a>
                    </div>
                    <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $photo;?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $name?>&nbsp;<?php echo $lname?></p>
                
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
  <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="nav" id="sidebar-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <?php
                        if($admin == 'Yes')
                        {
                        ?>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-user fa-fw"></i> Manage Users<span class="fa fa-angle-left pull-right"></span></a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="viewuser.php">View Users</a>
                                </li>
                                <li>
                                    <a href="adduser.php">Add User</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="tasks.php"><i class="fa fa-tasks fa-fw"></i> Tasks</a>
                        </li>
                        <li>
                            <a href="broadcast.php"><i class="fa fa-paperclip fa-fw"></i> Broadcast</a>
                        </li>
                        
                        <li>
                            <a href="message.php"><i class="fa fa-envelope fa-fw"></i> Messages</a>
                        </li>
                        <li>
                            <a href="clients.php"><i class="fa fa-users fa-fw"></i> Client Master</a>
                        </li>
                        <?php
                        if($admin == 'Yes')
                        {
                        ?>
                        <li>
                            <a href="employee.php"><i class="fa fa-male fa-fw"></i> D G S M Employee Database</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="lib.php"><i class="fa fa-book fa-fw"></i> Library</a>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-table fa-fw"></i> Departments<span class="fa fa-angle-left pull-right"></span></a>
                            <ul class="treeview-menu">
                                <?php
                        if($department == 'All' or $department == 'Income Tax' or $admin == 'Yes')
                        {
                        ?>
                                <li>
                                    <a href="incometax.php">Income Tax</a>
                                </li>
                                <?php
                        }
                        if ($department == 'All' or $department == 'Audit' or $admin == 'Yes')
                        {
                        ?>
                                <li>
                                    <a href="audit.php">Audit</a>
                                </li>
                                <?php
                        }
                        if ($department == 'All' or $department == 'Accounting' or $admin == 'Yes')
                        {
                        ?>
                                <li>
                                    <a href="accounts.php">Account</a>
                                </li>
                                <?php
                        }
                        ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
       <?php
      function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second',
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

 

?>
