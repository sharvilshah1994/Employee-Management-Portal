<?php
include 'config.php';
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

session_start();

$uname = $_SESSION['username'];

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
while ($row2 = mysqli_fetch_assoc($result2))
{
    $admin = $row2['admin'];
    $department = $row2['department'];
    $department1 = $row2['department1'];
    $department2 = $row2['department2'];
}



//echo $query1 = "select distinct users.*,message.* from users,message where users.username in (select distinct a.to from (select * from message where message.from='$uname' )a inner join "
//        . "(select username from users where users.username='$uname')b on a.from=b.username "
//        . "union all select distinct a.from from (select * from message where message.to='$uname' )a inner join "
//        . "(select username from users where users.username='$uname')b on a.to=b.username) ORDER BY message.time DESC LIMIT 4 ";
//exit;
//$result1 = $conn->query($query1);

?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>D G S M Portal</title>
    <link rel="shortcut icon" type="image/" href="../img/rsz_16_x_6_inch_logo.jpg" />
    <!-- Bootstrap Core CSS -->
    <link href="bower_components//bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components//metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components//datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components//datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components//font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><p><i  style="color: crimson">D G S M & Co.</i>&nbsp;
                        Portal</p></a>
            </div>
            <!-- /.navbar-header -->
              
            <ul class="nav navbar-top-links navbar-right">
                <span  class="btn btn-success fa fa-x fa-clock-o" disabled>&nbsp;<?php 
                date_default_timezone_set('Asia/Kolkata');
                $time = date("H:i");
                   echo $time1 = date("H:i",strtotime($time));?></span>
                <a href="http://localhost/dgsm1"><button type="button" class="btn btn-primary">Visit Site</button></a>
                
<!--                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                                            ?>
                        
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>abc..</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                     /.dropdown-messages 
                </li>-->
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>(<?php echo $_SESSION['username'];?>) Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <?php
                        if($admin == 'Yes')
                        {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
                            <a href="broadcast.php"><i class="fa fa-paperclip fa-fw"></i> Broadcast</a>
                        </li>
                        
                        <li>
                            <a href="message.php"><i class="fa fa-envelope fa-fw"></i> Messages</a>
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
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Departments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
