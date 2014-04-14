<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$result = mysqli_query($con, "SELECT Type, Question, GROUP_CONCAT(answers,'') AS answers, correct, question_id FROM Questions, Answers WHERE Questions.id = Answers.question_id GROUP BY question_id");


$ques = array();
//$answers = array();
$i=0;

while($row = mysqli_fetch_assoc($result)) {

	  $answers = $row['answers'];
      $array = explode(',', $answers); //split string into array seperated by ', '
	  $ques[''.$i] = $row;
	  $ques[''.$i]['answers'] = $array;
      $i++;
}    


   echo json_encode($ques);

?>