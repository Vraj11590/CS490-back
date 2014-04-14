<?php

//Receiving from Middle End
$Type = $_POST['Type'];


/* echo $Question;
echo $Type;
echo $Answer;
echo $Correct;
 */
$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

//This query will insert questions into the database  
if ($Type == 'TF'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 1 ){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);

//Displaying all the id rows in the Question Table
	$id = mysqli_query($con, "SELECT * FROM Questions WHERE Question = '$Question'");

	while ($row = mysqli_fetch_array($id)){
		echo "<br>";
		echo $row['id'];
	}					

//This query will insert answers into the database  
	$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");
	}
	else if ($check_person == 0){
		echo "This question already exists!";
	}
	
}



else if ($Type == 'MC'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Users WHERE Questions = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 1 ){

	 //Adding a question to the database
	 $insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);

//Displaying all the id rows in the Question Table
	$id = mysqli_query($con, "SELECT * FROM Questions WHERE Question = '$Question'");

	while ($row = mysqli_fetch_array($id)){
		echo "<br>";
		echo $row['id'];
	}					

//inserting the answers into the database 
	foreach( $Answers as $k => $v){
		echo $Answers[$k]. " is " . $v;
		
		$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$v', '$Correct', '$lastId')"); 

	} 
	}
	else if ($check_person == 0);
	echo "Question already exists!";
}

if ($Type == 'SA'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Users WHERE Questions = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 1 ){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);

//Displaying all the id rows in the Question Table
	$id = mysqli_query($con, "SELECT * FROM Questions WHERE Question = '$Question'");

	while ($row = mysqli_fetch_array($id)){
		echo "<br>";
		echo $row['id'];
	}					

//This query will insert answers into the database  
	$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");
	}
	else if ($check_person == 0){
	echo "This question already exists!";
	}
}

if ($Type == 'FB'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Users WHERE Questions = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 1 ){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);

//Displaying all the id rows in the Question Table
	$id = mysqli_query($con, "SELECT * FROM Questions WHERE Question = '$Question'");

	while ($row = mysqli_fetch_array($id)){
		echo "<br>";
		echo $row['id'];
	}					

//This query will insert answers into the database  
	$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");
	}
	else if (check_person == 0){
		echo "This question already exists!";
	}
}



?>