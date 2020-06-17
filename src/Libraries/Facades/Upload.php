<?php

namespace Dl\Panel\Libraries\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
class Upload extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Upload';
    }

    public static function put($path = "/" , $image){
        $path=Storage::put($path."/".Auth::id(), $image);
        if(is_string($path)){
            return $path;
        }else{
            return false;
        }
    }
}
