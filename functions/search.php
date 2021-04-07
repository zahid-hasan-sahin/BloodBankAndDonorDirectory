<?php
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'bdd-db';

// Connect with the database
$db =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = mysqli_query($db,"SELECT * FROM blood_bank WHERE thana LIKE '%".$searchTerm."%' AND disrict LIKE '%".$searchTerm."%' AND hide_data = 1 ORDER BY age ASC");

// Generate skills data array
$skillData = array();
if(mysqli_affected_rows($db)>0){
    while($row = mysqli_fetch_array($query)){
    		if(in_array($row['thana'], $skillData))
    				continue;
 array_push($skillData,$row['thana']);
    }
}

// Return results as json encoded array
echo json_encode($skillData);


    
?>
