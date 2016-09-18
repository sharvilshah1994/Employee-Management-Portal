<?php
include 'config.php';
include 'header.php';
include 'navbar.php';
include 'login_module.php';


?>
        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs" class="no-mb">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Contact</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html" style="color: black">Home</a>
                            </li>
                            <li>Contact</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        

            
                    
            

        
        <div id="content">
            <div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="heading">
                                <h2>We are here to help you</h2>
                            </div>

                            <p class="lead" style="text-align: justify">Are you curious about something? Do you have some kind of query with our services?
                                <strong>Please feel free to contact us, we are here for you and would be more than happy to assist you.</strong></p>

                            <div class="heading">
                                <h3>Contact form</h3>
                            </div>

                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="subject">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Send message</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>

                        <div class="col-md-4">


                            <h3 class="text-uppercase">Head Office</h3>

                            <p>DGSM & Co.
                                <br>Ground Floor, Sahyadri Apartments,
                                <br>Opp. Stadium Swimming Pool,
                                <br>Navrangpura,
                                <br>
                                <strong>Ahmedabad, GJ 380 009</strong>
                            </p>

<!--                            <h3 class="text-uppercase">Call center</h3>

                            <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                            <p><strong>+33 555 444 333</strong>
                            </p>-->



                            <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=DGSM,+&co,+Ahmedabad,+Gujarat&amp;aq=0&amp;oq=dgsm&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=Dgsm,&amp;hnear=Ahmedabad,+Gujarat,+India&amp;output=embed"></iframe>
                        </div>
                    </div>

                        </div>

                    </div>


                </section>

            </div>
            <!-- /#contact.container -->
        </div>
        <!-- /#content -->

        <!-- *** GET IT ***
_________________________________________________________ -->
<?php
include 'footer.php';
?>