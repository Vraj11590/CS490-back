<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$question_id = $_POST['id'];


//$result = mysqli_query($con, "SELECT Question, GROUP_CONCAT(answers,'') AS answers, question_id FROM Questions, Answers  WHERE Questions.id = $question_id AND Questions.id =  Answers.question_id");


$result = mysqli_query($con, "SELECT * FROM Questions WHERE id = '$question_id'");

$x = array();
$i=0;

while($row = mysqli_fetch_assoc($result)) {

	  $ques_id = $row['id'];
      $array = explode(',', $ques_id); //split string into array seperated by ', '
	  //$ques[''.$i] = $row;
	  $x[''.$i]['id'] = $array;
      $i++;



      // foreach($array as $k => $v){
  	   //  $result2 = mysqli_query($con, "SELECT Question, answers FROM Questions, Answers WHERE Questions.id = '$array[$k]' AND Questions.id =  Answers.question_id");
  	   //  while($row1 = mysqli_fetch_assoc($result2)){
  	   //  	echo json_encode($row1);
  	   //  }

      // }

} 


   echo json_encode($x)
 
?>