<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Userrole extends Model
{
    //
    
    use SoftDeletes;
    use DefaultDatetimeFormat;


    protected $table = 'userroles';
}
