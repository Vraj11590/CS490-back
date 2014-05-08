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

	if($act == "QuestionMakeTF"){
		$Description=$_POST['Description'];
		$correct = $_POST['Correct'];
		$difficulty = $_POST['Difficulty'];
		$createdBy = $_POST['CreatorUCID'];
		$type = "TF";
		$unique_name = $_POST['Question_name'];	

		$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Description'");
		$check_person = mysqli_num_rows($result);

		if ($check_person == 0){
			$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Question_name, Type, Difficulty, CreatedBy) VALUES ('$Description', '$unique_name', '$type', '$difficulty', '$createdBy')"); 
			$lastId = mysqli_insert_id($con);

			$insert_answer = mysqli_query($con,"INSERT INTO TFAnswers (question_id, correct) VALUES ('$lastId', '$correct')");
			$a = array("Question" => "Success" , "Message" => "Question added");
			echo json_encode($a);
		}
		if ( $check_person >= 1){
			$a = array("Flag" => "Failed" , "Message" => "This question already exists!");
			echo json_encode($a);
		}		
	}
	if($act == "QuestionMakeFB"){
		$Description=$_POST['Description'];
		$correct = $_POST['Correct'];
		$difficulty = $_POST['Difficulty'];
		$createdBy = $_POST['CreatorUCID'];
		$type = "FB";
		$unique_name = $_POST['Question_name'];	

		$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Description'");
		$check_person = mysqli_num_rows($result);

		if ($check_person == 0){
			$insert_question = mysqli_query($con,"INSERT INTO Questions (Question, Question_name, Type, Difficulty, CreatedBy) VALUES ('$Description', '$unique_name', '$type', '$difficulty', '$createdBy')"); 
			$lastId = mysqli_insert_id($con);

			$insert_answer = mysqli_query($con,"INSERT INTO FBAnswers (question_id, correct) VALUES ('$lastId', '$correct')");
			$a = array("Flag" => "Success" , "Message" => "Question added");
			echo json_encode($a);
		}
		if ( $check_person >= 1){
			$a = array("Flag" => "Failed" , "Message" => "This question already exists!");
			echo json_encode($a);
		}		
	}
	if($act == "send_all_quizzes"){
		$result = mysqli_query($con,"SELECT quiz_id, Quiz_name, Created_by FROM Quiz");

		$quiz = array();
		//$answers = array();
		$i=0;

		while($row = mysqli_fetch_assoc($result)) {

			  $quiz[''.$i] = $row;
			  
		      $i++;
		}   

		echo json_encode($quiz); 
	}
	if($act == "send_quiz_by_id"){
		$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

		$quiz_id = $_POST['quiz_id'];

		$result = mysqli_query($con, "SELECT question_id FROM Quiz WHERE quiz_id = '$quiz_id'");

		$x = array();


		while($row = mysqli_fetch_assoc($result)) {

    		$ques_id = $row['question_id'];
    		$array = explode(',', $ques_id); //split string into array seperated by ', '
    		$i=0;
   
	   		foreach($array as $k => $v){

	       		$result3 = mysqli_query($con, "SELECT Type FROM Questions WHERE QuestionID = '$array[$k]'");
	       		$row1 = mysqli_fetch_assoc($result3);

	       		if ($row1['Type'] == 'OE'){
	           		$result2 = mysqli_query($con, "SELECT question_id, Type, Question, T1, T2, T3, T4, HelpCode FROM Questions, OEAnswers WHERE Questions.QuestionID = '$array[$k]' AND Questions.QuestionID =  OEAnswers.question_id");
	           		$individual = mysqli_fetch_assoc($result2);
	           		//print_r($individual);
	           		$x[''.$k] = $individual;
	       		}
	       		if ($row1['Type'] == 'MC'){
	           		$result2 = mysqli_query($con, "SELECT question_id, Type, Question, C1, C2, C3, C4 FROM Questions, MCAnswers WHERE Questions.QuestionID = '$array[$k]' AND Questions.QuestionID =  MCAnswers.question_id");
	           		$individual = mysqli_fetch_assoc($result2);
	           		//print_r($individual);
	           		$x[''.$k] = $individual;
	       		}   		
	         	if ($row1['Type'] == 'TF'){
	           		$result2 = mysqli_query($con, "SELECT question_id, Type, Question FROM Questions, TFAnswers WHERE Questions.QuestionID = '$array[$k]' AND Questions.QuestionID =  TFAnswers.question_id");
	           		$individual = mysqli_fetch_assoc($result2);
	           		//print_r($individual);
	           		$x[''.$k] = $individual;
	       		}  
	       		if ($row1['Type'] == 'FB'){
	           		$result2 = mysqli_query($con, "SELECT question_id, Type, Question FROM Questions, FBAnswers WHERE Questions.QuestionID = '$array[$k]' AND Questions.QuestionID =  FBAnswers.question_id");
	           		$individual = mysqli_fetch_assoc($result2);
	           		//print_r($individual);
	           		$x[''.$k] = $individual;
	       		}   
			}


		}   		
      echo json_encode($x);		

	}



?>