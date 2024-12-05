<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[['name'=>'apple','qty'=>'10'],['name'=>'mango','qty'=>'50']];
        DB::table('products')->INSERT($data);
    }
}
