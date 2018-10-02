<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    //
	//This function is used to populate the list of available exams on a users page.
	public function getExams($user_id)
	{
		//We create a variable called $exams and we set it equal to the ID and the name's found running a query using
		//user ID of the authenticated user
		$exams = DB::table('exams as e')
		                    ->select('e.id', 'e.name')
		                    ->whereRaw("e.user_id = '{$user_id}'")
		                    ->get()
		;
		return $exams;
	}

	//This function is used when we only need the exam name returned and is used when we are generating exams
	public function getExamName($exam_id)
	{
		$exam_name = DB::table('exams as e')
		           ->select('e.name')
		           ->whereRaw("e.id = '{$exam_id}'")
		           ->get()
		;
		return $exam_name;
	}

	//This function adds the Exam information to the tables that are required.
	public function insertExam($exam_name, $user_id, $csv)
	{
		DB::beginTransaction();
		DB::insert('INSERT INTO exams (name, user_id) VALUES (?,?)',[$exam_name, $user_id]);
		$new_exam_id = DB::getPdo()->lastInsertId();

		 foreach ($csv as $question)
		 {
		 	$q = $question['question'];
		 	$a1 = $question['option1'];
		 	$a2 = $question['option2'];
		 	$a3 = $question['option3'];
		 	$a4 = $question['option4'];
		DB::insert('INSERT INTO questions (question, exam_id) VALUES (?,?)', [$q, $new_exam_id] );
			 $new_question_id = DB::getPdo()->lastInsertId();
			 $adata = array(
			 	       array('answer'=> $a1, 'exam_id' => $new_exam_id, 'question_id' => $new_question_id),
				       array('answer'=> $a2, 'exam_id' => $new_exam_id, 'question_id' => $new_question_id),
				       array('answer'=> $a3, 'exam_id' => $new_exam_id, 'question_id' => $new_question_id),
				       array('answer'=> $a4, 'exam_id' => $new_exam_id, 'question_id' => $new_question_id),
			 );
			 DB::table('answers')->insert($adata);
		 }

		DB::commit();
	}

	public function questions(){
		return $this->hasMany('App\Question');
	}
}
