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
            'birthday' => '2020-05-19',
            'phone' => '+201068313751',
            'created_at'=>'2020-05-19 13:13:00',
            'about'=>'Lorem ipsum is a pseudo-Latin text used in web design, ',
            'avatar'=>'app-assets/images/portrait/small/avatar-s-17.jpg',
            'address'=>"Sharkia ,Egypt",
            'website'=>'https://develogs.com',
            'socialMedia'=>"{\"facebook\":\"omar\"}",
            'active'=>1
        ]);

        DB::table('users')->insert([
            'name' => 'mohamed',
            'username' => 'mohamed',
            'email' => 'mohamed@outlook.com',
            'password' => bcrypt('*123456789*'),
            'birthday' => '2014-12-1',
            'phone' => '0293432',
            'created_at'=>'2020-05-19 13:13:00',
            'about'=>'Lorem ipsum is a pseudo-Latin text used in web design, ',
            'avatar'=>'app-assets/images/portrait/small/avatar-s-2.jpg',
            'address'=>"Sharkia ,Egypt",
            'website'=>'https://develogs.com',
            'socialMedia'=>"{\"facebook\":\"omar\"}",
            'active'=>1
        ]);

    }
}
