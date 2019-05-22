<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;
use App\TaskComment;
class TaskCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

	    	TaskComment::create([
                'user_id' => User::all()->random()->user_id,
                'task_id' => Task::all()->random()->task_id,
                'content' => str_random(50),
	        ]);

    	}
    }
}
