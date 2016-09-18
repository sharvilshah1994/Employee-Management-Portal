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
                        <h1>Career</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html" style="color: black">Home</a>
                            </li>
                            <li>Career</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        

            
                    
            

        
        <div id="content">
            <div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="heading">
                                <h2>It's what we do together that sets us apart</h2>
                            </div>

                            <p class="lead" style="text-align: justify">Why you should join us at <strong>DGSM</strong>? Here, You'll never stop learning. We're perfectionists having experienced <strong>Chartered Accountants</strong> in our team.
                            Drop in your CV/Resume and we'll get back to you. We are quite busy with our daily schedule so please do not expect prompt response. Also, we reply only to worthy applicants.</p>

                            <div class="heading">
                                <h3>Career form</h3>
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
                                            <label for="subject">Contact Number</label>
                                            <input type="text" class="form-control" id="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Key skills</label>
                                            <textarea id="message" class="form-control"></textarea>
                                        </div>
                                    </div>  
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>CV/Resume</label>&nbsp;(We prefer .PDF format)
                                            <input type="file" id='cv' name="cv" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Apply</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
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