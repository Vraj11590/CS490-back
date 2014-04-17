	$db_UCID = "sjt5";
	$db_Pass = "gannet95";
	$host = "sql2.njit.edu";
	$dbname = "sjt5";
	
	//Connect to the database
	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	/* Checking if user name already exist in the database or not. */
	$person_exist = mysqli_query($con, "SELECT * FROM Users WHERE UCID='$UCID' and Password='$Password' ");
	$check_person = mysqli_num_rows($person_exist);
	
	
	if($check_person != 0)
	{ 
		$a1 = array ("UCID" => $UCID, "Password" => $Password);
		echo json_encode($a1);
	}else{
		echo "fail";
	}


	//Displaying all the id rows in the Question Table
	$id = mysqli_query($con, "SELECT * FROM Questions WHERE Question = '$Question'");

	while ($row = mysqli_fetch_array($id)){
		echo "<br>";
		echo $row['id'];
	}	