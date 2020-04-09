<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use App\Models\Tag;

class Article extends Model
{
    //
    use SoftDeletes;
    use DefaultDatetimeFormat;


    protected $table = 'articles';
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = implode(',', $value);
    }

    /**
     * 获取该文章的附件
     */
    public function enclosures()
    {
         return $this->hasMany('App\Models\Enclosure','article_id','id');
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment","article_id",'id');
    }
}
