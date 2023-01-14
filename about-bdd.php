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
        <title>About BDD | Blood Donors Directory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/favicon.png" />

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
                                <li><a style="text-decoration: underline solid #FE3C47 3px; text-underline-offset: 2px;" href="login" title="<?php if ($donorID == null) {echo "LOGIN";} else {echo ucfirst($userdata['first_name'])."'s Dashboard";} ?>"><?php if ($donorID == null) {echo "LOGIN";} else {echo ucfirst($userdata['first_name']);} ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

        </header> <!-- end main-header  -->

        <!--  PAGE HEADING -->

        <section class="page-header">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">

                        <h3>
                            ABOUT BDD
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / ABOUT BDD
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  SECTION FAQ -->

        <section class="section-content-block section-faq">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">Blood Donor Directory(BDD)</h2>
                        <p class="section-subheading">
                           Know more about BDD and this project 
                        </p>
                    </div> <!-- end .col-sm-10  -->

                </div> <!--  end .row  -->

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordion">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" ><center>Blood Donor Directory(BDD)</center></a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                The Blood Donor Directory(BDD) Project is a city based  youth development initiatives that is supportive for the patients who need blood at time of emergency. The project also enable youth to develop a helpful mentality and grow up capabilities to help others. Equally, it strengthens within them commitment towards their family, the community, and the environment.
                                </div>
                            </div>
                        </div>

                    </div> <!-- end .col-md-6  -->



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordion2">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" ><center>THE BDD PROJECT</center></a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                •   Is a platform between the donor and patients frameworks in our country. It trains and encourages youth to develop their mentality to support the people who is in need of blood.<br>

                                •   Uses existing network, infrastructure and leadership qualities of youth to supplement physical, mental and educational development of youth.<br>

                                •   Enables blood donation communities to create safe donation environments and confident youth willing to react against social evils, and find solutions to community problems.<br>

                                </div>
                            </div>
                        </div>

                       

                        

                        

                    </div> <!-- end .col-md-12  -->    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="accordion3"> 
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseSeven" ><center>SOCIAL CONTEXT</center> </a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                The need for a city-level intervention such as the Blood Donor Directory(BDD) project derives from a combination of philosophic, demographic, sociological and economic factors that are expected to influence the future global standing of the nation. The significance of the DBB Project lies in its potential to positively impact the following:<br>
                                     -  DEMOCRACY AND RESPECT FOR LAW<br>
                                     -  CHALLENGES OF DEMOCRATIC POLICING<br>
                                     -  PROBLEMS OF CONTEMPORARY YOUTH<br>
                                     -  IMPACT OF INFORMATION & COMMUNICATION TECHNOLOGY<br>
                                    -   DEMOGRAPHIC DIVIDEND<br>
                                    -   CIVIC SENSE, SOCIAL RESPONSIBILITY AND INCLUSIVENESS.<br>

                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->


        </section> <!--  end .section-faq -->


        <!-- CLIENT LOGO SECTION  -->

       

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

         <script type="text/javascript" src="js/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="js/main.css"/><script src="js/jquery.min.js"></script>
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