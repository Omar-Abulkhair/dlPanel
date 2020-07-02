<?php
namespace Dl\Panel\Database\Seeds;
use DB;
use Illuminate\Database\Seeder;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key'=>'logo',
            'type'=>'image',
            'tag'=>'site',
            'value'=>'/assets/images/logo.jpeg'
        ]);

        DB::table('settings')->insert([
            'key'=>'provider',
            'type'=>'image',
            'tag'=>'admin',
            'value'=>'/assets/images/logo.jpeg'
        ]);

    }
}
