<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    	User::create([

                'full_name' => 'administrator',
                'email' => 'administrator@gmail.com',
                'phone' => 982311265,
                'position_in_office' => 'manager',
                'is_admin' => 1,
                'status' => 1,
                'avatar' =>'some.jpg',
	            'password' => 'secret',

	        ]);
    }
}
