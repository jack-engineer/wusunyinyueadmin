<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Usercoinlog extends Model
{
    //
    
    use DefaultDatetimeFormat;
    protected $table = 'usercoinlogs';
}
