<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class UserInfo extends Model
{
    //
    
    use DefaultDatetimeFormat;
    protected $table = 'user_info';
}
