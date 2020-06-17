<?php

namespace Dl\Panel\Controllers;

use Illuminate\Http\Request;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends DlController
{
    public function index()
    {
        /*\Artisan::call('route:list');
        dd(\Artisan::output());*/

    }

    public function init(){
        $this->createPermissions();
    }

    public function createPermissions(){
        $tables = DB::select('SHOW TABLES');
        $ts=[];
        foreach($tables as $table){
            $ts[]=$table->Tables_in_hillal ;
        }

        $except=["none","migrations","model_has_permissions","model_has_roles","password_resets","failed_jobs"];

        for ($i=0;$i<count($tables);$i++){

            if (array_search($ts[$i],$except)){
                unset($ts[$i]);
            }
        }
        $role = Role::create(['name' => 'admin']);

        foreach ($ts as $model){
            $permission=Permission::create(["name"=>"browse $model"]);
            $permission->assignRole($role);
            $permission=Permission::create(["name"=>"add $model"]);
            $permission->assignRole($role);
            $permission=Permission::create(["name"=>"edit $model"]);
            $permission->assignRole($role);
            $permission=Permission::create(["name"=>"delete $model"]);
            $permission->assignRole($role);
        }
    }

    public function test(Request $request)
    {

    }
}
