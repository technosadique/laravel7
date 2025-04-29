step 1: composer create-project laravel/laravel task_management "7.*"

step 2: configure db in .env file

Step 3: Create the Task model, migration, and controller
php artisan make:model Tasks -mcr

step 4: Define the database migration
(database/migrations/2025_04_28_062549_create_tasks_table.php)
public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->enum('priority', ['low', 'medium', 'high']);
        $table->timestamps();
    });
}

php artisan migrate --path=/database/migrations/2025_04_28_062549_create_tasks_table.php

step5: Define the routes(routes/web.php)

Route::get('/', 'Task@index');
Route::get('add', 'Task@add');
Route::get('edit/{id}', 'Task@edit');
Route::get('delete/{id}', 'Task@delete');
Route::post('update', 'Task@update');
Route::post('store', 'Task@store');


Step 6: Implement Task Controller
(app/Http/Controllers/Task.php)


step 7: php artisan make:seeder ProjectSeeder
step 8: php artisan make:seeder TaskSeeder
step 9: update Database Seeder.php 
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {       
			$this->call(ProjectSeeder::class);
			$this->call(TaskSeeder::class);
    }
}
?>

step 9: run seeder files 
php artisan db:seed

Step 10: Create views
resources/views/task/list-view.blade.php
resources/views/task/add-task.blade.php
resources/views/task/edit-task.blade.php


11. Hit the below URL in browser           
http://127.0.0.1:8000/
       OR
http://localhost/task_management/

Note: project is installed and configured in xampp server
db files provided under root directory
- tasks.sql
- projects.sql


