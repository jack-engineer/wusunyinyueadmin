<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Message extends Model
{
    //
    use SoftDeletes;
    use DefaultDatetimeFormat;


    protected $table = 'messages';
    
    public function setTouidAttribute($to_uid) {
        $this->attributes['to_uid'] = trim(implode($to_uid, ','), ',');
    }
}
