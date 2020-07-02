<?php
namespace Dl\Panel\Database\Seeds;
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
        $this->call(UserSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(SpecialtiesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
