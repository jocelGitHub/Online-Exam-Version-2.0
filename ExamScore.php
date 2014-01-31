<?php
	include_once("ExamDAO.php");

	$answer = $_POST['answer'];
	$score = $_POST['score'];
	$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : false;
	$result = ExamDAO::getAnswer(10, $answer);
	$avg = (($result + $score) * 10);

	
	ExamDAO::insertUserExamDetails($user_id, $avg);


	if($avg == 100 ){
		$grade = "Perfect";
	}else if($avg == 90){
		$grade = "Excelent";
	}else if($avg <= 80 && $avg >= 70){
		$grade = "Average";
	}else if($avg <= 60 && $avg >= 50){
		$grade = "Better Luck Next Time"; 
	}else if($avg <= 40 && $avg >= 30){
		$grade = "Practice More";
	}else{
		$grade = "Study More!";
	}

	echo json_encode(
			array(
				'rate' => $grade,
				'score' => $avg
			)
		);

?>