<?php

namespace Dl\Panel\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['key','type','tag','value','options'];

    public function scopeTags($query){
        return $query->distinct('tag')->pluck('tag');

    }
}
