<?php 

	include 'dbglobals.php';

	$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);


	$action = $_POST['do'];

	if($action == "create_session"){
		$sid = addslashes($_POST['sid']);
		// $session_data = $_POST['session_data'];
		$session_data = "FIX THIS LATER";

		// $insert_stmt = "INSERT INTO sessions (session_id, session_data, session_expiration) VALUES( $sid, $session_data, NOW() + INTERVAL 6 HOUR )";
		$insert_stmt = " INSERT INTO sessions (session_id, session_data, session_expiration)
						 VALUES( '$sid', '$session_data', NOW() + INTERVAL 1 HOUR)";

		$i = mysqli_query($con,$insert_stmt);
		
		if($i){
			echo json_encode(array("message"=>"session_begin"));
		}

		if(!$i){
			echo json_encode(array("message"=>"session_exists"));
		}

	}

	
	if($action == "delete_session"){
		echo json_encode(array("message"=>"session_delete back", "data" => $_POST));

	}



?>