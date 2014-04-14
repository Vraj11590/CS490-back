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
	
	if ( $check_person == 0){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);			

//This query will insert answers into the database  
$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");
	$a = array("Question" => "Success" , "Message" => "Question added");
		echo json_encode($a);

	}
	else if ($check_person >= 1){

		$a = array("Question" => "Failed" , "Message" => "This question already exists!");
		echo json_encode($a);
		
	}
	
}



else if ($Type == 'MC'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 0){

	 //Adding a question to the database
	 $insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);				

//inserting the answers into the database 
	foreach( $Answers as $k => $v){
		echo $Answers[$k]. " is " . $v;

		
		$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$v', '$Correct', '$lastId')"); }

		$a = array("Question" => "Success" , "Message" => "Question added");
		echo json_encode($a);
	}
	else if ($check_person == 1){
	
		$a = array("Question" => "Failed" , "Message" => "This question already exists!");
		echo json_encode($a);
}

if ($Type == 'SA'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 0 ){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);				

//This query will insert answers into the database  
	$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");

		$a = array("Question" => "Success" , "Message" => "Question added");
		echo json_encode($a);


	}
	else if ($check_person == 1){

		$a = array("Question" => "Failed" , "Message" => "This question already exists!");
		echo json_encode($a);
	}
}

if ($Type == 'FB'){

	$Question = $_POST['Question'];
	$Answers = $_POST['Answers'];
	$Correct = $_POST['Correct'];
	
	$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
	$check_person = mysqli_num_rows($result);
	
	if ( $check_person == 0 ){

	$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
	$lastId = mysqli_insert_id($con);
				

//This query will insert answers into the database  
	$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");

		$a = array("Question" => "Success" , "Message" => "Question added");
		echo json_encode($a);

	}
	else if ($check_person == 1){
		
		$a = array("Question" => "Failed" , "Message" => "This question already exists!");
		echo json_encode($a);
	}
}



?>