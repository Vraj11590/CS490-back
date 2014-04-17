<?php

$db_UCID = "sjt5";
$db_Pass = "songbag22";
$host = "sql2.njit.edu";
$dbname = "sjt5";
	
//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$result = mysqli_query($con, "SELECT quiz_id, Quiz_name, Created_by, Type FROM Quiz");

$quiz = array();
//$answers = array();
$i=0;

while($row = mysqli_fetch_assoc($result)) {

	  $quiz[''.$i] = $row;
	  
      $i++;
}   

echo json_encode($quiz); 

?>