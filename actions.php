<?php 
	
	include 'dbglobals.php';

	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);
	
	// Check connection
	if (mysqli_connect_errno())
	{
			$log = array('allow'=>'No');
			// print_r($log);
			echo json_encode($log);		
	}

	

	$act = $_POST['action'];

	if($act == "QuestionMakeOE"){

//		echo json_encode($_POST);

		// $data = array(
		//           	'action' =>  'QuestionMakeOE',
		// 				'Description' => $Description,
		// 				'T1'=> $t1,
		// 				'T2'=> $t2,
		// 				'T3'=> $t3,
		// 				'T4'=> $t4,
		// 				'Difficulty'=>$difficulty,
		// 				'CreatorName'=>$createBy_Name,
		// 				'CreatorUCID'=>$createdBy,
		// 				'Question_name'=>$unique_name,
		// 				'helpcode'=>$helpcode
		// 			 );


		$Question = $_POST['Description'];
		$t1 = $_POST['T1'];
		$t2 = $_POST['T2'];
		$t3 = $_POST['T3'];
		$t4 = $_POST['T4'];
		$helpcode = $_POST['helpcode'];
		$difficulty = $_POST['Difficulty'];
		$createdBy = $_POST['CreatorUCID'];
		$createBy_Name = $_POST['CreatorName'];
		$unique_name = $_POST['Question_name'];

		$type = "OE";

		$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
		$check_person = mysqli_num_rows($result);


		if ($check_person == 0){
			$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Question_name, Type, Difficulty, CreatedBy) VALUES ('$Question', '$unique_name', '$type', '$difficulty', '$createdBy')"); 
			$lastId = mysqli_insert_id($con);


			$insert_answer = mysqli_query($con,"INSERT INTO OEAnswers (T1, T2, T3, T4, HelpCode, question_id) VALUES ('$t1', '$t2', '$t3', '$t4', '$helpcode', '$lastId')");

			$a = array("Question" => "Success" , "Message" => "Question added");
			echo json_encode($a);
		}

		if ( $check_person >= 1){
			$a = array("Flag" => "Failed" , "Message" => "This question already exists!");
			echo json_encode($a);
		}

	}

	if($act == "QuestionMakeMC"){

		// $data = array(	'action' =>  'QuestionMakeMC',
		// 				'Description' => $Description,
		// 				'C1'=> $C1,
		// 				'C2'=> $C2,
		// 				'C3'=> $C3,
		// 				'C4'=> $C4,
		// 				'Correct' => $correct,
		// 				'Difficulty'=>$difficulty,
		// 				'CreateorName'=>$createBy_Name,
		// 				'CreatorUCID'=>$createdBy,
		// 				'Question_name' => $unique_name
		// 			 );

		$Description=$_POST['Description'];
		$C1 = $_POST['C1'];
		$C2 = $_POST['C2'];
		$C3 = $_POST['C3'];
		$C4 = $_POST['C4'];
		$correct = $_POST['Correct'];
		$difficulty = $_POST['Difficulty'];
		$createdBy = $_SESSION['CreatorUCID'];
		$createBy_Name = $_SESSION['CreateorName'];
		$type = "MC";
		$unique_name = $_POST['Question_name'];

		$correct_text;

		if($correct == 'A'){
			$correct_text = $C1;
		}
		if($correct == 'B'){
			$correct_text = $C2;
		}
		if($correct == 'C'){
			$correct_text = $C3;
		}
		if($correct == 'D'){
			$correct_text = $C4;
		}


		$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Question'");
		$check_person = mysqli_num_rows($result);


		if ($check_person == 0){
			$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Question_name, Type, Difficulty, CreatedBy) VALUES ('$Description', '$unique_name', '$type', '$difficulty', '$createdBy')"); 
			$lastId = mysqli_insert_id($con);

			$insert_answer = mysqli_query($con,"INSERT INTO MCAnswers (C1, C2, C3, C4, correct, question_id) VALUES ('$C1', '$C2', '$C3', '$C4', '$correct_text', '$lastId')");
			$a = array("Question" => "Success" , "Message" => "Question added");
			echo json_encode($a);
		}
		if ( $check_person >= 1){
			$a = array("Flag" => "Failed" , "Message" => "This question already exists!");
			echo json_encode($a);
		}		
	}




?>