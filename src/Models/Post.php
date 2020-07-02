<?php

namespace Dl\Panel\Models;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    const PUBLISHED = 'published';
    protected $fillable = ['author_id', 'category_id', 'title', 'seo_title', 'excerpt', 'body', 'image', 'slug', 'meta_description', 'meta_keywords', 'status', 'featured'];
    protected $guarded=[];
    protected $guard_name = 'web';

    public function category(){
        return $this->belongsTo(\Dl\Panel\Models\Category::class,'category_id');
    }

    public function author(){
        return $this->belongsTo(\Dl\Panel\Models\User::class,'author_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }
}
