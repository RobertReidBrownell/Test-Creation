<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ContentsController extends Controller
{
	//
	public function home(){
		$data = [];
		$data['version'] = '0.1.2';
		return view('contents/home', $data);
	}
}
