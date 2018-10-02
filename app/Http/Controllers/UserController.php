<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;

class UserController extends Controller {
	//
	public function __construct(  Client $client ) {

		$this->client = $client;
	}

	public function index() {
		$data = [];

		$data['clients'] = $this->client->all();
		return view('client/index', $data);
	}


	public function newClient( Request $request, Client $client)  {
		$data = [];

		$data['name'] = $request->input('name');
		$data['last_name'] = $request->input('last_name');
		$data['address'] = $request->input('address');
		$data['zip_code'] = $request->input('zip_code');
		$data['city'] = $request->input('city');
		$data['state'] = $request->input('state');
		$data['email'] = $request->input('email');


		if( $request->isMethod('post')) {

			$this->validate(
				$request,
				[
					'name' => 'required',
					'last_name' => 'required',
					'address' => 'required',
					'zip_code' => 'required',
					'city' => 'required',
					'state' => 'required',
					'email' => 'required',
				]
			);

			$client->insert($data);

			return redirect('clients');
		}

		$data['modify'] = 0;
		return view('client/form', $data);
	}

	public function create() {
		return view('client/create');
	}

	public function show($user_id, Request $request) {
		$data = [];
		$data['user_id'] = $user_id;
		$user_data = $this->client->find($user_id);
		$data['name'] = $client_data->name;
		$data['last_name'] = $client_data->last_name;


		$request->session()->put('last_updated', $client_data->name . ' ' . $client_data->last_name);

		return view('client/form', $data);
	}
	public function modify( Request $request, $client_id, Client $client)  {
		$data = [];

		$data['name'] = $request->input('name');
		$data['last_name'] = $request->input('last_name');
		$data['address'] = $request->input('address');
		$data['zip_code'] = $request->input('zip_code');
		$data['city'] = $request->input('city');
		$data['state'] = $request->input('state');
		$data['email'] = $request->input('email');


		if( $request->isMethod('post')) {

			$this->validate(
				$request,
				[
					'name' => 'required',
					'last_name' => 'required',
					'address' => 'required',
					'zip_code' => 'required',
					'city' => 'required',
					'state' => 'required',
					'email' => 'required',
				]
			);
			$client_data = $this->client->find($client_id);

			$client_data->name = $request->input('name');
			$client_data->last_name = $request->input('last_name');
			$client_data->address = $request->input('address');
			$client_data->zip_code = $request->input('zip_code');
			$client_data->city = $request->input('city');
			$client_data->state = $request->input('state');
			$client_data->email = $request->input('email');

			$client_data->save();

			return redirect('clients');
		}

		$data['modify'] = 0;
		return view('client/form', $data);
	}
}