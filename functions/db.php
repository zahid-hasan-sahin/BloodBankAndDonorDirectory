<?php
		function db(){
			$conn=mysqli_connect("localhost","root","","bdd-db");
			return $conn;

		}


?>