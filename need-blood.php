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
        <title>Need Blood | Blood Donors Directory</title>
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


    <body onload="divisionsList();  thanaList();"> 

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
                        Need Blood
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Need Blood
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!-- TEAM SECTION -->

        <section class="section-content-block section-our-team">

            <div class="container wow fadeInUp">

                <div class="row section-heading-wrapper">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading"> SEARCH FOR  BLOOD DONORS</h2>
                        <p class="section-subheading"><a href='be-a-part'>Are you ready to donate blood ?</a></p>
                    </div> <!-- end .col-sm-10  -->                      

                </div>
               <center>
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

                 <form class="appoinment-form" id ="send" action="" >
                                <div class="form-group col-md-12 col-md-1">
                                </div>
                               <div class="form-group col-md-12 col-md-2">
                                    <select id="gp" class="form-control" placeholder="Blood Group" type="select" required  name="gp" >
                                        <option disabled selected value="">Blood Group</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-md-2">
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
                                <div class="form-group col-md-12 col-md-2">
                                    <select id="district" class="form-control" placeholder="Select District" type="select" required  name="district" onchange="thanaList();"></select>
                                </div>
                                <div class="form-group col-md-12 col-md-2">
                                    <select id="thana" class="form-control" placeholder="Select Thana" type="select" required  name="thana"></select>
                                </div>
                                <!-- <div class="form-group col-md-12 col-md-4">
                                    <input id="place" class="form-control" placeholder="Place" type="text"  name="place" width="15%">
                                </div> -->
                               
                                <div class="form-group col-md-12 col-md-1">
                                    <button  class="btn-submit" type="submit" id="but">search </button>
                                </div>
                           
                            <div >
                            </form>
                            </center>
                                <br>
                               
        <div class="col-md-12 col-sm-12 text-center" id="count"> </div>


            <div id="tableview" class="col-md-12 col-sm-12 text-center" ></div>

</div>
            </div> <!-- end .container  -->

        </section> <!--  end .section-our-team -->  


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
         <script src="js/ajax.js"></script>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
<script>
$(function() {
    $("#thana").autocomplete({
        source: "functions/search.php",
    });
});
</script>

        <script type="text/javascript">
            
          $(document).ready(function(){
                      
                $("#send").submit(function(){
                    $(".appoinment-form .btn-submit").css("background-color", "#efb2b5");
                    $(".appoinment-form .btn-submit").css("border", "#debbbc");
                    $("#but").attr("disabled","disabled");
                    $("#but").html("searching...");
                    $(".alert").hide();
                   $("#tableview").slideUp("slow");
                   $("#count").slideUp("slow"); 
                    $.ajax({
                        type: "POST",
                        url: "functions/fetch.php",
                        data: $("#send").serialize(),
                        dataType: "json",
                       
                        success: function(data){
                            $("#but").html("search");
                            $("#but").removeAttr("disabled","disabled");
                            $(".appoinment-form .btn-submit").css("background-color", "#FE3C47");
                            $(".appoinment-form .btn-submit").css("border", "2px solid #FE3C47");
                            var fulldata;
                            if(data.no>0){
                            fulldata=data.details;
                                     $("#count").slideDown("slow");   
                                $("#count").html("<h4> <font color='green'>"+data.no+" Result is Found</font>");
                                        
                                        
                                    $("#tableview").slideDown("slow");
                                $("#tableview").html(fulldata);}
                                else{
                                        $("#count").slideDown("slow");  
                                    $("#count").html("<h4> <font color='Red'>No Results Found</h4></font>");
                                    $("#tableview").html("");
                                }
                            /*$("#but").html("SUBMIT");
                            $("#but").removeAttr("disabled","disabled");
                            $(".appoinment-form .btn-submit").css("background-color", "#FE3C47");
                            $(".appoinment-form .btn-submit").css("border", "2px solid #FE3C47");
                            $("#al").html("<div class='"+ data.class +"'>"+ data.msg+"</div>");
                            if(data.status=='sucess'){
                                $('#send').trigger("reset");
                                    $("#gp").val("");*/
                            
                            
                        },
                        error: function(){
                            // $("#but").html("SUBMIT");
                            // $("#but").removeAttr("disabled","disabled");
                            // $(".appoinment-form .btn-submit").css("background-color", "#FE3C47");
                            // $(".appoinment-form .btn-submit").css("border", "2px solid #FE3C47");
                            // $("#al").html("<div class='alert alert-danger'> <strong>Error!</strong> Oops something went wrong-(#A629)</div>");
                        }
                    });
                    
                    //for post
                    return false;
                
                
                });
            
            
            });
        </script>

   

    </body>

</html>