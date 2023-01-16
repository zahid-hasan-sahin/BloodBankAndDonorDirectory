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

$query = mysqli_query($conn, "SELECT max(client_id) as maxC FROM chat;");
$client_id = 0;
while ($row = mysqli_fetch_array($query)) {
    $client_id = $row['maxC'];
}
$client_id += 1;

$donor_id = $_GET['donorid'];
$query = mysqli_query($conn, "INSERT into chat(donor_id,client_id,msg) VALUES('" . $donor_id . "','" . $client_id . "','Hello There....');");

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
    <link rel="stylesheet" href="css/chatStyle.css" />

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

    <hr>
    <div class="container content" style="margin-bottom: 50px;">
        <div class="row ">

            <div class="col-xl-2 col-lg-2 col-md-2">
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Chat</div>
                    <div class="card-body height3">
                        <ul class="chat-list">
                            <li class="in">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>Jimmy Willams</h5>
                                        <p>Raw denim heard of them tofu master cleanse</p>
                                    </div>
                                </div>
                            </li>
                            <li class="out">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>Serena</h5>
                                        <p>Next level veard</p>
                                    </div>
                                </div>
                            </li>
                            <li class="in">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5 class="name">Jimmy Willams</h5>
                                        <p>Will stumptown scenes coffee viral.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="out">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>Serena</h5>
                                        <p>Tofu master best deal</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>

            <form>
                <div class=" col-md-7">
                    <input type="text" class="form-control" placeholder="Something clever..">
                </div>
                <div class="input-group-append col-md-3">
                    <button class="btn btn-primary" type="button">Send</button>
                </div>
            </form>

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

                            <p> Copyright © Blood Donors Directory <?php echo date('Y'); ?>. All rights reserved</p>

                        </div> <!-- end .col-sm-6  -->
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