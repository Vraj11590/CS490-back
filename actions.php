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
		$Description=$_POST['Description'];
		$t1 = $_POST['T1'];
		$t2 = $_POST['T2'];
		$t3 = $_POST['T3'];
		$t4 = $_POST['T4'];
		$difficulty = $_POST['Difficulty'];
		$createdBy = $_POST['CreatorUCID'];
		$createBy_Name = $_POST['CreateorName'];
		$type = "OE";
		
		$query = "INSERT INTO Questions VALUES (null,'$Description','$type','$difficulty','$createdBy')";
		$a = array("Flag" => "Failed" , "Message" => $query);
		echo json_encode($a);


		$result = mysqli_query($con,"SELECT * FROM Questions WHERE Question = '$Description'");
		$check_person = mysqli_num_rows($result);
		
		if ( $check_person == 0){
			$query = "INSERT INTO Questions VALUES (null,'$Description','$type','$difficulty','$createdBy')";



//			$insert_question = mysqli_query($con,$query); 

			// if(!$insert_question){
			// 	$a = array("Flag" => "Failed" , "Message" => mysqli_connect_errno());
		 // 		echo json_encode($a);

			// }
			
			//*** DO ANSWER STUFF HERE ***
			//$lastId = mysqli_insert_id($con);

			//$insert_answer = mysqli_query($con,"INSERT INTO Answers (answers, correct, question_id) VALUES ('$Answers', '$Correct', '$lastId')");
			

		}

		if ( $check_person >= 1){

			$a = array("Flag" => "Failed" , "Message" => "This question already exists!");
	 		echo json_encode($a);
	 	}


	}




?>