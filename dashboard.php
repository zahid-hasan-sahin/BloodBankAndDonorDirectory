<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<?php
// error_reporting(0);
include_once('functions/db.php');
$conn = db();
// Include config file
require_once "functions/db.php";
$donorID = $_SESSION["donor_id"];
$qry = mysqli_query($conn, "SELECT * FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($qry);
$_age = floor((time() - strtotime($userdata['age'])) / 31556926);


if (isset($_POST['update'])) {
    $division = strtolower($_POST['divisions']);
    $district = strtolower($_POST['district']);
    $thana = strtolower($_POST['thana']);
    mysqli_query($conn, "UPDATE donor_info SET divisions = '$division', district = '$district', thana = '$thana' WHERE donor_id = '$donorID'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($result);

if (isset($_POST['hide_data'])) {
    $hide_data = strtolower($_POST['hide_data']);
    mysqli_query($conn, "UPDATE donor_info SET hide_data = '$hide_data' WHERE donor_id = '$donorID'");
}
$result = mysqli_query($conn, "SELECT * FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($result);
?>
<?php
if (isset($_POST['save'])) {
    $re_name = $_POST['re_name'];
    $re_phno = $_POST['re_phno'];
    $re_address = $_POST['re_address'];
    $re_gender = $_POST['re_gender'];
    $re_age = $_POST['re_age'];
    $hospital_name = $_POST['hospital_name'];
    $bag_no = $_POST['bag_no'];
    $sql = "INSERT INTO `recipient_info` (`re_id`,`re_name`,`re_phno`,`re_address`,`re_gender`,`re_age`,`hospital_name`,`bag_no`,`donor_id`) VALUES (NULL,'$re_name','$re_phno','$re_address','$re_gender','$re_age','$hospital_name','$bag_no','$donorID')";
    if (mysqli_query($conn, $sql)) {
        $message_re = "New Record Added Successfully !";
    } else {
        echo "Error: " . $sql . "
    " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>Dashboard | Blood Donors Directory</title>
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

<body>
    <p>Your Location: <span id="location"></span></p>

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

    <!--  PAGE HEADING -->

    <section class="page-header">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 text-center">

                    <h3>
                        Hi, <b style="line-height: 1.7;"><?php echo ucfirst($userdata['first_name']) . " " . ucfirst($userdata['last_name']); ?></b><br />Welcome to your dashboard
                    </h3>

                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / User Dashboard
                    </p>
                    <p>
                    <form style="margin-bottom:10px;" id="send" method="post">
                        <button class="btn <?php if ($userdata['hide_data'] == '0') {
                                                echo "btn-success";
                                            } else {
                                                echo "btn-warning";
                                            } ?>" type="submit" name="hide_data" value="<?php if ($userdata['hide_data'] == '0') {
                                                                                            echo "1";
                                                                                        } else {
                                                                                            echo "0";
                                                                                        } ?>"><?php if ($userdata['hide_data'] == '0') {
                                                                                                    echo "UnHide Me";
                                                                                                } else {
                                                                                                    echo "Hide Me";
                                                                                                } ?></button>
                    </form>
                    <a href="reset-password.php" style="margin-bottom:10px;" class="btn btn-primary">Reset Your Password</a>
                    <a href="logout.php" style="margin-bottom:10px;" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                    </p>

                </div>

            </div> <!-- end .row  -->

        </div> <!-- end .container  -->

    </section> <!-- end .page-header  -->
    <section class="section-appointment">

        <div class="container wow fadeInUp">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Your Informetion</h3>

                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="First Name : <?php echo ucfirst($userdata['first_name']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Last Name : <?php echo ucfirst($userdata['last_name']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Phone Number : <?php echo ucfirst($userdata['phno']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="NID Number : <?php echo ucfirst($userdata['nid']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Blood Group : <?php echo strtoupper($userdata['gp']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Gender : <?php echo ucfirst($userdata['gender']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Date Of Bitrh : <?php echo ucfirst($userdata['age']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Age : <?php echo ucfirst($_age); ?>" disabled>
                        </div>

                    </div> <!-- end .appointment-form-wrapper  -->

                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Update Your Location</h3>
                        <p style="padding-bottom:10px;">Your Current Location</p>

                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="Division : <?php echo ucfirst($userdata['divisions']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="District : <?php echo ucwords($userdata['district']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="Thana : <?php echo ucwords($userdata['thana']); ?>" disabled>
                        </div>
                        <div class="col-md-12">

                            <p style="padding-top:10px;">Change Location</p>
                            <?php
                            if (!empty($message)) {
                                echo '<div class="alert alert-success">' . $message . '</div>';
                            }
                            ?>
                            <div id="al">

                            </div>
                        </div>
                        <form class="appoinment-form" id="send" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <div class="form-group col-md-4">
                                <select id="divisions" class="form-control" placeholder="Select Division" type="select" required name="divisions" onchange="divisionsList();">
                                    <option disabled selected>Select Division</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select id="district" class="form-control" placeholder="Select District" type="select" required name="district" onchange="thanaList();"></select>
                            </div>
                            <div class="form-group col-md-4">
                                <select id="thana" class="form-control" placeholder="Select Thana" type="select" required name="thana"></select>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" class="btn-submit" name="update" value="Update">
                            </div>
                        </form>

                    </div> <!-- end .appointment-form-wrapper  -->

                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Give New Recipient Informetion</h3>
                        <?php
                        if (!empty($message_re)) {
                            echo '<div class="alert alert-success">' . $message_re . '</div>';
                        }
                        ?>
                        <div id="al">

                        </div>
                        <form class="appoinment-form" id="send" method="post">

                            <div class="form-group col-md-4">
                                <input id="re_name" class="form-control" placeholder="Recipient Full Name" type="text" required name="re_name">
                            </div>
                            <div class="form-group col-md-4">
                                <input id="re_phone" class="form-control" placeholder="Recipient Phone" type="number" maxlength="11" requireds name="re_phno">
                            </div>
                            <div class="form-group col-md-4">
                                <input id="re_address" class="form-control" placeholder="Recipient Address" type="text" required name="re_address">
                            </div>
                            <div class="form-group col-md-6">
                                <select id="gender" class="form-control" placeholder="Gender" type="select" required name="re_gender">
                                    <option disabled selected value="">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="age" class="form-control" placeholder="Age" type="number" min="5" max="60" requireds name="re_age">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="hospital_name" class="form-control" placeholder="Hospital Name" type="text" requireds name="hospital_name">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="bag_no" class="form-control" placeholder="Number Of Bag" type="number" maxlength="1" min="1" max="3" requireds name="bag_no">
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" class="btn-submit" name="save" value="Submit">
                            </div>
                        </form>

                    </div> <!-- end .appointment-form-wrapper  -->

                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Your Donetion Data</h3>
                        <div id="al">

                        </div>
                        <?php
                        // Attempt select query execution
                        $sql = "SELECT * FROM recipient_info WHERE donor_id = '$donorID'";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "		<style>
                                        body {
                                            font-family: 'Open Sans', sans-serif;
                                            line-height: 1.25;
                                          }
                                          
                                          table {
                                            border: 1px solid #ccc;
                                            border-collapse: collapse;
                                            margin: 0;
                                            padding: 0;
                                            width: 100%;
                                            table-layout: fixed;
                                          }
                                          
                                          table caption {
                                            font-size: 1.5em;
                                            margin: .5em 0 .75em;
                                          }
                                          
                                          table tr {
                                            background-color: #f8f8f8;
                                            border: 1px solid #ddd;
                                            padding: .35em;
                                          }
                                          
                                          table th,
                                          table td {
                                            padding: .625em;
                                            text-align: center;
                                          }
                                          
                                          table th {
                                            font-size: .85em;
                                            letter-spacing: .1em;
                                            text-transform: uppercase;
                                          }
                                          
                                          @media screen and (max-width: 600px) {
                                            table {
                                              border: 0;
                                            }
                                          
                                            table caption {
                                              font-size: 1.0em;
                                            }
                                            
                                            table thead {
                                              border: none;
                                              clip: rect(0 0 0 0);
                                              height: 1px;
                                              margin: -1px;
                                              overflow: hidden;
                                              padding: 0;
                                              position: absolute;
                                              width: 1px;
                                            }
                                            
                                            table tr {
                                              border-bottom: 3px solid #ddd;
                                              display: block;
                                              margin-bottom: .625em;
                                            }
                                            
                                            table td {
                                              border-bottom: 1px solid #ddd;
                                              display: block;
                                              font-size: 0.9em;
                                              text-align: right;
                                            }
                                            
                                            table td::before {
                                              /*
                                              * aria-label has no advantage, it won't be read inside a table
                                              content: attr(aria-label);
                                              */
                                              content: attr(data-label);
                                              float: left;
                                              font-weight: bold;
                                              text-transform: uppercase;
                                            }
                                            
                                            table td:last-child {
                                              border-bottom: 0;
                                            }
                                          }
                                        
                                        </style>
                                        
                                        
                                        <table class='table-bordered'>
                                        <thead>
                                            <tr>
                                                <th scope='col'><center>Name</center></th>
                                                <th scope='col'><center>Phone No.</center></th>
                                                <th scope='col'><center>Address</center></th>
                                                <th scope='col'><center>Age</center></th>
                                                <th scope='col'><center>Gender</center></th>
                                                <th scope='col'><center>Hospital Name</center></th>
                                                <th scope='col'><center>Bag No.</center></th>
                                            </tr>
                                            </thead>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td data-label='Name:'>" . ucwords($row['re_name']) . "</td>";
                                    echo "<td data-label='Phone No: '><a style='color: #4D4D4D;' href='tel:" . ucwords($row['re_phno']) . "'>" . ucwords($row['re_phno']) . "</a></td>";
                                    echo "<td data-label='Address:'>" . ucwords($row['re_address']) . "</td>";
                                    echo "<td data-label='Age:'>" . ucwords($row['re_age']) . "</td>";
                                    echo "<td data-label='Gender:'>" . ucwords($row['re_gender']) . "</td>";
                                    echo "<td data-label='Hospital:'>" . ucwords($row['hospital_name']) . "</td>";
                                    echo "<td data-label='Bag No:'>" . ucwords($row['bag_no']) . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "No Records Matching Were Found.";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }

                        ?>

                    </div> <!-- end .appointment-form-wrapper  -->

                </div> <!--  end .col-lg-6 -->

            </div> <!--  end .row  -->

        </div> <!--  end .container -->

    </section> <!--  end .appointment-section  -->


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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            divisionsList();
            thanaList();
        });
    </script>
    <script>
        // Division Section select
        function divisionsList() {
            // get value from division lists
            var diviList = document.getElementById('divisions').value;

            // set barishal division districts
            if (diviList == 'Barishal') {
                var disctList = '<option disabled selected>Select District</option><option value="Barguna">Barguna</option><option value="Barishal">Barishal</option><option value="Bhola">Bhola</option><option value="Jhalokati">Jhalokati</option><option value="Patuakhali">Patuakhali</option><option value="Pirojpur">Pirojpur</option>';
            }
            // set Chattogram division districts
            else if (diviList == 'Chattogram') {
                var disctList = '<option disabled selected>Select District</option><option value="Bandarban">Bandarban</option><option value="Brahmanbaria">Brahmanbaria</option><option value="Chandpur">Chandpur</option><option value="Chittagong">Chittagong</option><option value="Comilla">Comilla</option><option value="Cox`S Bazar">Cox`S Bazar</option><option value="Feni">Feni</option><option value="Khagrachhari">Khagrachhari</option><option value="Lakshmipur">Lakshmipur</option><option value="Noakhali">Noakhali</option><option value="Rangamati">Rangamati</option>';
            }
            // set Dhaka division districts
            else if (diviList == 'Dhaka') {
                var disctList = '<option disabled selected>Select District</option><option value="Dhaka">Dhaka</option><option value="Faridpur">Faridpur</option><option value="Gazipur">Gazipur</option><option value="Gopalganj">Gopalganj</option><option value="Kishoreganj">Kishoreganj</option><option value="Madaripur">Madaripur</option><option value="Manikganj">Manikganj</option><option value="Munshiganj">Munshiganj</option><option value="Narayanganj">Narayanganj</option><option value="Narsingdi">Narsingdi</option><option value="Rajbari">Rajbari</option><option value="Shariatpur">Shariatpur</option><option value="Tangail">Tangail</option>';
            }
            // set Khulna division districts
            else if (diviList == 'Khulna') {
                var disctList = '<option disabled selected>Select District</option><option value="Bagerhat">Bagerhat</option><option value="Chuadanga">Chuadanga</option><option value="Jessore">Jessore</option><option value="Jinaidaha">Jinaidaha</option><option value="Khulna">Khulna</option><option value="Kushtia">Kushtia</option><option value="Magura">Magura</option><option value="Meherpur">Meherpur</option><option value="Narail">Narail</option><option value="Satkhira">Satkhira</option>';
            }
            // set Mymensingh division districts
            else if (diviList == 'Mymensingh') {
                var disctList = '<option disabled selected>Select District</option><option value="Mymensingh">Mymensingh</option><option value="Netrokona">Netrokona</option><option value="Jamalpur">Jamalpur</option><option value="Sherpur">Sherpur</option>';
            }
            // set Rajshahi division districts
            else if (diviList == 'Rajshahi') {
                var disctList = '<option disabled selected>Select District</option><option value="Rajshahi">Rajshahi</option><option value="Natore">Natore</option><option value="Pabna">Pabna</option><option value="Bogura">Bogura</option><option value="Chapainawabganj">Chapainawabganj</option><option value="Joypurhat">Joypurhat</option><option value="Naogaon">Naogaon</option><option value="Sirajganj">Sirajganj</option>';
            }
            // set Rangpur division districts
            else if (diviList == 'Rangpur') {
                var disctList = '<option disabled selected>Select District</option><option value="Rangpur">Rangpur</option><option value="Dinajpur">Dinajpur</option><option value="Kurigram">Kurigram</option><option value="Nilphamari">Nilphamari</option><option value="Gaibandha">Gaibandha</option><option value="Thakurgaon">Thakurgaon</option><option value="Panchagarh">Panchagarh</option><option value="Lalmonirhat">Lalmonirhat</option>';
            }
            // set Sylhet division districts
            else if (diviList == 'Sylhet') {
                var disctList = '<option disabled selected>Select District</option><option value="Habiganj">Habiganj</option><option value="Moulvibazar">Moulvibazar</option><option value="Sunamganj">Sunamganj</option><option value="Sylhet">Sylhet</option>';
            } else if (diviList == 'Select Division') {
                var disctList = '<option value="" disabled selected>Select District</option>';
            }
            //  set/send districts name to District lists from division
            document.getElementById("district").innerHTML = disctList;
        }

        // Thana Section select
        function thanaList() {
            var DisList = document.getElementById('district').value;
            if (DisList == 'Barishal') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Agailjhara">Agailjhara</option><option value="Babuganj">Babuganj</option><option value="Bakerganj">Bakerganj</option><option value="Banaripara">Banaripara</option><option value="Barishal Sadar">Barisal Sadar</option><option value="Gournadi">Gournadi</option><option value="Hizla">Hizla</option><option value="Mehendiganj">Mehendiganj</option><option value="Muladi">Muladi</option><option value="Wazirpur">Wazirpur</option>';
            } else if (DisList == 'Barguna') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Amtali">Amtali</option><option value="Bamna">Bamna</option><option value="Barguna Sadar">Barguna Sadar</option><option value="Betagi">Betagi</option><option value="Patharghata">Patharghata</option><option value="Taltali">Taltali</option>';
            } else if (DisList == 'Bhola') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bhola Sadar">Bhola Sadar</option><option value="Daulatkhan">Daulatkhan</option><option value="Burhanuddin">Burhanuddin</option><option value="Tazumuddin">Tazumuddin</option><option value="Lalmohan">Lalmohan</option><option value="Char Fasson">Char Fasson</option><option value="Manpura">Manpura</option>';
            } else if (DisList == 'Jhalokati') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Jhalokati Sadar">Jhalokati Sadar</option><option value="Kathalia">Kathalia</option><option value="Nalchity">Nalchity</option><option value="Rajapur">Rajapur</option>';
            } else if (DisList == 'Patuakhali') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bauphal">Bauphal</option><option value="Galachipa">Galachipa</option><option value="Dashmina">Dashmina</option><option value="Kalapara">Kalapara</option><option value="Mirzaganj">Mirzaganj</option><option value="Patuakhali Sadar">Patuakhali Sadar</option><option value="Dumki">Dumki</option><option value="Rangabali">Rangabali</option>';
            } else if (DisList == 'Pirojpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bhandaria">Bhandaria</option><option value="Kawkhali">Kawkhali</option><option value="Mathbaria">Mathbaria</option><option value="Nazirpur">Nazirpur</option><option value="Nesarabad">Nesarabad</option><option value="Pirojpur Sadar">Pirojpur Sadar</option><option value="Indurkani">Indurkani</option>';
            } else if (DisList == 'Chittagong') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Akborsha">Akborsha</option><option value="Anwara">Anwara</option><option value="Bakalia">Bakalia</option><option value="Bandar">Bandar</option><option value="Banshkhali">Banshkhali</option><option value="Bayejid Bostami">Bayejid Bostami</option><option value="Boalkhali">Boalkhali</option><option value="Chandanaish">Chandanaish</option><option value="Chandgaon">Chandgaon</option><option value="Chittagong Metro">Chittagong Metro</option><option value="Chokbazar">Chokbazar</option><option value="Doublemooring">Doublemooring</option><option value="Epz">Epz</option><option value="Fatikchhari">Fatikchhari</option><option value="Halishahar">Halishahar</option><option value="Hathazari">Hathazari</option><option value="Karnafuli">Karnafuli</option><option value="Khulshi">Khulshi</option><option value="Kotwali">Kotwali</option><option value="Lohagara">Lohagara</option><option value="Mirsharai">Mirsharai</option><option value="Pahartali">Pahartali</option><option value="Panchlaish">Panchlaish</option><option value="Patenga">Patenga</option><option value="Patiya">Patiya</option><option value="Rangunia">Rangunia</option><option value="Raozan">Raozan</option><option value="Sandwip">Sandwip</option><option value="Satkania>Satkania</option><option value="Shodhorgat<">Shodhorgat</option><option value="Sitakunda">Sitakunda</option>';
            } else if (DisList == 'Bandarban') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bandarban Sadar">Bandarban Sadar</option><option value="Thanchi">Thanchi</option><option value="Lama">Lama</option><option value="Naikhongchhari">Naikhongchhari</option><option value="Ali kadam">Ali kadam</option><option value="Rowangchhari">Rowangchhari</option><option value="Ruma">Ruma</option>';
            } else if (DisList == 'Chandpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Chandpur Sadar">Chandpur Sadar</option><option value="Faridganj">Faridganj</option><option value="Haimchar">Haimchar</option><option value="Hajiganj">Hajiganj</option><option value="Kachua">Kachua</option><option value="Matlab Dakshin">Matlab Dakshin</option><option value="Matlab Uttar">Matlab Uttar</option><option value="Shahrasti">Shahrasti</option>';
            } else if (DisList == 'Brahmanbaria') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Akhaura">Akhaura</option><option value="Ashuganj">Ashuganj</option><option value="Bancharampur">Bancharampur</option><option value="Bijoynagar">Bijoynagar</option><option value="Brahmanbaria Sadar">Brahmanbaria Sadar</option><option value="Kasba">Kasba</option><option value="Nabinagar">Nabinagar</option><option value="Nasirnagar">Nasirnagar</option><option value="Sarail">Sarail</option>';
            } else if (DisList == 'Comilla') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Barura">Barura</option><option value="Brahmanpara">Brahmanpara</option><option value="Burichang">Burichang</option><option value="Chandina">Chandina</option><option value="Chauddagram">Chauddagram</option><option value="Comilla Sadar">Comilla Sadar</option><option value="Daudkandi">Daudkandi</option><option value="Debidwar">Debidwar</option><option value="Homna">Homna</option><option value="Laksam">Laksam</option><option value="Lalmai">Lalmai</option><option value="Manoharganj">Manoharganj</option><option value="Meghna">Meghna</option><option value="Muradnagar">Muradnagar</option><option value="Nangalkot">Nangalkot</option><option value="Sadar South">Sadar South</option><option value="Titas">Titas</option>';
            } else if (DisList == 'Cox`S Bazar') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Chakaria">Chakaria</option><option value="Cox`S Bazar Sadar">Cox`S Bazar Sadar</option><option value="Kutubdia">Kutubdia</option><option value="Maheshkhali">Maheshkhali</option><option value="Pekua">Pekua</option><option value="Ramu">Ramu</option><option value="Teknaf">Teknaf</option><option value="Ukhiya">Ukhiya</option>';
            } else if (DisList == 'Feni') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Chhagalnaiya">Chhagalnaiya</option><option value="Daganbhuiyan">Daganbhuiyan</option><option value="Feni Sadar">Feni Sadar</option><option value="Fulgazi">Fulgazi</option><option value="Parshuram">Parshuram</option><option value="Sonagazi">Sonagazi</option>';
            } else if (DisList == 'Khagrachhari') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Dighinala">Dighinala</option><option value="Guimara">Guimara</option><option value="Khagrachhari Sadar">Khagrachhari Sadar</option><option value="Laxmichhari">Laxmichhari</option><option value="Mahalchhari">Mahalchhari</option><option value="Manikchhari">Manikchhari</option><option value="Matiranga">Matiranga</option><option value="Panchari">Panchari</option><option value="Ramgarh">Ramgarh</option>';
            } else if (DisList == 'Lakshmipur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Kamalnagar">Kamalnagar</option><option value="Lakshmipur Sadar">Lakshmipur Sadar</option><option value="Raipur">Raipur</option><option value="Ramganj">Ramganj</option><option value="Ramgati">Ramgati</option>';
            } else if (DisList == 'Noakhali') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Begumganj">Begumganj</option><option value="Chatkhil">Chatkhil</option><option value="Companiganj">Companiganj</option><option value="Hatiya">Hatiya</option><option value="Kabirhat">Kabirhat</option><option value="Noakhali Sadar">Noakhali Sadar</option><option value="Senbagh">Senbagh</option><option value="Sonaimuri">Sonaimuri</option><option value="Subarnachar">Subarnachar</option>';
            } else if (DisList == 'Rangamati') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Baghaichari">Baghaichari</option><option value="Barkal">Barkal</option><option value="Bilaichari">Bilaichari</option><option value="Jurachhari">Jurachhari</option><option value="Kaptai">Kaptai</option><option value="Kowkhali">Kowkhali</option><option value="Langadu">Langadu</option><option value="Naniarchar">Naniarchar</option><option value="Rajasthali">Rajasthali</option><option value="Rangamati Sadar">Rangamati Sadar</option>';
            } else if (DisList == 'Dhaka') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Adabor">Adabor</option><option value="Airport">Airport</option><option value="Asulia">Asulia</option><option value="Badda">Badda</option><option value="Banani">Banani</option><option value="Bangshal">Bangshal</option><option value="Bhashantek">Bhashantek</option><option value="Cantonment">Cantonment</option><option value="Chawkbazar">Chawkbazar</option><option value="Dakshin Khan">Dakshin Khan</option><option value="Darussalam<">Darussalam</option><option value="Demra">Demra</option><option value="Dhaka Metro">Dhaka Metro</option><option value="Dhamrai">Dhamrai</option><option value="Dhanmondi">Dhanmondi</option><option value="Dohar">Dohar</option><option value="Gandaria">Gandaria</option><option value="Gulshan">Gulshan</option><option value="Hazaribagh">Hazaribagh</option><option value="Jatrabari">Jatrabari</option><option value="Kadamtali">Kadamtali</option><option value="Kafrul">Kafrul</option><option value="Kalabagan">Kalabagan</option><option value="Kalyanpur">Kalyanpur</option><option value="Kamrangir Char">Kamrangir Char</option><option value="Keraniganj">Keraniganj</option><option value="Khilgaon">Khilgaon</option><option value="Khilkhet">Khilkhet</option><option value="Kotwali">Kotwali</option><option value="Lalbagh">Lalbagh</option><option value="Mirpur">Mirpur</option><option value="Mohammadpur">Mohammadpur</option><option value="Motijheel">Motijheel</option><option value="Mugda">Mugda</option><option value="Nawabganj">Nawabganj</option><option value="New Market">New Market</option><option value="Pallabi">Pallabi</option><option value="Paltan">Paltan</option><option value="Ramna">Ramna</option><option value="Rampura">Rampura</option><option value="Rupnagar">Rupnagar</option><option value="Sabujbagh">Sabujbagh</option><option value="Savar">Savar</option><option value="Shah Ali">Shah Ali</option><option value="Shahbag">Shahbag</option><option value="Shahjahanpur">Shahjahanpur</option><option value="Sher E Bangla Nagar">Sher E Bangla Nagar</option><option value="Shyampur">Shyampur</option><option value="Sutrapur">Sutrapur</option><option value="Tejgaon">Tejgaon</option><option value="Tejgaon Industrial Area">Tejgaon Industrial Area</option><option value="Turag">Turag</option><option value="Uttar Khan">Uttar Khan</option><option value="Uttara">Uttara</option><option value="Uttara West">Uttara West</option><option value="Vatara">Vatara</option><option value="Wari">Wari</option>';
            } else if (DisList == 'Faridpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Alfadanga">Alfadanga</option><option value="Bhanga">Bhanga</option><option value="Boalmari">Boalmari</option><option value="Charbhadrasan">Charbhadrasan</option><option value="Faridpur Sadar">Faridpur Sadar</option><option value="Madhukhali">Madhukhali</option><option value="Nagarkanda">Nagarkanda</option><option value="Sadarpur">Sadarpur</option><option value="Saltha">Saltha</option>';
            } else if (DisList == 'Gazipur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Gazipur Sadar">Gazipur Sadar</option><option value="Kaliakair">Kaliakair</option><option value="Kaliganj">Kaliganj</option><option value="Kapasia">Kapasia</option><option value="Sreepur">Sreepur</option><option value="Tongi">Tongi</option>';
            } else if (DisList == 'Gopalganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Gopalganj Sadar">Gopalganj Sadar</option><option value="Kashiani">Kashiani</option><option value="Kotalipara">Kotalipara</option><option value="Muksudpur">Muksudpur</option><option value="Tungipara">Tungipara</option>';
            } else if (DisList == 'Kishoreganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Austagram">Austagram</option><option value="Bajitpur">Bajitpur</option><option value="Bhairab">Bhairab</option><option value="Hossainpur">Hossainpur</option><option value="Itna">Itna</option><option value="Karimganj">Karimganj</option><option value="Katiadi">Katiadi</option><option value="Kishoreganj Sadar">Kishoreganj Sadar</option><option value="Kuliarchar">Kuliarchar</option><option value="Mithamoin">Mithamoin</option><option value="Nikli">Nikli</option><option value="Pakundia">Pakundia</option><option value="Tarail">Tarail</option>';
            } else if (DisList == 'Madaripur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Kalkini">Kalkini</option><option value="Madaripur Sadar">Madaripur Sadar</option><option value="Rajoir">Rajoir</option><option value="Shibchar">Shibchar</option>';
            } else if (DisList == 'Manikganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Daulatpur">Daulatpur</option><option value="Ghior">Ghior</option><option value="Harirampur">Harirampur</option><option value="Manikganj Sadar">Manikganj Sadar</option><option value="Saturia">Saturia</option><option value="Shibalaya">Shibalaya</option><option value="Singair">Singair</option>';
            } else if (DisList == 'Munshiganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Gazaria">Gazaria</option><option value="Louhajang">Louhajang</option><option value="Munshiganj Sadar">Munshiganj Sadar</option><option value="Sirajdikhan">Sirajdikhan</option><option value="Sreenagar">Sreenagar</option><option value="Tongibari">Tongibari</option>';
            } else if (DisList == 'Narayanganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Araihazar">Araihazar</option><option value="Bandar">Bandar</option><option value="Fatullah">Fatullah</option><option value="Narayanganj Sadar">Narayanganj Sadar</option><option value="Rupganj">Rupganj</option><option value="Sonargaon">Sonargaon</option>';
            } else if (DisList == 'Narsingdi') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Belabo">Belabo</option><option value="Monohardi">Monohardi</option><option value="Narsingdi Sadar">Narsingdi Sadar</option><option value="Palash">Palash</option><option value="Raipura">Raipura</option><option value="Shibpur">Shibpur</option>';
            } else if (DisList == 'Rajbari') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Baliakandi">Baliakandi</option><option value="Goalanda">Goalanda</option><option value="Kalukhali">Kalukhali</option><option value="Pangsha">Pangsha</option><option value="Rajbari Sadar">Rajbari Sadar</option>';
            } else if (DisList == 'Shariatpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bhaderganj">Bhaderganj</option><option value="Damudya">Damudya</option><option value="Gosairhat">Gosairhat</option><option value="Naria">Naria</option><option value="Palong">Palong</option><option value="Shariatpur Sadar">Shariatpur Sadar</option><option value="Zajira">Zajira</option>';
            } else if (DisList == 'Tangail') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Basail">Basail</option><option value="Bhuapur">Bhuapur</option><option value="Delduar">Delduar</option><option value="Dhanbari">Dhanbari</option><option value="Ghatail">Ghatail</option><option value="Gopalpur>Gopalpur</option><option value="Kalihati">Kalihati</option><option value="Madhupur">Madhupur</option><option value="Mirzapur">Mirzapur</option><option value="Nagarpur">Nagarpur</option><option value="Sakhipur">Sakhipur</option><option value="Tangail Sadar">Tangail Sadar</option>>';
            } else if (DisList == 'Bagerhat') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bagerhat Sadar">Bagerhat Sadar</option><option value="Chitalmari">Chitalmari</option><option value="Fakirhat">Fakirhat</option><option value="Kachua">Kachua</option><option value="Mollahat">Mollahat</option><option value="Mongla">Mongla</option><option value="Morrelganj">Morrelganj</option><option value="Rampal">Rampal</option><option value="Sarankhola">Sarankhola</option>';
            } else if (DisList == 'Chuadanga') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Alamdanga">Alamdanga</option><option value="Chuadanga Sadar">Chuadanga Sadar</option><option value="Damurhuda">Damurhuda</option><option value="Jiban Nagar">Jiban Nagar</option>';
            } else if (DisList == 'Jessore') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Abhaynagar">Abhaynagar</option><option value="Bagherpara">Bagherpara</option><option value="Chougachha">Chougachha</option><option value="Jessore Sadar">Jessore Sadar</option><option value="Jhikargachha">Jhikargachha</option><option value="Keshabpur">Keshabpur</option><option value="Manirampur">Manirampur</option><option value="Sharsha">Sharsha</option>';
            } else if (DisList == 'Jinaidaha') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Harinakunda">Harinakunda</option><option value="Jhenaidah Sadar">Jhenaidah Sadar</option><option value="Kaliganj">Kaliganj</option><option value="Kotchandpur">Kotchandpur</option><option value="Moheshpur">Moheshpur</option><option value="Shailkupa">Shailkupa</option>';
            } else if (DisList == 'Khulna') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Aranghata">Aranghata</option><option value="Batiaghata">Batiaghata</option><option value="Dakop">Dakop</option><option value="Daulatpur">Daulatpur</option><option value="Dighulia">Dighulia</option><option value="Dumuria">Dumuria</option><option value="Fultala">Fultala</option><option value="Harintana">Harintana</option><option value="Kayra">Kayra</option><option value="Khalishpur">Khalishpur</option><option value="Khanjahan Ali">Khanjahan Ali</option><option value="Khulna Metro">Khulna Metro</option><option value="Khulna Sadar">Khulna Sadar</option><option value="Labanchora">Labanchora</option><option value="Paikgacha">Paikgacha</option><option value="Rupsha">Rupsha</option><option value="Sonadanga">Sonadanga</option><option value="Terakhada">Terakhada</option>';
            } else if (DisList == 'Kushtia') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bheramara">Bheramara</option><option value="Daulatpur">Daulatpur</option><option value="Khoksa">Khoksa</option><option value="Kumarkhali">Kumarkhali</option><option value="Kushtia Sadar">Kushtia Sadar</option><option value="Mirpur">Mirpur</option>';
            } else if (DisList == 'Magura') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Magura Sadar">Magura Sadar</option><option value="Mohammadpur">Mohammadpur</option><option value="Shalikha">Shalikha</option><option value="Sreepur">Sreepur</option>';
            } else if (DisList == 'Meherpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Gangni">Gangni</option><option value="Meherpur Sadar">Meherpur Sadar</option><option value="Mujibnagar">Mujibnagar</option>';
            } else if (DisList == 'Narail') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Kalia">Kalia</option><option value="Lohagara">Lohagara</option><option value="Narail Sadar">Narail Sadar</option>';
            } else if (DisList == 'Satkhira') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Assasuni">Assasuni</option><option value="Debhata">Debhata</option><option value="Kalaroa">Kalaroa</option><option value="Kaliganj">Kaliganj</option><option value="Satkhira Sadar">Satkhira Sadar</option><option value="Shyamnagar">Shyamnagar</option><option value="Tala">Tala</option>';
            } else if (DisList == 'Mymensingh') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bhaluka">Bhaluka</option><option value="Dhobaura">Dhobaura</option><option value="Fulbaria">Fulbaria</option><option value="Fulpur">Fulpur</option><option value="Gaffargaon">Gaffargaon</option><option value="Gouripur">Gouripur</option><option value="Haluaghat">Haluaghat</option><option value="Iswarganj">Iswarganj</option><option value="Muktagachha">Muktagachha</option><option value="Mymensingh Sadar">Mymensingh Sadar</option><option value="Nandail">Nandail</option><option value="Tarakanda">Tarakanda</option><option value="Trishal">Trishal</option>';
            } else if (DisList == 'Jamalpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bakshiganj">Bakshiganj</option><option value="Dewanganj">Dewanganj</option><option value="Islampur">Islampur</option><option value="Jamalpur Sadar">Jamalpur Sadar</option><option value="Madarganj">Madarganj</option><option value="Melandah">Melandah</option><option value="Sarishabari">Sarishabari</option>';
            } else if (DisList == 'Netrokona') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Atpara">Atpara</option><option value="Barhatta">Barhatta</option><option value="Durgapur">Durgapur</option><option value="Kalmakanda">Kalmakanda</option><option value="Kendua">Kendua</option><option value="Khaliajuri">Khaliajuri</option><option value="Madan">Madan</option><option value="Mohanganj">Mohanganj</option><option value="Netrokona Sadar">Netrokona Sadar</option><option value="Purbadhala">Purbadhala</option>';
            } else if (DisList == 'Sherpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Jhenaigati">Jhenaigati</option><option value="Nakla">Nakla</option><option value="Nalitabari">Nalitabari</option><option value="Sherpur Sadar">Sherpur Sadar</option><option value="Sreebordi">Sreebordi</option>';
            } else if (DisList == 'Rajshahi') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bagha">Bagha</option><option value="Baghmara">Baghmara</option><option value="Boalia">Boalia</option><option value="Charghat">Charghat</option><option value="Durgapur">Durgapur</option><option value="Godagari">Godagari</option><option value="Matihar">Matihar</option><option value="Mohanpur">Mohanpur</option><option value="Paba">Paba</option><option value="Puthia">Puthia</option><option value="Rajpara">Rajpara</option><option value="Rajshahi Metro">Rajshahi Metro</option><option value="Shah Makhdum">Shah Makhdum</option><option value="Tanore">Tanore</option>';
            } else if (DisList == 'Chapainawabganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bholahat">Bholahat</option><option value="Chapai Nawabganj Sadar">Chapai Nawabganj Sadar</option><option value="Gomastapur">Gomastapur</option><option value="Nachol">Nachol</option><option value="Shibganj">Shibganj</option>';
            } else if (DisList == 'Joypurhat') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Akkelpur">Akkelpur</option><option value="Joypurhat Sadar">Joypurhat Sadar</option><option value="Kalai">Kalai</option><option value="Khetlal">Khetlal</option><option value="Panchbibi">Panchbibi</option>';
            } else if (DisList == 'Naogaon') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Atrai">Atrai</option><option value="Badalgachhi">Badalgachhi</option><option value="Dhamoirhat">Dhamoirhat</option><option value="Manda">Manda</option><option value="Mohadebpur">Mohadebpur</option><option value="Naogaon Sadar">Naogaon Sadar</option><option value="Niamatpur">Niamatpur</option><option value="Patnitala">Patnitala</option><option value="Porsha">Porsha</option><option value="Raninagar">Raninagar</option><option value="Sapahar">Sapahar</option>';
            } else if (DisList == 'Natore') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bagatipara">Bagatipara</option><option value="Baraigram">Baraigram</option><option value="Gurudaspur">Gurudaspur</option><option value="Lalpur">Lalpur</option><option value="Naldanga">Naldanga</option><option value="Natore Sadar">Natore Sadar</option><option value="Singra">Singra</option>';
            } else if (DisList == 'Pabna') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Atgharia">Atgharia</option><option value="Bera">Bera</option><option value="Bhangura">Bhangura</option><option value="Chatmohar">Chatmohar</option><option value="Faridpur">Faridpur</option><option value="Ishwardi">Ishwardi</option><option value="Pabna Sadar">Pabna Sadar</option><option value="Santhia">Santhia</option><option value="Sujanagar">Sujanagar</option>';
            } else if (DisList == 'Bogura') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Adamdighi">Adamdighi</option><option value="Bogra Sadar">Bogra Sadar</option><option value="Sherpur">Sherpur</option><option value="Dhunat">Dhunat</option><option value="Dhupchanchia">Dhupchanchia</option><option value="Gabtali">Gabtali</option><option value="Kahaloo">Kahaloo</option><option value="Nandigram">Nandigram</option><option value="Shajahanpur">Shajahanpur</option><option value="Sariakandi">Sariakandi</option><option value="Shibganj">Shibganj</option><option value="Sonatala">Sonatala</option>';
            } else if (DisList == 'Sirajganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Belkuchi">Belkuchi</option><option value="Chauhali">Chauhali</option><option value="Kamarkhanda">Kamarkhanda</option><option value="Kazipur">Kazipur</option><option value="Raiganj">Raiganj</option><option value="Shahjadpur">Shahjadpur</option><option value="Sirajganj Sadar">Sirajganj Sadar</option><option value="Tarash">Tarash</option><option value="Ullapara">Ullapara</option>';
            } else if (DisList == 'Rangpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Badarganj">Badarganj</option><option value="Gangachara">Gangachara</option><option value="Kaunia">Kaunia</option><option value="Mithapukur">Mithapukur</option><option value="Pirgacha">Pirgacha</option><option value="Pirganj">Pirganj</option><option value="Rangpur Sadar">Rangpur Sadar</option><option value="Taraganj">Taraganj</option>';
            } else if (DisList == 'Dinajpur') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Birampur">Birampur</option><option value="Birganj">Birganj</option><option value="Birol">Birol</option><option value="Bochaganj">Bochaganj</option><option value="Chirirbandar">Chirirbandar</option><option value="Dinajpur Sadar">Dinajpur Sadar</option><option value="Fulbari">Fulbari</option><option value="Ghoraghat">Ghoraghat</option><option value="Hakimpur">Hakimpur</option><option value="Kaharole">Kaharole</option><option value="Khansama">Khansama</option><option value="Nawabganj">Nawabganj</option><option value="Parbatipur">Parbatipur</option>';
            } else if (DisList == 'Gaibandha') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Fulchhari">Fulchhari</option><option value="Gaibandha Sadar">Gaibandha Sadar</option><option value="Gobindaganj">Gobindaganj</option><option value="Palashbari">Palashbari</option><option value="Sadullapur">Sadullapur</option><option value="Saghata">Saghata</option><option value="Sundarganj">Sundarganj</option>';
            } else if (DisList == 'Kurigram') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bhurungamari">Bhurungamari</option><option value="Char Rajibpur">Char Rajibpur</option><option value="Chilmari">Chilmari</option><option value="Fulbari">Fulbari</option><option value="Kurigram Sadar">Kurigram Sadar</option><option value="Nageshwari">Nageshwari</option><option value="Rajarhat">Rajarhat</option><option value="Rowmari">Rowmari</option><option value="Ulipur">Ulipur</option>';
            } else if (DisList == 'Lalmonirhat') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Aditmari">Aditmari</option><option value="Hatibandha">Hatibandha</option><option value="Kaliganj">Kaliganj</option><option value="Lalmonirhat Sadar">Lalmonirhat Sadar</option><option value="Patgram">Patgram</option>';
            } else if (DisList == 'Nilphamari') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Dimla">Dimla</option><option value="Domar">Domar</option><option value="Jaldhaka">Jaldhaka</option><option value="Kishoreganj">Kishoreganj</option><option value="Nilphamari Sadar">Nilphamari Sadar</option><option value="Saidpur">Saidpur</option>';
            } else if (DisList == 'Panchagarh') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Atwari">Atwari</option><option value="Boda">Boda</option><option value="Debiganj">Debiganj</option><option value="Panchagarh Sadar">Panchagarh Sadar</option><option value="Tetulia">Tetulia</option>';
            } else if (DisList == 'Thakurgaon') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Baliadangi">Baliadangi</option><option value="Haripur">Haripur</option><option value="Pirganj">Pirganj</option><option value="Ranisankail">Ranisankail</option><option value="Thakurgaon Sadar">Thakurgaon Sadar</option>';
            } else if (DisList == 'Habiganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Ajmiriganj">Ajmiriganj</option><option value="Bahubal">Bahubal</option><option value="Baniachong">Baniachong</option><option value="Chunarughat">Chunarughat</option><option value="Habiganj Sadar">Habiganj Sadar</option><option value="Lakhai">Lakhai</option><option value="Madhabpur">Madhabpur</option><option value="Nabiganj">Nabiganj</option><option value="Shaistaganj">Shaistaganj</option>';
            } else if (DisList == 'Sylhet') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Airport">Airport</option><option value="Balaganj">Balaganj</option><option value="Beanibazar">Beanibazar</option><option value="Bishwanath">Bishwanath</option><option value="Companiganj">Companiganj</option><option value="Fenchuganj">Fenchuganj</option><option value="Golapganj">Golapganj</option><option value="Gowainghat">Gowainghat</option><option value="Harzat Shah Paran">Harzat Shah Paran</option><option value="Jaintiapur">Jaintiapur</option><option value="Jalalabad">Jalalabad</option><option value="Kanaighat">Kanaighat</option><option value="Kowtali">Kowtali</option><option value="Moglabazar">Moglabazar</option><option value="Osmani Nagar">Osmani Nagar</option><option value="South Surma">South Surma</option><option value="Sylhet Sadar">Sylhet Sadar</option><option value="Zakiganj">Zakiganj</option>';
            } else if (DisList == 'Moulvibazar') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Barlekha">Barlekha</option><option value="Juri">Juri</option><option value="Kamalganj">Kamalganj</option><option value="Kulaura">Kulaura</option><option value="Maulvibazar Sadar">Maulvibazar Sadar</option><option value="Rajnagar">Rajnagar</option><option value="Sreemangal">Sreemangal</option>';
            } else if (DisList == 'Sunamganj') {
                var thanaList = '<option disabled selected>Select Upazila</option><option value="Bishwambarpur">Bishwambarpur</option><option value="Chhatak">Chhatak</option><option value="Derai">Derai</option><option value="Dharmapasha">Dharmapasha</option><option value="Dowarabazar">Dowarabazar</option><option value="Jagannathpur">Jagannathpur</option><option value="Jamalganj">Jamalganj</option><option value="Shalla">Shalla</option><option value="South Sunamganj">South Sunamganj</option><option value="Sunamganj Sadar">Sunamganj Sadar</option><option value="Tahirpur">Tahirpur</option>';
            } else if (DisList == "") {
                var thanaList = '<option disabled selected>Select Upazila</option>';
            } else if (DisList == "Select District") {
                var thanaList = '<option disabled selected>Select Upazila</option>';
            }
            document.getElementById("thana").innerHTML = thanaList;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showLocation);

            } else {
                $('#location').html('Geolocation is not supported by this browser.');
            }
        });

        function showLocation(position) {

            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            var v = lat + " " + lon;

            fetch(`https://api.geoapify.com/v1/geocode/reverse?lat=${lat}&lon=${lon}&apiKey=219d5b635b254055af57ef102c3836e6`)
                .then(response => response.json())
                .then(result => {
                    if (result.features.length) {
                        var state = result.features[0].properties.state;
                        var county = result.features[0].properties.county;
                    } else {
   
                    }
                });
        }
    </script>
</body>

</html>

