<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Hash;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 

	    	Task::create([
                'user_id' => User::all()->random()->user_id,
                'content' => str_random(50),
	        ]);

    	}
    }
}
