<?php
namespace Dl\Panel\Database\Seeds;
use DB;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'name' => 'task1',
            'description' => 'omar.abulkhair@outlook.com',
            'is_checked' => false,
            'user_id' => 1,
        ]);

        DB::table('todos')->insert([
            'name' => 'task2',
            'description' => 'omar.abulkhair@outlook.com',
            'is_checked' => false,
            'user_id' => 1,
            'parent_id' => 1,
        ]);

        DB::table('todos')->insert([
            'name' => 'task3',
            'description' => 'omar.abulkhair@outlook.com',
            'is_checked' => false,
            'user_id' => 1,
            'parent_id' => 1,
        ]);
    }
}
