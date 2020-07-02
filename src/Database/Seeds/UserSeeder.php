<?php
namespace Dl\Panel\Database\Seeds;
use DB;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Omar Abulkhair',
            'username' => 'admin',
            'email' => 'omar.abulkhair@outlook.com',
            'password' => bcrypt('*7Batta7*'),
            'birthday' => '1999-06-21',
            'phone' => '+201068313751',
            'created_at'=>'2020-05-19 13:13:00',
            'about'=>'Lorem ipsum is a pseudo-Latin text used in web design, ',
            'avatar'=>'',
            'address'=>"Sharkia ,Egypt",
            'website'=>'https://develogs.com',
            'socialMedia'=>'{"facebook":"omar facebook","twitter":"omar twitter"}',
            'active'=>1
        ]);

    }
}
