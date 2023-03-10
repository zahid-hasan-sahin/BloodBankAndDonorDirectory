<?php
error_reporting(0);
// Initialize the session
session_start();
include_once('functions/db.php');
$conn = db();
// Include config file
require_once "functions/db.php";
$donorID = $_SESSION["donor_id"];
$qry = mysqli_query($conn, "SELECT first_name FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($qry);
$smile_donor = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(donor_id) AS Count_do FROM donor_info"));
$smile_recipient = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(re_id) AS Count_re FROM recipient_info"));

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>About Us | Blood Donors Directory</title>
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
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="css/venobox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/msgstyle.css" />

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
                            <p><a href="need-blood">
                                    <blink>Need Blood ?</blink>
                                </a></p>
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
                            <li><a style="text-decoration: underline solid #FE3C47 3px; text-underline-offset: 2px;" href="login" title="<?php if ($donorID == null) {
                                                                                                                                                echo "LOGIN";
                                                                                                                                            } else {
                                                                                                                                                echo ucfirst($userdata['first_name']) . "'s Dashboard";
                                                                                                                                            } ?>"><?php if ($donorID == null) {
                                                                                                                                                        echo "LOGIN";
                                                                                                                                                    } else {
                                                                                                                                                        echo ucfirst($userdata['first_name']);
                                                                                                                                                    } ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>

    </header> <!-- end main-header  -->


    <?php

    $qry = mysqli_query($conn, "SELECT *
FROM chat
WHERE msg_id IN (
    SELECT MAX(msg_id)
    FROM chat WHERE donor_id=" . $donorID . "
    GROUP BY client_id 
) order by time desc;");

    ?>




    <div class="container py-5 px-4">

        <div class="row rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="col-5 px-0">
                <div class="bg-white">

                    <div class="bg-gray px-4 py-2 bg-light">
                        <p class="h5 mb-0 py-1">Recent</p>
                    </div>

                    <div class="messages-box">
                        <div class="list-group rounded-0">
                            <?php


                            while ($row = mysqli_fetch_array($qry)) {

                                echo '<a href="chat?donorid='.$row['donor_id'].'&clientid='.$row['client_id'].'" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-4">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h6 class="mb-0">Annanonymous User' . $row['client_id'] . '</h6><small class="small font-weight-bold">' . $row['time'] . '</small>
                                        </div>
                                        <p class="font-italic text-muted mb-0 text-small">' . $row['msg'] . '.</p>
                                    </div>
                                </div>
                            </a>';
                            }

                            ?>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>














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
                                </div> <!--  end .footer-widget-header -->


                                <div class="textwidget">

                                    <i class="fa fa-envelope-o fa-contact"></i>
                                    <p><a href="mailto:bdd.diu@gmail.com">bdd.diu@gmail.com</a></p>

                                    <i class="fa fa-location-arrow fa-contact"></i>
                                    <p>102/1, Sukrabad Mirpur Rd <br>Dhanmondi, Dhaka 1207, Bangladesh</p>

                                    <i class="fa fa-phone fa-contact"></i>
                                    <p>Phone:&nbsp; +880 1763980526

                                </div>

                            </div> <!-- end .footer-widget-wrapper  -->

                        </div> <!--  end .footer-widget  -->

                    </div> <!--  end .col-md-4 col-sm-12 -->

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <div class="footer-widget clearfix">

                            <div class="sidebar-widget-wrapper">

                                <div class="footer-widget-header clearfix">
                                    <h3>Support Links</h3>
                                </div> <!--  end .footer-widget-header -->

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
                        <div>

                            <p> Copyright ?? Blood Donors Directory <?php echo date('Y'); ?>. All rights reserved</p>

                        </div> <!-- end .col-sm-6  -->
                    </center>

                </div> <!--  end .col-lg-6  -->

            </div> <!-- end .row  -->

            </div> <!--  end .container  -->

        </section> <!--  end .footer-content  -->

    </footer>
    <div id="testing">hahahahah</div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



</body>

</html>