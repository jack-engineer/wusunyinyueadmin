<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Messagetemplate extends Model
{
    //
    
    use DefaultDatetimeFormat;
    protected $table="message_templates";
}
