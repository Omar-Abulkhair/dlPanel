<?php
namespace Dl\Panel\Database\Seeds;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Dl\Panel\Models\User;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ex = ['failed_jobs', 'migrations', 'model_has_permissions', 'model_has_roles', 'password_resets'];
        $t = DB::select('SHOW TABLES');
        $table_name="Tables_in_".env('DB_DATABASE','laravel');
        $tables = [];
        foreach ($t as $table) {
            $tables[] = $table->{$table_name};
        }
        $tables_to_init = array_diff($tables, $ex);
        $role=Role::create(['name' => "developer",]);
        $user=User::findOrFail(1);
        $user->assignRole($role);

        foreach ($tables_to_init as $table) {
            $p=Permission::create(['name' => "browse $table", 'guard_name' => "web",]);
            $role->givePermissionTo($p);
            $p=Permission::create(['name' => "add $table", 'guard_name' => "web",]);
            $role->givePermissionTo($p);
            $p=Permission::create(['name' => "edit $table", 'guard_name' => "web",]);
            $role->givePermissionTo($p);
            $p=Permission::create(['name' => "delete $table", 'guard_name' => "web",]);
            $role->givePermissionTo($p);
        }
        $role1=Role::create(['name' => "user",]);

    }
}
