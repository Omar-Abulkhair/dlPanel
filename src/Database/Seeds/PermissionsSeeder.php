<?php
namespace Dl\Panel\Database\Seeds;
use DB;
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
        $tables = [];
        foreach ($t as $table) {
            $tables[] = $table->Tables_in_hillal;
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
    }
}
