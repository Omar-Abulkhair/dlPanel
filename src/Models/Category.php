<?php

namespace Dl\Panel\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //protected $guarded =['id','created_at'];
    protected $fillable=['name','image','color','parent_id'];
    public function parent(){
        return $this->belongsTo(self::class);
    }
}
