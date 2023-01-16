<?php
error_reporting(0);
// Initialize the session
session_start();
include_once('functions/db.php');
$conn=db();
// Include config file
require_once "functions/db.php";
$donorID = $_SESSION["donor_id"];
$qry = mysqli_query($conn,"SELECT first_name FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($qry);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <head>
     
        <meta charset="utf-8">
        <title>Blood Donors Directory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Donate Your Blood & Save Life. The Blood Donor Directory(BDD) Project is a city based youth development initiatives that is supportive for the patients who need blood at time of emergency.">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/favicon.png" />

        <!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://blooddonorsbd.ml">
		<meta property="og:title" content="Blood Donors Directory">
		<meta property="og:description" content="Donate Your Blood & Save Life. The Blood Donor Directory(BDD) Project is a city based youth development initiatives that is supportive for the patients who need blood at time of emergency.">
		<meta property="og:image" content="images/metaimg.jpg">
		<meta property="fb:app_id" content="3095171203923902"/>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />

    <body> 

        <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
        </div>

        <!--  HEADER -->

        <header class="main-header clearfix" data-sticky_header="true">

            <div class="top-bar clearfix">

                <div class="container">

                    <div class="row">

                        <div class="col-md-4 col-sm-12">

                            <p>Welcome To Blood Donors Directory </p>

                        </div>

                        <div class="col-md-4 col-sm-12">
                            <center>
                                <p><a href="need-blood"><blink>Need Blood ?</blink></a></p>
                            </center>
                        </div>
                        <div class="col-md-4col-sm-12">
                            <div class="top-bar-social">
                                <a href="https://www.facebook.com/strange.seyam.7" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="mailto:noman.seyam55555@gmail.com" target="_top"><i class="fa fa-envelope-o"></i></a>
                                <a href="https://wa.me/8801763980526"><i class="fa fa-whatsapp"></i></a>
                            </div>   
                        </div> 

                    </div>

                </div> <!--  end .container -->

            </div> <!--  end .top-bar  -->

            <section class="header-wrapper navgiation-wrapper">

                <div class="navbar navbar-default">			
                    <div class="container">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo" href="index"><img alt="" src="images/logo.png"></a>
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="drop"><a href="index" title="Home">Home</a></li>
                                <li><a href="need-blood" title="Need Blood">Need Blood</a></li>
                                <li><a href="be-a-part" title="BE A PART">BE A PART</a></li>
                                <li><a href="about-bdd" title="About BDD">About BDD</a></li>
                                <li><a href="about-us" title="About Us">About Us</a></li>
                                <li><a href="contact" title="Contact">Contact</a></li>
                                <?php if ($donorID != null) {
                                echo '<li><a href="Messages" title="Messages">Messages</a></li>';
                            }
                            ?>
                                <li><a style="text-decoration: underline solid #FE3C47 3px; text-underline-offset: 2px;" href="login" title="<?php if ($donorID == null) {echo "LOGIN";} else {echo ucfirst($userdata['first_name'])."'s Dashboard";} ?>"><?php if ($donorID == null) {echo "LOGIN";} else {echo ucfirst($userdata['first_name']);} ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

        </header> <!-- end main-header  -->

        <!--  HOME SLIDER BLOCK  -->

        <div class="slider-wrap">

            <div id="slider_1" class="owl-carousel owl-theme">

                <div class="item">
                    <img src="images/home_1_slider_1.jpg" alt="img">
                    <div class="slider-content text-center">
                        <div class="container">

                            <div class="slider-contents-info">
                                <h3>Donate blood,save life !</h3>
                                <h2>
                                    Your Donation Can bring
                                    <br>
                                    smile at others face
                                </h2>
                                <a href="be-a-part" class="btn btn-slider">BE A PART <i class="fa fa-long-arrow-right"></i></a>
                            </div> <!-- end .slider-contents-info  -->
                        </div><!-- /.slider-content -->
                    </div>
                </div>

                <div class="item">
                    <img src="images/home_1_slider_1.jpg" alt="img">
                    <div class="slider-content text-center">
                        <div class="container">
                            <div class="slider-contents-info">
                                <h3>Everyone could be a hero !</h3>
                                <h2>
                                    You don't need to be a doctor
                                    <br>
                                    to save a life
                                </h2>
                                <a href="be-a-part" class="btn btn-slider">BE A PART <i class="fa fa-long-arrow-right"></i></a>
                            </div><!-- /.slider-content -->
                        </div> <!-- end .slider-contents-info  -->
                    </div>

                </div>
            </div>

        </div>

        <!-- HIGHLIGHT CTA  -->   

        <section class="cta-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>We are Ready To help </h2>
                        <p>
                            Be a honest and participate in social involvements . so let's get together for donating blood which can  help in the retaining of one's life .                    
                        </p>
                    </div> <!--  end .col-md-8  -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="be-a-part">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BE A PART&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div> <!--  end .col-md-4  -->
                </div> <!--  end .row  -->
            </div>
        </section> 

        <!--  SECTION DONATION PROCESS -->


          <section class="cta-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>NEED BLOOD ? </h2>
                        <p>
                           If you need Blood Urgently You can Search here for Blood Donors
                        </p>
                    </div> <!--  end .col-md-8  -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="need-blood">Search Donors</a>
                    </div> <!--  end .col-md-4  -->
                </div> <!--  end .row  -->
            </div>
        </section> 

        <section class="section-content-block section-process">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading"><span>Donation</span> Process</h2>
                        <p class="section-subheading">How to donate Blood ?</p>
                    </div> <!-- end .col-sm-10  -->                    

                </div> <!--  end .row  -->

                <div class="row wow fadeInUp">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">

                                <img src="images/process_1.jpg" alt="process" />
                                <div class="step">
                                    <h3>1</h3>
                                </div>
                            </figure> <!-- end .process-img  -->
                                <a href="be-a-part">
                            <article class="process-info">
                                <h2>Registration</h2>   
                                <p>Our Team Will Help You To Become A Part Of This Social Directory. You Have To Provide Your Personal Information Regarding To This Activity.<br></p>
                            </article>
                                </a>
                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->



                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_2.jpg" alt="process" />
                                <div class="step">
                                    <h3>2</h3>
                                </div>
                            </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                            <article class="process-info">                                   
                                <h2>BE READY</h2>
                                <p>Provide Your Contact Number Which You Use Frequently. You Will Be Informed When The Needy Is Nearer To Your Location.</p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->


                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_3.jpg" alt="process" />
                                <div class="step">
                                    <h3>3</h3>
                                </div>
                            </figure> <!-- end .process-img  -->

                            <article class="process-info">
                                <h2>BE A PART</h2>
                                <p>As Per The Informations Provided,You Will Be Under Consideration Of The Specific Doctors. And The Blood Donation Will Be Done.</p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->



                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_4.jpg" alt="process" />
                                <div class="step">
                                    <h3>4</h3>
                                </div>
                            </figure> <!-- end .process-img  -->

                            <article class="process-info">
                                <h2>STAY HEALTHY</h2>
                                <p>After Successful Process. You Can Contact Us Anytime Regarding You Doubts Or Health Condition.<br>And God Bless You. </p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->

                </div> <!--  end .row --> 

            </div> <!--  end .container  -->

        </section> <!--  end .section-process --> 

       
        

        <section class="section-content-block section-client-testimonial">

            <div class="container"> 

                <div class="testimonial-container text-center">

                    <div class="col-md-10 col-md-offset-1 col-sm-12">

                        <div class="testimony-layout-1">
                            <h3 class="people-quote">Donor Opinion</h3>
                            <p class="testimony-text">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                I proudly donate blood on a regular basis because it gives others something they desperately need to survive. Just knowing I can make a difference in someone else life makes me feel great!                                 
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>

                           

                        </div> <!-- end .testimony-layout-1  -->

                    </div> <!--  end col-md-10  -->

                    <div class="col-md-10 col-md-offset-1 col-sm-12">

                        <div class="testimony-layout-1">
                            <h3 class="people-quote">Donor Opinion</h3>
                            <p class="testimony-text">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                I have been a donor since high school. Although I have not been a donor every year, I always want to give to the human race. I love to help others! Moreover it gives a real peace in my mind.                                   
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>

                          

                        </div> <!-- end .testimony-layout-1  -->

                    </div> <!--  end col-md-10  -->

                    <div class="col-md-10 col-md-offset-1 col-sm-12">

                        <div class="testimony-layout-1">
                            <h3 class="people-quote">Recipient Opinion</h3>
                            <p class="testimony-text">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                I wish I could tell you my donor how grateful I am for your selfless act.You gave me new life. We may be coworkers or schoolmates or just two in the same community.I'm very grateful to you.                                   
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>

                           

                        </div> <!-- end .testimony-layout-1  -->

                    </div> <!--  end col-md-10  --> 

                </div>  <!--  end .row  -->   

            </div> <!-- end .container  -->

        </section> <!--  end .section-client-testimonial --> 

        <!-- SECTION TEAM  -->
 

        <!-- SECTION CTA -->

        

        <!--  SECTION CAMPAIGNS   -->
     

        <!-- START FOOTER  -->

        <footer>            

            <section class="footer-widget-area footer-widget-area-bg">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="about-footer">

                                <div class="row">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <img src="images/logo-footer.png" alt="" />
                                    </div> <!--  end col-lg-3-->

                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <p>
                                            Student of DIU Has Stepped Into The Society By Introducing A Blood Doners Directory In Order To Innovate Every Individual's Participation In These Kind Of Social Activities.
                                        </p>
                                    </div> <!--  end .col-lg-9  -->

                                </div> <!--  end .row -->

                            </div> <!--  end .about-footer  -->

                        </div> <!--  end .col-md-12  -->

                    </div> <!--  end .row  -->

                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-xs-12">

                            <div class="footer-widget">
                                <div class="sidebar-widget-wrapper">
                                    <div class="footer-widget-header clearfix">
                                        <h3>Powered by</h3>
                                    </div>
                                    <p></p>
                                    <div class="footer-subscription">
                                      <li><a href=""><img src="images/diu.png" height="45%" width="45%"></a></li>
                                       
                                    </div>
                                </div>
                            </div>

                        </div> <!--  end .col-md-4 col-sm-12 -->   						                      

                        <div class="col-md-4 col-sm-6 col-xs-12">

                            <div class="footer-widget">

                                <div class="sidebar-widget-wrapper">

                                    <div class="footer-widget-header clearfix">
                                        <h3>Contact Us</h3>
                                    </div>  <!--  end .footer-widget-header --> 


                                    <div class="textwidget">                                       

                                       <i class="fa fa-envelope-o fa-contact"></i> <p><a href="mailto:bdd.diu@gmail.com">bdd.diu@gmail.com</a></p>

                                        <i class="fa fa-location-arrow fa-contact"></i> <p>102/1, Sukrabad Mirpur Rd <br>Dhanmondi, Dhaka 1207, Bangladesh</p>

                                        <i class="fa fa-phone fa-contact"></i> <p>Phone:&nbsp;  +880 1763980526                           

                                    </div>

                                </div> <!-- end .footer-widget-wrapper  -->

                            </div> <!--  end .footer-widget  -->

                        </div> <!--  end .col-md-4 col-sm-12 -->   

                        <div class="col-md-4 col-sm-12 col-xs-12">

                            <div class="footer-widget clearfix">

                                <div class="sidebar-widget-wrapper">

                                    <div class="footer-widget-header clearfix">
                                        <h3>Support Links</h3>
                                    </div>  <!--  end .footer-widget-header --> 

                                    <ul class="footer-useful-links">

                                        <li>
                                            <a href="about-us">
                                                <i class="fa fa-caret-right fa-footer"></i>
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://daffodilvarsity.edu.bd">
                                                <i class="fa fa-caret-right fa-footer"></i>
                                                DIU Website
                                            </a>
                                        </li>
                                        <li>
                                            <a href="contact">
                                                <i class="fa fa-caret-right fa-footer"></i>
                                                Contact Us
                                            </a>
                                        </li>
                                        
                                   
                                    </ul>

                                </div> <!--  end .footer-widget  -->        

                            </div> <!--  end .footer-widget  -->            

                        </div> <!--  end .col-md-4 col-sm-12 -->    

                    </div> <!-- end row  -->

                </div> <!-- end .container  -->

            </section> <!--  end .footer-widget-area  -->

            <!--FOOTER CONTENT  -->

            <section class="footer-contents">

                <div class="container">

                    <div class="row clearfix">
                             <center>
                        <div >
                           
                            <p > Copyright © Blood Donors Directory <?php echo date('Y');?>. All rights reserved</p>

                        </div>  <!-- end .col-sm-6  -->
                        </center>
                      
                        </div> <!--  end .col-lg-6  -->

                    </div> <!-- end .row  -->                                    

                </div> <!--  end .container  -->

            </section> <!--  end .footer-content  -->

        </footer>

        <!-- END FOOTER  -->

        <!-- Back To Top Button  -->

        <a id="backTop">Back To Top</a>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js "></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>

</html>