<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";

$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);


	$Answers = $_POST['Answers'];


//	echo json_encode($_POST['Answers']['A']);

	//$a = array("Answers" => $Answers);
		//echo json_encode($a);
$t="";

		foreach( $Answers as $k => $v){
			 $t =  $t." ".$Answers[$k]. " is " . $v;

 			//$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$v', '$Correct', '$lastId')"); 
 		

 		}
		echo json_encode($t);



// if ($Type == 'MC'){

// 	$Question = $_POST['Question'];
// 	$Answers = $_POST['Answers'];
// 	$Correct = $_POST['Correct'];
	
// 	//$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
// 	//$check_person = mysqli_num_rows($result);
	
// 	if ( $check_person == 0){

// 	 //Adding a question to the database
// 	 $insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Type) VALUES ('$Question', '$Type')"); 
// 	$lastId = mysqli_insert_id($con);	

// //inserting the answers into the database 
// 		foreach( $Answers as $k => $v){
// 		echo $k. " is " . $v;

//  		$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$v', '$Correct', '$lastId')"); 
//  		}

//  		$a = array("Question" => "Success" , "Message" => "Question added");
// 		echo json_encode($a);

// 	}

// 	if ( $check_person >= 1 ){
	
// 	$a = array("Question" => "Failed" , "Message" => "This question already exists!");
// 		echo json_encode($a);
// 	}
//}
?>