<?php

namespace Dl\Panel\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Route;
use Request;
use \Illuminate\Routing\Controller;
class DlController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $name = Route::currentRouteName();
        $name = substr($name, strrpos($name, '.') + 1);
        $table = \Request::segment('2');
        $perms = [
            'create' => 'add',
            'store' => 'add',
            'edit' => 'update',
            'update' => 'update',
            'index' => 'browse',
            'delete' => 'delete'
        ];

        if(in_array($name,$perms)){
            $role_init=["role_or_permission:developer|$perms[$name] $table"];
            $this->middleware($role_init);
        }
        if(Request::ajax())
        {
            //TODO :: Secure Ajax Request Permissions
        }

    }
}
