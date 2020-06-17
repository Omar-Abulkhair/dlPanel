<?php

namespace Dl\Panel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'parent_id', 'description', 'tag','is_checked','user_id'];

    public function user(){
        return $this->belongsTo(Dl\Panel\Models\User::class);
    }
}
