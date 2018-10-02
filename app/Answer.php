<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    //Generates the answers for the given Exam ID
	public function getQuestionAnswers($exam_id) {
		$exam_questions = DB::table('answers as a')
		                    ->select('a.id', 'a.answer', 'a.question_id')
		                    ->whereRaw("a.exam_id = '{$exam_id}' ")
							->inRandomOrder()
		                    ->get()
		;
		return $exam_questions;
	}

	public function deleteQuestionAnswers($exam_id) {

	}
}
