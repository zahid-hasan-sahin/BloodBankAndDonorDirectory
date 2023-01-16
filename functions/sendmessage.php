<?php
session_start();
include_once('db.php');
$conn = db();

$donor_id = $_POST['donorid'];
$client_id = $_POST['clientid'];
$msg = $_POST['msg'];
$sender = "client";
if (isset($_SESSION["loggedin"]) &&  $_SESSION["loggedin"] === true && $_SESSION["donor_id"] == $donor_id) {
    $sender = "donor";
}


$query = mysqli_query($conn, "INSERT into chat(donor_id,client_id,msg,sender) VALUES('" . $donor_id . "','" . $client_id . "','" . $msg . "','" . $sender . "');");
echo json_encode("done");
