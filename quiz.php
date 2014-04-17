<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$Quiz_Name = $_POST['Quiz_name'];
$Created_By = $_POST['UCID'];
$Type = $_POST['Type'];
$Question_Id = $_POST['Question_id'];


//$id = explode(',', $Question_Id);
//$ids;

$result = mysqli_query($con,"SELECT * FROM Quiz WHERE Quiz_name = '$Quiz_Name'");

$check_name = mysqli_num_rows($result);

if ($check_name == 0 ){


$insert_quiz = mysqli_query($con,"INSERT INTO Quiz (quiz_id,question_id,Quiz_name, Created_by, Type) VALUES (null,'$Question_Id','$Quiz_Name', '$Created_By', '$Type')"); 


	$a = array("Flag" => "Success" , "Message" => "Quiz has been added. Thank you!");
	echo json_encode($a);

}


if ($check_name == 1){

	$a = array("Flag" => "Failed" , "Message" => "Choose a different Quiz Name!");
	echo json_encode($a);

}

?>