<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$DeleteId = $_POST['id'];

$id = explode(',', $DeleteId);

print_r($id);

foreach($id as $k => $v){

	echo $id[$k]. "is" .$v;

		$delete = mysqli_query($con,"DELETE `Questions`, `Answers` 
 	FROM `Questions` INNER JOIN `Answers` 
WHERE `Answers`.`question_id` = `Questions`.`id` AND `Questions`.`id` = $v"); 

}



// $result = mysqli_query($con,"SELECT * FROM Questions WHERE id = '$DeleteId'");
// $check_id = mysqli_num_rows($result);

// if($check_id == 1){

// 	$delete = mysqli_query($con,"DELETE `Questions`, `Answers` 
// 	FROM `Questions` INNER JOIN `Answers` 
// 	WHERE `Answers`.`question_id` = `Questions`.`id` AND `Questions`.`id` = $DeleteId"); 

// 	$a = array("Flag" => "Success" , "Message" => "This question has been deleted!");
// 	echo json_encode($a);
// }


// else if ($check_id == 0) {

// 	$a = array("Flag" => "Failed" , "Message" => "There is no such id");
// 	echo json_encode($a);
// }

?>