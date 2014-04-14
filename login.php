<?php

	echo "<font color=blue font face='courier new' size='6pt'>Login Start....</font>"; 
	
	//echo "<font color=\"blue\">Login start.....</font>";
	echo "<br>";
	echo "<br>";
	
	
	$db_UCID = "sjt5";
	$db_Pass = "songbag22";
	$host = "sql2.njit.edu";
	$dbname = "sjt5";
	
	//Connecting to database
	//mysqli_connect(host,username,password,dbname);

	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else
	{
		echo "<font color=\"red\">Connected to Database!</font>";
		echo "<br>";
		echo "<br>";
		
		$ucid = "vp78";
		$pass = "password";
		
	
		$result = mysqli_query($con,"SELECT * FROM Users WHERE UCID = '$ucid' AND Password = '$pass'");

		
		$count = $result->num_rows;
		
		
		
		

		//echo "Count= ".$count;
		
		if ($count == 1){
		 
		 echo "<font color=\"green\">User exists</font>";
		
		}
		else if ($count > 1){}
		else{
		
			echo "User not there";
		}
		
		
		
		
		
		mysqli_close($con);

		
		
	} 



?>