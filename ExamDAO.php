<?php
	require_once("config.php");

	class ExamDAO{
		public static function createUser($fname, $lname, $email, $pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;
			$query = "INSERT INTO user(fname, lname, email, password) VALUES('{$fname}','{$lname}','{$email}','{$pass}')";
			$result = $db->query($query);
			if($result){
				return true;
			}
		}

		public static function checkEmail($email){
			global $db;
			if (!$email) return false;
			$query = "SELECT * FROM user WHERE email = '{$email}'";
			$result = $db->query($query);
			if($result->num_rows > 0){
				return true;
			}else{
				return false;
			}
		}

		public static function loginAuthenticator($email,$pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;

			$query = "SELECT * FROM user WHERE email = '{$email}' AND password IN('{$pass}') ";
			$result = $db->query($query);

			if($result->num_rows > 0){
				$record = $result->fetch_assoc();
				$result->free();
				$_SESSION = $record;
				return true;
			}else {
				return false;
			}

		}

		public static function getQuestionChoices($question_id){
			global $db;
			if (!$question_id) return false;

			$query = "SELECT question_id, questions, choice_A, choice_B, choice_C, choice_D  FROM questionexam WHERE question_id = '{$question_id}' ";
			$result = $db->query($query);

			if($result->num_rows > 0){
				$questions = array();
				while($row = $result->fetch_assoc()){
					$questions[] = $row;
				}
				$result->free();
				return $questions;
			}else{
				return false;
			}
		}

		public static function getAnswer($question_id, $answer){
			global $db;
			if(!$question_id) return false;
			if(!$answer) return false;

			$query = "SELECT * FROM questionexam WHERE question_id = '{$question_id}' AND answer = '{$answer}' ";
			$result = $db->query($query);

			if($result->num_rows > 0){
				return 1;
			}else{
				return 0;
			}
		}

		public static function getAllAnswers(){
			global $db;

			$query = "SELECT question_id, questions, answer FROM questionexam";
			$result = $db->query($query);

			$records = array();
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}

			$result->free();
			return $records;
		}

		public static function insertUserExamDetails($user_id,$score){
			global $db;

			if(!$user_id) return false;

			$query = "INSERT INTO user_score(user_id, score, date_exam, time_Finished) VALUES('{$user_id}','{$score}', CURRENT_DATE, CURRENT_TIME)";
			$result = $db->query($query);

			if($result){
				return true;
			}else{
				return false;
			}
		}

		public static function getLastResults($user_id){
			global $db;

			if(!$user_id) return false;

			$query = "SELECT score, date_exam, time_Finished FROM user_score WHERE user_id = '{$user_id}' ";
			$result = $db->query($query);

			$records = array();
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
			$result->free();
			return $records;
		}
	}
?>