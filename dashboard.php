<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
// error_reporting(0);
include_once('functions/db.php');
$conn=db();
// Include config file
require_once "functions/db.php";
$donorID = $_SESSION["donor_id"];
$qry = mysqli_query($conn,"SELECT * FROM donor_info WHERE donor_id = '$donorID'");
$userdata = mysqli_fetch_array($qry);
$_age = floor((time() - strtotime($userdata['age'])) / 31556926);


if(isset($_POST['update'])) {
    $division=strtolower($_POST['divisions']);
    $district=strtolower($_POST['district']);
    $thana=strtolower($_POST['thana']);
    mysqli_query($conn,"UPDATE donor_info SET divisions = '$division', district = '$district', thana = '$thana' WHERE donor_id = '$donorID'");
    $message = "Record Modified Successfully";
    }
    $result = mysqli_query($conn,"SELECT * FROM donor_info WHERE donor_id = '$donorID'");
    $userdata= mysqli_fetch_array($result);

if(isset($_POST['hide_data'])) {
    $hide_data=strtolower($_POST['hide_data']);
    mysqli_query($conn,"UPDATE donor_info SET hide_data = '$hide_data' WHERE donor_id = '$donorID'");
    }
    $result = mysqli_query($conn,"SELECT * FROM donor_info WHERE donor_id = '$donorID'");
    $userdata= mysqli_fetch_array($result);
