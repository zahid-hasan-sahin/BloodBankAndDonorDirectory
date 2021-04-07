<?php
		function db(){
			$conn=mysqli_connect("localhost","root","","bdd-db");
			return $conn;
		}

		/* Attempt to connect to MySQL database */
		$link = mysqli_connect("localhost","root","","bdd-db");
		
		// Check connection
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
?>