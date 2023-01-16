<?php
include_once('db.php');
$conn = db();

$donor_id = $_POST['donorid'];
$client_id = $_POST['clientid'];
$msg = $_POST['msg'];

echo $donor_id;


$query = mysqli_query($conn, "INSERT into chat(donor_id,client_id,msg) VALUES('" . $donor_id . "','" . $client_id . "','" . $msg . "');");
