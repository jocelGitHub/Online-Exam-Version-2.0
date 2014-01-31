<?php
	include_once("ExamDAO.php");

	$question_id = (isset($_POST['question_id'])) ? $_POST['question_id'] : false;
	$question_id2 = (isset($_POST['question_id2'])) ? $_POST['question_id2'] : false;
	$answer = (isset($_POST['answer'])) ? $_POST['answer'] : false;
	$score = (isset($_POST['score'])) ? $_POST['score'] : false;


	$questions = ExamDAO::getQuestionChoices($question_id2);
	$result = ExamDAO::getAnswer($question_id, $answer);

	foreach ($questions as $value) {
		$q = $value['questions'];
		$a = $value['choice_A'];
		$b = $value['choice_B'];
		$c = $value['choice_C'];
		$d = $value['choice_D'];
	}

	if($questions != false){
		echo json_encode(
				array(
					'status' => 'success',
					'question' => $q,
					'choice1' => $a,
					'choice2' => $b,
					'choice3' => $c,
					'choice4' => $d,
					'score' => ($result + $score) 
				)
			);
	}else{
		echo json_encode(
				array(
					'status' => 'failed'
				)
			);
	}


?>