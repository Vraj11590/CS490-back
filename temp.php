$UCID = $_POST['ucid'];
$Password = $_POST['pass'];

	
	$db_UCID = "sjt5";
	$db_Pass = "gannet95";
	$host = "sql2.njit.edu";
	$dbname = "sjt5";
	
	//Connect to the database
	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	/* Checking if user name already exist in the database or not. */
	 $person_exist = mysqli_query($con, "SELECT * FROM Users WHERE UCID='$UCID' ");
	$check_person = mysqli_num_rows($person_exist);
	
	
	if($check_person != 0)
	{ 
		echo "<br>";
		echo "".$UCID." is already in the database."; 
	}
	
	else  
	{
	
	/* This query inserts user into the database */ 
	$insert_person = mysqli_query($con,"INSERT INTO Users (UCID, Password) VALUES ('$UCID', '$Password')");
	}
 
	if($insert_person)
	{ 
		echo "<br>";
		$success_arr = array('Success' => 1);
		echo json_encode($success_arr);
	}
	
	else
	{ 
		echo "<br>";
		$failure_arr = array('Success' => 0, 'Message' => 'User already exists');
		echo json_encode($failure_arr);
	}

	mysqli_close($con);