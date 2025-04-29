<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[['name'=>'project A'],['name'=>'project B'],['name'=>'project C'],['name'=>'project D']];
        DB::table('projects')->INSERT($data);
    }
}

