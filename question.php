<?php
include_once("ExamDAO.php");
//echo "<h1>Welcome ".$_SESSION['fname']." ".$_SESSION['lname']."<h1>";
$Questions = ExamDAO::getQuestionChoices(1);
foreach ($Questions as $value):
?>
<html>
<head>
	<title>Online Examnation</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header  style = "background:url('img/(18).jpg') no-repeat;">
  <div class ="container" >
          <div class="navbar">
            <a class="brand font-brand" href="registration.php"> LVCC Examination</a>
          </div>
          <div class = "pull-right">
          	<a href="SignOut.php" style = "margin-top:20px;">Sign-out</a>
          </div>
  </div>
</header>
<div class = "container span8 offset2" style = "margin-top:50px;float:center">
	<div class = "row wellko">
		<label><b>Name:</b> <?=$_SESSION['fname']." ".$_SESSION['lname']?></label>
		<div id = "time" style = "width:150px;border: 4px solid #67E240;border-radius: 10px;"></div>
			<input type = "hidden" id = "user_id" value = "<?=$_SESSION['id']?>">
		<div id = "show" style ='float:right;margin-right:20px;margin-top:-20px'>
			<button class = 'btn btn-success' id = 'showScore'>Show Score</button>
			<button class = 'btn btn-success' id = "showAnswers">Show Answers</button>
			<button class = 'btn btn-warning' id = "showLast">Show Last Exams</button>
		</div>

	</div>
	<div class = "row wellko" id = 'divstart'>
		<p><h4 style = "color:#529E1F">This is an Exam based on PHP</h4>
		<b><sup style = "margin-left:180px">Test your skills in PHP</sup></b><br>
		<h5 style = "margin-left:20px">10 Minutes of Exam in PHP</h5><hr></p>
		<div style = "float:right;margin-top:10px">
		<button id = "start" class = "btn btn-primary" style = "width:200px;">Start Now</button>
		<a href="SignOut.php"><button class = "btn">Leave</button></a>
		</div>
	</div>
	<div class = "row wellko" id = "question_noAndquestion">
			<h3 id ="num">Question #&nbsp;<?= $value['question_id']?></h3>
			<div  id = "question"><?= $value['questions']?></div>
	</div>
	<div class = "row wellko" id = "choices">
		<div class ="choices" id = "a"><input type = "radio" id = 'radio1' name = 'choice' value = "<?= $value['choice_A']?>">&nbsp;&nbsp;<?= $value['choice_A']?></div>
		<div class ="choices" id = 'b'><input type = "radio" id = 'radio2' name = 'choice' value = "<?= $value['choice_B']?>">&nbsp;&nbsp;<?= $value['choice_B']?><br></div>
		<div class ="choices" id = 'c'><input type = "radio" id = 'radio3' name = 'choice' value = "<?= $value['choice_C']?>">&nbsp;&nbsp;<?= $value['choice_C']?><br></div>
		<div class ="choices" id = 'd'><input type = "radio" id = 'radio4' name = 'choice' value = "<?= $value['choice_D']?>">&nbsp;&nbsp;<?= $value['choice_D']?><br></div>
		<input type = "hidden" id ='question_no' value = "<?= $value['question_id']?>">
		<div id = "scored"><input id = "scr" type = "hidden" value ="<?php echo 0;?>"></div>
		<button class = "btn btn-info submitBtn" id = "submit">SUBMIT</button>
	</div>

</div>

    <script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
	<script type="text/javascript" src = "js/questions.js"></script>
</body>
</html>
<?php endforeach; ?>

