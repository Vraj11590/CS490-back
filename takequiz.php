<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$quiz_id = $_POST['quiz_id'];


$result = mysqli_query($con, "SELECT question_id FROM Quiz WHERE quiz_id = '$quiz_id'");

$x = array();


while($row = mysqli_fetch_assoc($result)) {

	  $ques_id = $row['question_id'];
      $array = explode(',', $ques_id); //split string into array seperated by ', '
$i=0;


      foreach($array as $k => $v){
  		$result2 = mysqli_query($con, "SELECT question_id, Type, Question, GROUP_CONCAT(answers,'') AS answers FROM Questions, Answers WHERE Questions.id = '$array[$k]' AND Questions.id =  Answers.question_id");

    	 $individual = mysqli_fetch_assoc($result2);
    	//print_r($individual);
    	   $x[''.$k] = $individual;



       	$i++;
      }


}   
        echo json_encode($x);



?>