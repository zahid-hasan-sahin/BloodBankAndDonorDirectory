<?php
		include_once('db.php');
		$conn=db();
		$result=array();
		$f_name=strtolower($_POST['first_name']);
		$l_name=strtolower($_POST['last_name']);
		$phno=strtolower($_POST['phno']);
		$gp=strtolower($_POST['gp']);
		$gender=strtolower($_POST['gender']);
		$age=strtolower($_POST['age']);
		$nid=strtolower($_POST['nid']);
		$division=strtolower($_POST['divisions']);
		$district=strtolower($_POST['district']);
		$thana=strtolower($_POST['thana']);
		$email=strtolower($_POST['email']);
		$password=strtolower($_POST['password']);
		$datetime=date("Y-m-d h:i:s");
		$param_password = password_hash($password, PASSWORD_DEFAULT);
		$submit=mysqli_query($conn,"SELECT* from donor_info INNER JOIN login_info on donor_info.donor_id=login_info.donor_id where phno='$phno' OR nid='$nid' OR email='$email'");
		$chk=mysqli_affected_rows($conn);
		sleep(2);

		if(!$conn){
				$result['status']="DBER";
				$result['msg']=" <strong>Sorry !</strong> this feature is temporarily blocked";
				$result['class']="alert alert-danger";
		}
		else{
			if($chk!=0){
				$result['class']="alert alert-warning";
				$result['status']="ALRDREG";
				$result['msg']="<strong>Warning !</strong> You are already registered. Try with another informetion";
			}
			else{
			$submit=mysqli_query($conn,"INSERT INTO `donor_info` (`donor_id`, `first_name`, `last_name`, `nid`, `phno`, `gp`, `age`, `gender`, `divisions`, `district`, `thana`) VALUES (NULL, '$f_name','$l_name','$nid','$phno','$gp','$age','$gender','$division','$district','$thana');");
			$submit=mysqli_query($conn,"INSERT INTO `login_info` (`user_id`, `email`, `password`,`donor_id`, `created_at`, `mainpass`) VALUES (NULL, '$email','$param_password',(select donor_id from donor_info where nid = '$nid'),'$datetime','$password');");
			if($submit==1){
				$result['class']="alert alert-success";
				$result['status']="sucess";
				$result['msg']="<strong>Successfully Registered!</strong> Thank you for your support";
			}
			else
			{
				$result['oops'];
				$result['class']="alert alert-danger";
				$result['msg']="<strong>Error!</strong> Oops something went wrong-(#P031)";
			}
		}
		}

echo json_encode($result);





?>