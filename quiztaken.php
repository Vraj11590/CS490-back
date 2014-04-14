<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$quiz_id = $_POST['id'];
$ucid = $_POST['ucid'];

$result = mysqli_query($con,"SELECT * FROM QuizTaken WHERE quiz_id = '$quiz_id' AND student_ucid = '$ucid'");
$check_person = mysqli_num_rows($result);

if ( $check_person == 0){

	$insert_student = mysqli_query($con,"INSERT INTO QuizTaken (quiz_id, student_ucid) VALUES ('$quiz_id', '$student_ucid')"); 
	
	$a = array("Flag" => "Success" , "Message" => "Student has taken the quiz");
	echo json_encode($a);

	}
	else if ($check_person >= 1){

		$a = array("Question" => "Failed" , "Message" => "This student has already taken this quiz");
		echo json_encode($a);
		
	}



?>