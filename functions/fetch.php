<?php
session_start();
include_once('db.php');
$conn = db();
$gp = "";
$place = "";
$distr = "";

$loggeindUser = -1;
if (isset($_SESSION["donor_id"])) {
	$loggeindUser = $_SESSION["donor_id"];
}

if (isset($_POST['usingCurrentLocation'])) {
} else {
	$gp = strtolower($_POST['gp']);
	$place = strtolower($_POST['thana']);
	$distr = strtolower($_POST['district']);
}
sleep(2);
$result = array();
$result["details"] = ("
		<style>
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
		<thead><tr>
        <th scope='col'><center>Count No.</center></th>
        <th scope='col'><center>Name</center></th>
      	<th scope='col'><center>Phone</center></th>
		<th scope='col'><center>Age</center></th>
		<th scope='col'><center>Gender</center></th>
      	<th scope='col'><center>Group</center></th>

    </tr>
  </thead>");
if (!$conn) {

	$result["no"] = "DBER";
} else {

	if (isset($_POST['usingCurrentLocation'])) {

		$state = $_POST['state'];
		$county = $_POST['county'];

		$query = mysqli_query($conn, "SELECT * from donor_info where divisions like '%$state%' and (district like '%$county%'  or  thana like '%$county%') and hide_data = '1'");
	} else {

		if ((($place == null) || ($place == " ") || (preg_match('/\s/', $place)))) {
			$query = mysqli_query($conn, "SELECT * from donor_info where gp='$gp' and thana='$place' and district='$distr' and hide_data = '1'");
		} else {
			$place = $_POST['thana'];
			$distr = $_POST['district'];
			$query = mysqli_query($conn, "SELECT * from donor_info where gp='$gp' and thana='$place' and district='$distr' and hide_data = '1'");
		}
	}
	$i = 1;
	$coun = mysqli_affected_rows($conn);
	$result["no"] = $coun;
	while ($row = mysqli_fetch_array($query)) {
		$_age = floor((time() - strtotime($row['age'])) / 31556926);

		$result["details"] = $result["details"] . ("<tbody>
    						<tr>
      				<td data-label='Count No:'>" . $i++ . "</td>
      				<td data-label='Name:'>" . ucfirst($row['first_name']) . " " . ucfirst($row['last_name']) . "</td>
      				<td data-label='Phone:'><a style='color: #4D4D4D;' href='tel:" . ucfirst($row['phno']) . "'>" . ucfirst($row['phno']) . "</a></td>
					<td data-label='Age:'>" . ucfirst($_age) . "</td>
					<td data-label='Gender:'>" . ucfirst($row['gender']) . "</td>
      				<td data-label='Group:'>" . strtoupper($row['gp']) . "</td>");


		if ($row['donor_id'] != $loggeindUser) {
			$result["details"] = $result["details"] . ("<td data-label='Action:'><a style='border:3px solid green;padding:5px;border-radius: 5px;' href=chat?donorid=" . $row['donor_id'] . ">Chat</a></td>");
		}
		$result["details"] = $result["details"] . ("</tr>
  						</tbody>");
	}
}
$result["details"] = $result["details"] . ("</table>");

echo json_encode($result);
