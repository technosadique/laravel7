<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data=[['name'=>'Task 1','priority'=>'high','project_id'=>2],['name'=>'Task 2','priority'=>'high','project_id'=>2],['name'=>'Task 3','priority'=>'low','project_id'=>1],
		['name'=>'Task 4','priority'=>'low','project_id'=>1],['name'=>'Task 5','priority'=>'low','project_id'=>1]];
        DB::table('tasks')->INSERT($data);
    }
}