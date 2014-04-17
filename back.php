<?php


	$ucid = $_POST['ucid'];
	$pass = $_POST['pass'];

	//$t = array ( "t" => $ucid);
	
	//echo json_encode($t);
	
	
	
	//set up database access stuff
	$db_UCID = "sjt5";
	$db_Pass = "songbag22";
	$host = "sql2.njit.edu";
	$dbname = "sjt5";
	
	//Connect to the database
	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	

	//check if actually connected
	if($con){
	
		//check if the ucid/pass combination exists
		// SELECT * FROM Users WHERE UCID = '$ucid' AND Password = '$pass');
		
		$result = mysqli_query($con,"SELECT * FROM Users WHERE UCID = '$ucid' AND Password = '$pass'");
		
		//if there is a row then login successfully, if not login failed
		
		$check_person = mysqli_num_rows($result);
		
 		if ( $check_person == 1 ) {
			$row = mysqli_fetch_array($result);
			$Name = $row['Name'];
			$Type = $row['Type'];
			$a1 = array("Login" => "Success" , "Name" => $Name, "Type" => $Type);
			echo json_encode($a1);
		}else if ( $check_person == 0 ) {
			$a = array("Login" => "Failed" , "Message" => "UCID/Password does not exist");
			echo json_encode($a);
			
		}else {
			$a2 = array("Login" => "Failed" , "Message" => "Multiple Users");
			echo json_encode($a2);
		}
	
	}else{
		$a = array("Login" => "Failed" , "Message" => "Database Connection Error");
		echo json_encode($a);
	}
 
	
	


?>