<?php
include_once('db.php');
$conn=db();
$gp=strtolower($_POST['gp']);
$place=strtolower($_POST['thana']);
$distr=strtolower($_POST['district']);
sleep(2);
		$result=array();
		$result["details"]=("<table class='table table-bordered table-hover' width='100%'>
		<thead><tr>
        <th scope='col'><center>#</center></th>
        <th scope='col'><center>Name</center></th>
      	<th scope='col'><center>Phone</center></th>
		<th scope='col'><center>Age</center></th>
		<th scope='col'><center>Genger</center></th>
      	<th scope='col'><center>Address</center></th>
      	<th scope='col'><center>Group</center></th>

    </tr>
  </thead>");
		
 		if(!$conn){

 			$result["no"]="DBER";

 		}
 		else
 		{ 
 			if((($place==null)||($place==" ")||( preg_match('/\s/',$place))))
 			{
 				$query=mysqli_query($conn,"SELECT * from donor_info where gp='$gp' and thana='$place' and district='$distr' and hide_data = '1'");
 			}
 			else
 			{
 				$place=$_POST['thana'];
				$distr=$_POST['district'];
 				$query=mysqli_query($conn,"SELECT * from donor_info where gp='$gp' and thana='$place' and district='$distr'");
 			}
 			$i=1;
 			 $coun=mysqli_affected_rows($conn);
 			 $result["no"]=$coun;
 			 while($row=mysqli_fetch_array($query))
 			 {

 			 	$result["details"]=$result["details"].("<tbody>
    						<tr>
      				<th scope='row'><center>".$i++."</center></th>
      				<td><center>".ucfirst($row['first_name'])." ".ucfirst($row['last_name'])."</center></td>
      				<td><center>".ucfirst($row['phno'])."</center></td>
					<td><center>".($row['age'])."</center></td>
					<td><center>".ucfirst($row['gender'])."</center></td>
      				<td><center>".ucwords($row['thana']).", ".ucfirst($row['district'])."</center></td>
      				<td><center>".strtoupper($row['gp'])."</center></td>
   					 </tr>
  						</tbody>");
 			 }

 		}
 			$result["details"]=$result["details"].("</table>");
		
echo json_encode($result);




?>