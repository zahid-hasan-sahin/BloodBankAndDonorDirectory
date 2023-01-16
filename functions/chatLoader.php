<?php
session_start();
include_once('db.php');
$conn = db();

$donorid = $_GET['donorid'];
$clientid = $_GET['clientid'];


$loggeindUser = -1;
if (isset($_SESSION["donor_id"])) {
    $loggeindUser = $_SESSION["donor_id"];
}


$query = mysqli_query($conn, "SELECT * from chat WHERE donor_id=" . $donorid . " and client_id=" . $clientid . " ORDER BY time ASC;");
$isLogged = false;
if (isset($_SESSION["loggedin"]) &&  $_SESSION["loggedin"] === true) {
    $isLogged = true;
}


$res = '<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div class="card">
    <div class="card-header">Chat</div>
    <div class="card-body height3">
        <ul class="chat-list">';

while ($row = mysqli_fetch_array($query)) {
    if ($isLogged) {
        if ($row['sender'] == 'client') {

            if ($row['donor_id'] == $loggeindUser) {
                $res = $res . ' <li class="in">
                <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                </div>
                <div class="chat-body">
                <div class="chat-message">
                <h5>Annanonymous User' . $row['client_id'] . '</h5>
                <p>' . $row['msg'] . '</p>
                </div>
                </div>
                </li>';
            } else {


                $res = $res . '<li class="out">
                <div class="chat-img">
                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                </div>
                <div class="chat-body">
                    <div class="chat-message">
                        <h5>You</h5>
                        <p>' . $row['msg'] . '</p>
                    </div>
                </div>
            </li>';
            }
        } else {
            if ($row['donor_id'] != $loggeindUser) {


                $q = mysqli_query($conn, "SELECT first_name,last_name from donor_info WHERE donor_id=" . $row['donor_id'] . ";");
                $fname = "";
                $lname = "";
                while ($r = mysqli_fetch_array($q)) {
                    $fname = $r['first_name'];
                    $lname = $r['last_name'];
                }



                $res = $res . ' <li class="in">
                <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                </div>
                <div class="chat-body">
                <div class="chat-message">
                <h5>' . $fname . ' ' . $lname . '</h5>
                <p>' . $row['msg'] . '</p>
                </div>
                </div>
                </li>';
            } else {
                $res = $res . '<li class="out">
                <div class="chat-img">
                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar5.png">
                </div>
                <div class="chat-body">
                    <div class="chat-message">
                        <h5>You</h5>
                        <p>' . $row['msg'] . '</p>
                    </div>
                </div>
            </li>';
            }
        }
    } else {

        if ($row['sender'] == 'donor') {

            $q = mysqli_query($conn, "SELECT first_name,last_name from donor_info WHERE donor_id=" . $row['donor_id'] . ";");
            $fname = "";
            $lname = "";
            while ($r = mysqli_fetch_array($q)) {
                $fname = $r['first_name'];
                $lname = $r['last_name'];
            }

            $res = $res . ' <li class="in">
                <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                </div>
                <div class="chat-body">
                <div class="chat-message">
                <h5>' . $fname . ' ' . $lname . '</h5>
                <p>' . $row['msg'] . '</p>
                </div>
                </div>
                </li>';
        } else {
            $res = $res . '<li class="out">
            <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar5.png">
            </div>
            <div class="chat-body">
                <div class="chat-message">
                    <h5>You</h5>
                    <p>' . $row['msg'] . '</p>
                </div>
            </div>
        </li>';
        }
    }
}













$res = $res . ' </ul></div></div></div>';
echo $res;
