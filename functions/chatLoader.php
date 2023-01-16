<?php
session_start();
include_once('db.php');
$conn = db();

$donorid = $_GET['donorid'];
$clientid = $_GET['clientid'];


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
            $res = $res . ' <li class="in">
                            <div class="chat-img">
                            <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                            </div>
                            <div class="chat-body">
                            <div class="chat-message">
                            <h5>Jimmy Willams</h5>
                            <p>' . $row['msg'] . '</p>
                            </div>
                            </div>
                            </li>';
        } else {
            $res = $res . '<li class="out">
            <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar3.png">
            </div>
            <div class="chat-body">
                <div class="chat-message">
                    <h5>Serena</h5>
                    <p>' . $row['msg'] . '</p>
                </div>
            </div>
        </li>';
        }
    } else {

        if ($row['sender'] == 'donor') {
            $res = $res . ' <li class="in">
                            <div class="chat-img">
                            <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                            </div>
                            <div class="chat-body">
                            <div class="chat-message">
                            <h5>Jimmy Willams</h5>
                            <p>' . $row['msg'] . '</p>
                            </div>
                            </div>
                            </li>';
        } else {
            $res = $res . '<li class="out">
            <div class="chat-img">
                <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar3.png">
            </div>
            <div class="chat-body">
                <div class="chat-message">
                    <h5>Serena</h5>
                    <p>' . $row['msg'] . '</p>
                </div>
            </div>
        </li>';
        }
    }
}













$res = $res . ' </ul></div></div></div>';
echo $res;

/*

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
*/
