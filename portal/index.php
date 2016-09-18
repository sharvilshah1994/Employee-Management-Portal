<?php
include 'header.php';
include 'navbar.php';
include 'config.php';
session_start();
$username = $_SESSION['username'];
$query = "SELECT log.*,users.* FROM log INNER JOIN users ON users.id=log.parent_id WHERE users.username='$username' "
        . "AND log.ID = ((SELECT log.ID FROM log INNER JOIN USERS ON users.id=log.parent_id WHERE users.username='$username' ORDER BY log.logout DESC LIMIT 1))";

$result = $conn->query($query);
$row=  mysqli_fetch_assoc($result);
$logout = $row['logout'];

$query5 = "SELECT news.*,users.name,users.lname,users.username FROM news INNER JOIN users ON users.id=news.parent_id ORDER BY news.date DESC";
$result5 = $conn->query($query5);

$query2 = "select distinct * from users where username in (select distinct a.to from (select * from message where message.from='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.from=b.username "
        . "union all select distinct a.from from (select * from message where message.to='$username' )a inner join "
        . "(select username from users where users.username='$username')b on a.to=b.username)";
$result2 = $conn->query($query2);
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
            <?php
            $time = strtotime($logout);
            ?>
            <center><label>Your last logout time-</label>  <?php echo $logout?></center>
          <ol class="breadcrumb">
              <li class="active"><a href="#"><i class="fa fa-home"></i> Home</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
                    <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
             <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-paperclip"></i>
                  <h3 class="box-title">Broadcast</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                   
                      <?php 
                      while($row5 = mysqli_fetch_assoc($result5))
                      {
                          $time1 = $row5['date'];
                          $time = strtotime($time1);

                          ?>
                      
                      <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      
                      <!-- todo text -->
                      <span class="text"><?php echo $row5['news'];?></span>
                      <!-- Emphasis label -->
                      <small class="label label-success"><i class="fa fa-clock-o"></i><?php echo humanTiming1($time);?></small>
                      <!-- General tools such as edit or delete-->
                      <span class="pull-right"><?php echo $row5['name'];?>&nbsp;<?php echo $row5['lname'];?></span>
                      <?php
                                            $z = $row5['username'];
                                            if($z == $username)
                                            {
                                            ?>
                      <div class="tools">
                          <a href="editbroadcast.php?ID=<?php echo $row5['ID'];?>"><i class="fa fa-edit"></i></a>
                          <a href="deletebroadcast.php?ID=<?php echo $row5['ID'];?>" ><i class="fa fa-trash-o"></i></a>
                      </div>
                      <?php
                                            }
                                            ?>
                    </li>
                    <?php
                      }
                      ?>
                    
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="broadcast.php"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Broadcast</button></a>
                </div>
              </div><!-- /.box --> 
              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Chat</h3>
                  
                </div>
                <div class="box-body chat" id="chat-box">
                  <!-- chat item -->
                <?php
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    $time1 = $row2['time'];
                    $time = strtotime($time1);
                ?>
                  <div class="item">
                    <img src="<?php echo $row2['photo'];?>" alt="user image" class="online">
                    
                      <a href="message.php?to=<?php echo $row2['id'];?>" class="name">
<!--                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i><?php echo humanTiming1($time);?></small>-->
                        <?php echo $row2['name']?>&nbsp;<?php echo $row2['lname'];?>
                      </a>
                      
                    
                    
                  </div><!-- /.item -->
                <?php
                }
                ?><!-- chat item -->
                  
                </div><!-- /.chat -->
                <div class="box-footer">
                  <div class="input-group">
                    <input class="form-control" placeholder="Type username for new chat...">
                    <div class="input-group-btn">
                      <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>
              </div><!-- /.box (chat box) -->

              <!-- TO DO List -->
              

              <!-- quick email widget -->
              

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

             
              <!-- solid sales graph -->
              

              <!-- Calendar -->
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
                
                </div>
              
              
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Quick Email</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
              
              </div><!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
      function humanTiming1 ($time)
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
      include 'footer.php';
      ?>