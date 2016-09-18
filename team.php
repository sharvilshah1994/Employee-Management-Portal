<?php
include 'config.php';
include 'header.php';
include 'navbar.php';
include 'login_module.php';
$query = "SELECT * FROM team_main WHERE ID='1' OR ID='2'";
$result = $conn->query($query);
$query1 = "SELECT * FROM team_main WHERE ID='3' OR ID='4' OR ID='5'";
$result1 = $conn->query($query1);
$query2 = "SELECT * FROM team_main WHERE ID NOT IN (1,2,3,4,5,9,13)";
$result2 = $conn->query($query2);
?>
<!-- *** TOP END *** -->

            <!-- *** NAVBAR END *** -->

       

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Our team</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.php" style="color:black">Home</a>
                            </li>
                            <li>Our team</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <section>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h2>TEAM OF EXPERTS</h2>
                            </div>

                            <p class="lead">At DGSM, Team DGSM has vast experience and expertise in Accounting (including Government Accounting), Auditing (including Government, Bank and Corporate Audit), Taxation including International Taxation and Management Consultancy including due diligence work.</p>
                        </div>
                    </div>
                    <!-- /.team-member -- TEAM MEMBER HIGH POST -->
                    <div class="row">
                        <div class="col-md-3 col-sm-3">

                        </div>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <div class="col-md-3 col-sm-3">
                            <div class="team-member" data-animate="fadeInUp">
                                <div class="image">
                                    <a href="team-member.php?ID=<?php echo $row['ID'];?>">
                                        <img src="<?php echo $row['image'];?>" alt="" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <h3><a href="team-member.html"><?php echo $row['name'];?></a></h3>
                                <p class="role"><?php echo $row['designation'];?></p>
                                <div class="social">
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </div>
                                <div class="text">
                                    <p><?php echo $row['paragraph'];?></p>
                                </div>
                            </div>
                            <!-- /.team-member -->
                        </div>
                        <?php
                        }
                        ?>
                        
                        
                        <div class="col-md-3 col-sm-3">
                            
                        </div>
                    </div>
                    <!-- /.row -->
                    
                    
                    <div class="row">
                        
                        <?php
                        while($row1 = mysqli_fetch_assoc($result1))
                        {
                        ?>
                        <div class="col-md-3 col-sm-3">
                            <div class="team-member" data-animate="fadeInUp">
                                <div class="image">
                                    <a href="team-member.php?ID=<?php echo $row['ID'];?>">
                                        <img src="<?php echo $row1['image'];?>" alt="" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <h3><a href="team-member.html"><?php echo $row1['name'];?></a></h3>
                                <p class="role"><?php echo $row1['designation'];?></p>
                                <div class="social">
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </div>
                                <div class="text">
                                    <p><?php echo $row1['paragraph'];?></p>
                                </div>
                            </div>
                            <!-- /.team-member -->
                        </div>
                        <?php
                        }
                        ?>
                        
                        
                        
                    </div>
                    
                    <!-- /.TEAM MEMBER LOW POST -->
                    <div class="row">
                        <?php while($row2 = mysqli_fetch_assoc($result2))
                        {
                            ?>
                        
                        <div class="col-md-2 col-sm-3">
                            <div class="team-member" data-animate="fadeInDown">
                                <div class="image">
                                    <a href="team-member.php?ID=<?php echo $row['ID'];?>">
                                        <img src="<?php echo $row2['image'];?>" alt="" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <h3><a href="team-member.php?ID=<?php echo $row['ID'];?>"><?php echo $row2['name'];?></a></h3>
                                <p class="role"><?php echo $row2['designation'];?></p>
                            </div>
                            <!-- /.team-member -->
                        </div>
                        <?php 
                        }
                        ?>
                        
                    </div>
                    <!-- /.row -->

                </section>

            </div>
            <!-- /.container -->


                    
        </div>
        <!-- /#content -->


        <!-- *** GET IT END *** -->


        <!-- *** FOOTER ***
_________________________________________________________ -->
<?php
include 'footer.php';
?>
        