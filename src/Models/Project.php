<?php

namespace Dl\Panel\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['author_id','title','body','image','specialty_id'];
    public function specialty(){
        return $this->belongsTo(Dl\Panel\Models\Specialty::class);
    }
}
