<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    //
	public function getExamQuestions($exam_id) {
		$exam_questions = DB::table('questions as q')
		                     ->select('q.id', 'q.question')
		                     ->whereRaw("q.exam_id = '{$exam_id}'")
							 ->inRandomOrder()
							 ->limit(20)
		                     ->get()
		;
		return $exam_questions;
	}

	public function answers(){
		return $this->hasMany('App\Answers');
	}
}
