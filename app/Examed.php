<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

Class Examed extends Model
{
	public function getAvailableExams($user_id)
	{
		$available_exams = DB::table('exams as e')
		                     ->select('e.id', 'e.name')
		                     ->whereRaw(" e.id = $user_id")
		                     ->orderBy('e.id')
		                     ->get()
		;
		return $available_exams;
	}
}