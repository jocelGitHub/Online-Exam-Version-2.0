<?php
	include_once("ExamDAO.php");

	$records = ExamDAO::getAllAnswers();
	
?>

<div>
	<h3 style = "color:#51a351">Questions and Answers</h3>
	<?php foreach ($records as $value):?>
	<p><b><?=$value['question_id']?>. </b>
	<?=$value['questions']?></p>
	<p><b style = "color:#FFB60B">answer: </b><?=$value['answer']?></p>	
</div>
<?php endforeach?>