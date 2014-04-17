<?php

include 'dbglobals.php';

//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

$SortBy = $_POST['filter'];

if ($SortBy == 'MC'){
	// echo "sorting by MC";
	$result = mysqli_query($con,"SELECT Question, Type, CreatedBy FROM Questions WHERE Type = 'MC'");
}

if ($SortBy == 'TF'){
	// echo "sorting by TF";
	$result = mysqli_query($con,"SELECT Question, Type, CreatedBy  FROM Questions WHERE Type = 'TF'");
}

if ($SortBy == 'FB'){

$result = mysqli_query($con,"SELECT Question, Type, CreatedBy  FROM Questions WHERE Type = 'FB'");
}

if ($SortBy == 'OE'){
	// echo "sorting by OE";

	$result = mysqli_query($con,"SELECT Question, Type, CreatedBy  FROM Questions WHERE Type = 'OE'");
}

if ($SortBy == 'HL'){

$result = mysqli_query($con,"SELECT Question, Type, Difficulty, CreatedBy  FROM Questions ORDER BY Difficulty DESC");
}

if ($SortBy == 'Default'){

$result = mysqli_query($con,"SELECT Question, Type, QuestionID, CreatedBy  FROM Questions ORDER BY QuestionID DESC");
}

$q = array();
//$answers = array();
$i=0;

while($row = mysqli_fetch_assoc($result)) {

	  $q[''.$i] = $row;
	  
      $i++;
}   

echo json_encode($q);
?>