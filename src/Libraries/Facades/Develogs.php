<?php

namespace Dl\Panel\Libraries\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use Dl\Panel\Models\Setting;
class Develogs extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Develogs';
    }

    public static function setting($key){
        $data=explode('.',$key);
        $value=Setting::where('key',$data[1])->where('tag',$data[0])->first();
        if($value){
            if($value->type== "boolean"){
                if ($value->value == "false"){
                    return false;
                }else{
                    return true;
                }
            }
            return $value->value;
        }
        return false;


    }
}
