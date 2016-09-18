<?php 
include 'config.php';
include 'header.php';
$query = "SELECT * FROM news_web ORDER BY DATE DESC LIMIT 4";
$result = $conn->query($query);
$query1 = "SELECT * FROM team_main ORDER BY ID ASC LIMIT 4";
$result1 = $conn->query($query1);
?><!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <?php 
            include 'navbar.php';
            ?>
        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->
<?php 
include 'login_module.php';
?>
        <!-- *** LOGIN MODAL END *** -->

        <section>
            <!-- *** HOMEPAGE CAROUSEL ***
 _________________________________________________________ -->

            <div class="home-carousel" style="height: 350px">

                <div class="dark-mask"></div>

                <div class="container">
                    <div class="homepage owl-carousel" style="display: block; opacity: 8;">
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <p>
                                        <img src="img/dgsm_logo_final.png" alt="">
                                    </p>    
                                    <h2>Chartered Accountants</h2>
                                    
                                </div>
                                <div class="col-sm-5">
                                    <img class="img-responsive" src="img/rsz_ca-alpha_2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>Audit & Assurance</h1>
                                    <ul class="list-style-none">
                                        <li>Tax Audit</li>
                                        <li>Company Audit</li>
                                        <li>Bank Audit</li>
                                        <li>Society Audit</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/audit3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="row">

                                

                                <div class="col-sm-5 right">
                                    <h2>Taxation & Law Matters</h2>
                                     <ul class="list-style-none">
                                        <li>Accurate</li>
                                        <li>Reliable</li>
                                        <li>Analytical</li>
                                        <li>Focused</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/tax.jpg" alt="">
                                </div>

                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="row">
                                
                                <div class="col-sm-5 right">
                                    <h1>Management consultancy</h1>
                                    <ul class="list-style-none">
                                        <li>Financial Accounting System</li>
                                        <li>Accrual based Double Entry System</li>
                                        <li>SOX Testing & Its Compliances</li>
                                        <li>NRI Services</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/mg2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.project owl-slider -->
                </div>
            </div>

            <!-- *** HOMEPAGE CAROUSEL END *** -->
        </section>
        
        
           
        <div id="content">
            <div class="container">

                <section>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="heading">
                                <h2>About Us</h2>
                            </div>

                            <p class="lead">Founded in 1987 by CA Durgesh Buch, the Firm was initially registered with The Institute of Chartered Accountants of India - New Delhi as D.V. Buch & Co and later renamed as <strong>D G S M & Co.</strong></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel-group accordion" id="accordionThree">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            
                                           

                                                    Our Quality Policy


                                           

                                            </h4>
                                    </div>
                                    <div>
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px">
                                                
                                                <div class="col-md-12">
                                                    <p style="text-align: justify; font-size: 19px"> "We are committed to strive for achieving professional excellence as practicing Chartered Accountants, in the areas of Auditing and Consultancy of Tax matters, Law matters and Management matters, to the best satisfaction of our clients by continually improving our processes, updating our knowledge and training our key human resources."</p>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                               
                                                    The Path towards Excellence

                                               

                                            </h4>
                                    </div>
                                    <div id="collapse3b" >
                                        <div class="panel-body">
                                            <div class="row" style="padding: 10px; font-size: 19px">
                                                <div class="col-md-12">
                                                    <p style="text-align: justify">"We are proud of providing accurate, informative, analytical and timely services to our Clients. Before providing any service to any of our Client, we first evaluate our readiness to do so, with respect to the knowledgebase, and availability and competence of infrastructure, both technological and human."</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <!--<iframe class="embed-responsive-item" src="//www.youtube.com/embed/upZJpGrppJA"></iframe>-->
                                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest News
                        </div>
                       
                            
                            <marquee height="170"  direction="up"  onmouseout="this.scrollAmount=1" onmouseover="this.scrollAmount=0" scrollamount="1"  scrolldelay="1" width="100%">
                    <ul>

                            
                                
                                <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                            ?>
                            <li>[<?php echo $row['date'];?>]:<br><?php echo $row['news'];?></li>
                            <?php
                            }
                            ?>
                            </ul>
                            </marquee>
                                
                       
                        
                        <div class="panel-footer">
                            <a href="" style="color: black" class="btn">View all news</a>
                        </div>
                    </div>
               
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
               
            </div>
<!--            
        <section class="bar background-white">
            <div class="container">
                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div>
                                <h3>Webdesign</h3>
                                <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-print"></i>
                                </div>
                                <h3>Print</h3>
                                <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h3>SEO and SEM</h3>
                                <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <h3>Consulting</h3>
                                <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <h3>Email Marketing</h3>
                                <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h3>UX</h3>
                                <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

                 
        <!-- /.bar -->


        <!-- *** FOOTER ***
_________________________________________________________ -->
<?php
include 'footer.php';
?><!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

     