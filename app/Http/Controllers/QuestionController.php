<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Exam;
use App\Answer;

class QuestionController extends Controller
{
    //
	public function show($exam_id)
	{
		$question = new Question();
		$exam = new Exam();
		$answer = new Answer();


		$data = [];
		$data['names'] =  $exam->getExamName($exam_id);
		$data['questions'] = $question->getExamQuestions($exam_id);
		$data['answers'] = $answer->getQuestionAnswers($exam_id);


		return view('exam/form', $data);
	}

	//Currently there is not a way to modify the values once an exam is uploaded.
	//This feature is next on the list of additions to add
	public function modify($exam_id)
	{

	}


}
