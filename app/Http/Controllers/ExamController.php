<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Question;
use App\Exam;
use App\Answer;

class ExamController extends Controller
{
	//
	public function __construct(Exam $exam)
	{
		$this->exam = $exam;
	}

	public function index()
	{

		$exam = new Exam();

		$data = [];
		$user_id = Auth::user()->id;
		$data['user_id'] = $user_id;
		$data['exams'] = $exam->getExams($user_id);
		return view('exam/index', $data);
	}
//	public function show($exam_id)
//	{
//		$data = [];
//		$exam_data = $this->exam->find($exam_id);
//		$data['name'] = $exam_data->name;
//
//
//		return view('exam/form', $data);
//	}

	public function generateExam($exam_id)
	{
		$question = new Question();
		$exam = new Exam();
		$answer = new Answer();
		$data = [];
		$data['names'] =  $exam->getExamName($exam_id);
		$data['questions'] = $question->getExamQuestions($exam_id);
		$data['answers'] = $answer->getQuestionAnswers($exam_id);


		return view('exam/exam', $data);
	}
	public function upload(Request $request){
		$data = [];
		$exam = new Exam();
		$user_id = Auth::user()->id;
		if ($request->isMethod('post') ) {


			$newest =  Input::file('file_upload');


			$rows = array_map( 'str_getcsv', file($newest) );
			if ( $request->has( 'header' ) ) {
				array_shift( $rows );
			}
				$header = [ 'question', 'option1', 'option2', 'option3', 'option4' ];

			$csv = array();
			foreach ( $rows as $row ) {
				$csv[] = array_combine( $header, $row );
			}
			$exam_name = $request->exam_name;
			$exam->insertExam($exam_name,$user_id, $csv);

			return redirect( 'exams');
		}
		return view('exam/upload', $data);
	}

	//Feature to be added in the future is the ability to delete exams from the Table if there are mistakes or you have
	//an updated version
	public function delete($exam_id){

	}

}