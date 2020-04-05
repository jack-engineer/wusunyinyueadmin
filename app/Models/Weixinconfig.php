<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Weixinconfig extends Model
{
    //
    use DefaultDatetimeFormat;


    protected $table = 'weixinconfigs';
}
