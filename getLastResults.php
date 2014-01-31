<?php
	include_once("ExamDAO.php");

	$user_id = $_POST['user_id'];

	$records = ExamDAO::getLastResults($user_id);
?>
	<title>Online Examnation</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<div>
	<table class = "table table-striped">
		<caption>Last Exam Results</caption>
		<tr>
			<td>Date</td>
			<td>Score</td>
			<td>Time Finished</td>
		</tr>
		<?php foreach($records as $value): ?>
		<tr>
			<td><?=$value['date_exam']?></td>
			<td><?=$value['score']?></td>
			<td><?=$value['time_Finished']?></td>
		</tr>
	<?php endforeach?>
	</table>

</div>