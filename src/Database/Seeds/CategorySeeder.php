<?php
namespace Dl\Panel\Database\Seeds;
use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'new category',
            'color' => '#000',
        ]);
    }
}
