<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "functions/db.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please Enter E-mail.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please Enter Your Password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT donor_id,email,password FROM login_info WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["donor_id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid Email or Password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid Email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
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
        <title>Login | Blood Donors Directory</title>
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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


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
                                <li><a style="text-decoration: underline solid #FE3C47 3px; text-underline-offset: 2px;" href="login" title="<?php if ($donorID == null) {echo "LOGIN";} else {echo ucfirst($userdata['first_name'])."'s Dashboard";} ?>">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

        </header> <!-- end main-header  -->

        <section class="section-appointment">

<div style="display: flex; justify-content: center;" class="container wow fadeInUp">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
            <div class="appointment-form-wrapper text-center clearfix">
                <h3 class="join-heading">Login</h3>
                <p style="padding-bottom:10px;">Enter Your E-mail Address And Password</p>
            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <form class="appoinment-form" id ="send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    <input type="text" name="email" placeholder="Enter Your Email Address" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                </div>    
                <div class="form-group">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    <input type="password" placeholder="Enter Your Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-submit" value="Login">
                </div>
                <p style="padding-top:20px;">Don't have an account? <a href="be-a-part.php">Be A Donor</a></p>
            </form>
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
                        <script src="js/ajax.js"></script>
                        <script type="text/javascript">
    </body>

</html>