?>
<?php
    if(isset($_POST['save']))
    {	 
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
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

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
                                <a href="https://facebook.com/nabilnewaz.5" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="mailto:nabilnewaz@gmail.com" target="_top"><i class="fa fa-envelope-o"></i></a>
                                <a href="https://wa.me/8801714940700"><i class="fa fa-whatsapp"></i></a>
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
                            Hi, <b style="line-height: 1.7;"><?php echo ucfirst($userdata['first_name'])." ".ucfirst($userdata['last_name']);?></b><br/>Welcome to your dashboard
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / User Dashboard
                        </p>
                        <p>
                        <form style= "margin-bottom:10px;" id ="send" method="post">
                            <button class="btn <?php if ($userdata['hide_data'] == '0') {echo "btn-success";} else {echo "btn-warning";} ?>" type="submit" name="hide_data" value="<?php if ($userdata['hide_data'] == '0') {echo "1";} else {echo "0";} ?>"><?php if ($userdata['hide_data'] == '0') {echo "UnHide Me";} else {echo "Hide Me";} ?></button>
                        </form>
                            <a href="reset-password.php" class="btn btn-primary">Reset Your Password</a>
                            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
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
                            <input class="form-control" type="text" value="First Name : <?php echo ucfirst($userdata['first_name']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Last Name : <?php echo ucfirst($userdata['last_name']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Phone Number : <?php echo ucfirst($userdata['phno']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="NID Number : <?php echo ucfirst($userdata['nid']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Blood Group : <?php echo strtoupper($userdata['gp']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Gender : <?php echo ucfirst($userdata['gender']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Date Of Bitrh : <?php echo ucfirst($userdata['age']);?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control" type="text" value="Age : <?php echo ucfirst($_age);?>" disabled>
                        </div>

                    </div> <!-- end .appointment-form-wrapper  -->

                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Update Your Location</h3>
                        <p style="padding-bottom:10px;">Your Current Location</p>

                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="Division : <?php echo ucfirst($userdata['divisions']);?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="District : <?php echo ucwords($userdata['district']);?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" value="Thana : <?php echo ucwords($userdata['thana']);?>" disabled>
                        </div>
                        <div class="col-md-12">

                        <p style="padding-top:10px;">Change Location</p>
                        <?php 
                        if(!empty($message)){
                            echo '<div class="alert alert-success">' . $message . '</div>';
                        }        
                        ?>
                        <div id="al">
                            
                        </div>
                        </div>
                <form class="appoinment-form" id ="send" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group col-md-4">
                        <select id="divisions" class="form-control" placeholder="Select Division" type="select" required  name="divisions" onchange="divisionsList();">
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
                        <select id="district" class="form-control" placeholder="Select District" type="select" required  name="district" onchange="thanaList();"></select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="thana" class="form-control" placeholder="Select Thana" type="select" required  name="thana"></select>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <input type="submit" class="btn-submit" name="update" value="Update">
                    </div>
                </form>

                </div> <!-- end .appointment-form-wrapper  -->

                    <div class="appointment-form-wrapper text-center clearfix">
                            <h3 class="join-heading">Give New Recipient Informetion</h3>
                            <?php 
                            if(!empty($message_re)){
                                echo '<div class="alert alert-success">' . $message_re . '</div>';
                            }        
                            ?>
                            <div id="al">
                            
                            </div>
                            <form class="appoinment-form" id ="send" method="post">

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
                                    <select id="gender" class="form-control" placeholder="Gender" type="select" required  name="re_gender">
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
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
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
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td data-label='Name:'>" . ucwords($row['re_name']) . "</td>";
                                                echo "<td data-label='Phone No: '>" . ucwords($row['re_phno']) . "</td>";
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
                                    } else{
                                        echo "No Records Matching Were Found.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }

                            ?>

                        </div> <!-- end .appointment-form-wrapper  -->

                </div> <!--  end .col-lg-6 -->

            </div> <!--  end .row  -->

        </div> <!--  end .container -->

</section>  <!--  end .appointment-section  -->


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

                                        <i class="fa fa-phone fa-contact"></i> <p>Phone:&nbsp;  +880 1714 940 700                           

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
                                        <li>
                                            <a href="https://nabilnewaz.com">
                                                <i class="fa fa-caret-right fa-footer"></i>
                                                Developer Website
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
                           
                            <p > Copyright © Blood Donares Directory <?php echo date('Y');?>. All rights reserved</p>

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
                            if(diviList == 'Barishal'){		
                                var disctList = '<option disabled selected>Select District</option><option value="Barguna">Barguna</option><option value="Barishal">Barishal</option><option value="Bhola">Bhola</option><option value="Jhalokati">Jhalokati</option><option value="Patuakhali">Patuakhali</option><option value="Pirojpur">Pirojpur</option>';
                            }
                            // set Chattogram division districts
                            else if(diviList == 'Chattogram') {
                                var disctList = '<option disabled selected>Select District</option><option value="Bandarban">Bandarban</option><option value="Chandpur">Chandpur</option><option value="Chattogram">Chattogram</option><option value="Cumilla">Cumilla</option><option value="Cox\'s Bazar">Cox\'s Bazar</option><option value="Feni">Feni</option><option value="Khagrachhari">Khagrachhari</option><option value="Noakhali">Noakhali</option><option value="Rangamati">Rangamati</option>';	
                            }
                            // set Dhaka division districts
                            else if(diviList == 'Dhaka') {
                                var disctList = '<option disabled selected>Select District</option><option value="Dhaka">Dhaka</option><option value="Faridpur">Faridpur</option><option value="Gazipur">Gazipur</option><option value="Gopalganj">Gopalganj</option><option value="Kishoreganj">Kishoreganj</option><option value="Madaripur">Madaripur</option><option value="Manikganj">Manikganj</option><option value="Munshiganj">Munshiganj</option><option value="Narayanganj">Narayanganj</option><option value="Narsingdi">Narsingdi</option><option value="Rajbari">Rajbari</option><option value="Shariatpur">Shariatpur</option><option value="Tangail">Tangail</option>';
                            }
                            // set Khulna division districts
                            else if(diviList == 'Khulna') {
                                var disctList = '<option disabled selected>Select District</option><option value="Bagerhat">Bagerhat</option><option value="Chuadanga">Chuadanga</option><option value="Jessore">Jessore</option><option value="Jinaidaha">Jinaidaha</option><option value="Khulna">Khulna</option><option value="Magura">Magura</option><option value="Meherpur">Meherpur</option><option value="Narail">Narail</option><option value="Satkhira">Satkhira</option>';
                            }
                            // set Mymensingh division districts
                            else if(diviList == 'Mymensingh') {
                                var disctList = '<option disabled selected>Select District</option><option value="Mymensingh">Mymensingh</option><option value="Netrokona">Netrokona</option><option value="Jamalpur">Jamalpur</option><option value="Sherpur">Sherpur</option>';           
                            }
                            // set Rajshahi division districts
                            else if(diviList == 'Rajshahi') {
                                var disctList = '<option disabled selected>Select District</option><option value="Rajshahi">Rajshahi</option><option value="Natore">Natore</option><option value="Pabna">Pabna</option><option value="Bogura">Bogura</option><option value="Chapainawabganj">Chapainawabganj</option><option value="Joypurhat">Joypurhat</option><option value="Naogaon">Naogaon</option><option value="Sirajganj">Sirajganj</option>';
                            }
                            // set Rangpur division districts
                            else if(diviList == 'Rangpur') {
                                var disctList = '<option disabled selected>Select District</option><option value="Rangpur">Rangpur</option><option value="Dinajpur">Dinajpur</option><option value="Kurigram">Kurigram</option><option value="Nilphamari">Nilphamari</option><option value="Gaibandha">Gaibandha</option><option value="Thakurgaon">Thakurgaon</option><option value="Panchagarh">Panchagarh</option><option value="Lalmonirhat">Lalmonirhat</option>';
                            }
                            // set Sylhet division districts
                            else if(diviList == 'Sylhet') {
                                var disctList = '<option disabled selected>Select District</option><option value="Habiganj">Habiganj</option><option value="Moulvibazar">Moulvibazar</option><option value="Sunamganj">Sunamganj</option><option value="Sylhet">Sylhet</option>';           
                            }
                            else if(diviList == 'Select Division') {
                                var disctList = '<option value="" disabled selected>Select District</option>';
                            }
                            //  set/send districts name to District lists from division
                            document.getElementById("district").innerHTML= disctList;
                        }

                        // Thana Section select
                        function thanaList(){
                            var DisList = document.getElementById('district').value;
                            if(DisList == 'Barishal') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Agailjhara">Agailjhara</option><option value="Babuganj">Babuganj</option><option value="Bakerganj">Bakerganj</option><option value="Banaripara">Banaripara</option><option value="Barishal Sadar">Barisal Sadar</option><option value="Gournadi">Gournadi</option><option value="Hizla">Hizla</option><option value="Mehendiganj">Mehendiganj</option><option value="Muladi">Muladi</option><option value="Wazirpur">Wazirpur</option>';
                            }
                            else if(DisList == 'Barguna') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Amtali">Amtali</option><option value="Bamna">Bamna</option><option value="Barguna Sadar">Barguna Sadar</option><option value="Betagi">Betagi</option><option value="Patharghata">Patharghata</option><option value="Taltali">Taltali</option>';
                            }
                            else if(DisList == 'Bhola') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bhola Sadar">Bhola Sadar</option><option value="Daulatkhan">Daulatkhan</option><option value="Burhanuddin">Burhanuddin</option><option value="Tazumuddin">Tazumuddin</option><option value="Lalmohan">Lalmohan</option><option value="Char Fasson">Char Fasson</option><option value="Manpura">Manpura</option>';
                            }
                            else if(DisList == 'Jhalokati') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Jhalokati Sadar">Jhalokati Sadar</option><option value="Kathalia">Kathalia</option><option value="Nalchity">Nalchity</option><option value="Rajapur">Rajapur</option>';
                            }
                            else if(DisList == 'Patuakhali') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bauphal">Bauphal</option><option value="Galachipa">Galachipa</option><option value="Dashmina">Dashmina</option><option value="Kalapara">Kalapara</option><option value="Mirzaganj">Mirzaganj</option><option value="Patuakhali Sadar">Patuakhali Sadar</option><option value="Dumki">Dumki</option><option value="Rangabali">Rangabali</option>';
                            }
                            else if(DisList == 'Pirojpur') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bhandaria">Bhandaria</option><option value="Kawkhali">Kawkhali</option><option value="Mathbaria">Mathbaria</option><option value="Nazirpur">Nazirpur</option><option value="Nesarabad">Nesarabad</option><option value="Pirojpur Sadar">Pirojpur Sadar</option><option value="Indurkani">Indurkani</option>';
                            }
                            else if(DisList == 'Chittagong') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Anwara">Anwara</option><option value="Banshkhali">Banshkhali</option><option value="Boalkhali">Boalkhali</option><option value="Chandanaish">Chandanaish</option><option value="Fatikchhari">Fatikchhari</option>';
                            }
                            else if(DisList == 'Dhaka') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Dhamrai">Dhamrai</option><option value="Dohar">Dohar</option><option value="Savar">Savar</option>';
                            }
                            else if(DisList == 'Gazipur') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Gazipur Sadar">Gazipur Sadar</option><option value="Kapasia">Kapasia</option><option value="Kaliganj">Kaliganj</option>';
                            }
                            else if(DisList == 'Tangail') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Basail">Basail</option><option value="Madhupur">Madhupur</option><option value="Mirzapur">Mirzapur</option>';
                            }
                            else if(DisList == 'Bagerhat') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bagerhat Sadar">Bagerhat Sadar</option><option value="Fakirhat">Fakirhat</option><option value="Rampal">Rampal</option>';
                            }
                            else if(DisList == 'Jessore') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Abhaynagar">Abhaynagar</option><option value="Jessore Sadar">Jessore Sadar</option><option value="Keshabpur">Keshabpur</option>';
                            }
                            else if(DisList == 'Khulna') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Batiaghata">Batiaghata</option><option value="Khan Jahan Ali">Khan Jahan Ali</option><option value="Rupsa">Rupsa </option><option value="Sonadanga">Sonadanga</option><option value="Phultala">Phultala</option>';
                            }
                            else if(DisList == 'Satkhira') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Satkhira Sadar">Satkhira Sadar</option><option value="Tala">Tala</option><option value="Kaliganj">Kaliganj</option>';
                            }
                            else if(DisList == 'Mymensingh') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bhaluka">Bhaluka</option><option value="Fulbaria">Fulbaria</option><option value="Nandail">Nandail</option>';
                            }
                            else if(DisList == 'Jamalpur') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Dewanganj">Dewanganj</option><option value="Islampur">Islampur</option><option value="Jamalpur Sadar">Jamalpur Sadar</option>';
                            }
                            else if(DisList == 'Rajshahi') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bagha">Bagha</option><option value="Bagmara">Bagmara</option><option value="Chandrima">Chandrima</option>';
                            }
                            else if(DisList == 'Natore') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Bagatipara">Bagatipara</option><option value="Natore Sadar">Natore Sadar</option><option value="Singra">Singra</option>';
                            }
                            else if(DisList == 'Sirajganj') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Sirajganj Sadar">Sirajganj Sadar</option><option value="Ullahpara">Ullahpara</option><option value="Belkuchi">Belkuchi</option>';
                            }
                            else if(DisList == 'Rangpur') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Badarganj">Badarganj</option><option value="Gangachara">Gangachara</option><option value="Rangpur Sadar">Rangpur Sadar</option>';
                            }
                            else if(DisList == 'Nilphamari') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Saidpur">Saidpur</option><option value="Saidpur">Saidpur</option><option value="Nilphamari Sadar">Nilphamari Sadar</option>';
                            }
                            else if(DisList == 'Habiganj') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Ajmiriganj">Ajmiriganj</option><option value="Bahubal">Bahubal</option><option value="Habiganj Sadar">Habiganj Sadar</option>';
                            }
                            else if(DisList == 'Sylhet') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Balaganj">Balaganj</option><option value="Fenchuganj">Fenchuganj</option><option value="Sylhet Sadar">Sylhet Sadar</option>';
                            }
                            else if(DisList == 'Moulvibazar') {
                                var thanaList = '<option disabled selected>Select Thana</option><option value="Sreemangal">Sreemangal</option><option value="Rajnagar">Rajnagar</option><option value="Moulvibazar Sadar">Moulvibazar Sadar</option>';
                            }
                            else if(DisList == 'Bogura') {
                            var thanaList = '<option disabled selected>Select Thana</option><option value="Adamdighi">Adamdighi</option><option value="Bogra Sadar">Bogra Sadar</option><option value="Sherpur">Sherpur</option><option value="Dhunat">Dhunat</option><option value="Dhupchanchia">Dhupchanchia</option><option value="Gabtali">Gabtali</option><option value="Kahaloo">Kahaloo</option><option value="Nandigram">Nandigram</option><option value="Shajahanpur">Shajahanpur</option><option value="Sariakandi">Sariakandi</option><option value="Shibganj">Shibganj</option><option value="Sonatala">Sonatala</option>';
                            }
                            else if(DisList == "") {
                                var thanaList = '<option disabled selected>Select Thana</option>';
                            }
                            document.getElementById("thana").innerHTML= thanaList;
                        }
                        </script>
    </body>

</html>