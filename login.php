<?php

	include 'dbglobals.php';

	//Connecting to database
	//mysqli_connect(host,username,password,dbname);

	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	// Check connection
	if (mysqli_connect_errno())
	{
			$log = array('allow'=>'No');
			// print_r($log);
			echo json_encode($log);		
	}else
	{
	
		$ucid = $_POST['ucid'];
		$pass = $_POST['pass'];
	
		$result = mysqli_query($con,"SELECT * FROM Users WHERE UCID = '$ucid' AND Password = '$pass'");

		
		$count = $result->num_rows;
		

		//echo "Count= ".$count;
		
		if ($count == 1){
			$row = mysqli_fetch_assoc($result);
			$type = $row['Type'];
			$name = $row['Name'];
			$ucid = $row['UCID'];
			$log = array('allow'=>'Yes', 'type'=>$type, 'name'=>$name,'ucid'=>$ucid);
			// print_r($log);
			echo json_encode($log);
				
		}
		else if ($count > 1){}
		else{
			$log = array('allow'=>'No','message'=>'Invalid User/Pass Combo');
			// print_r($log);
			echo json_encode($log);
		}
		
	
		mysqli_close($con);

		
		
	} 



?>