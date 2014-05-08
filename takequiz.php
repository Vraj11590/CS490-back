<?php
  include 'dbglobals.php';


//Connect to the database
$con = mysqli_connect($host,$db_UCID,$db_Pass,$dbname);

//$quiz_id = $_POST['quiz_id'];

$result = mysqli_query($con, "SELECT question_id FROM Quiz WHERE quiz_id = '$quiz_id'");

$x = array();


while($row = mysqli_fetch_assoc($result)) {

    $ques_id = $row['question_id'];
    $array = explode(',', $ques_id); //split string into array seperated by ', '
    $i=0;
   //echo $ques_id;
   
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

?>