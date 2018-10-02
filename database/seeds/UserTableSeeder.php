<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('users')->insert(
		    [
			    'name'=> 'Reid',
			    'email'=> 'reid@reidbrownell.com',
			    'password'=> bcrypt('L3r0pt34o1'),
		    ]
	    );
    }
}
