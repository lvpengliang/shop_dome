<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
     //  关联到模型的数据表
     protected $table = 'nav';

     public $primaryKey = 'nav_id';

     public $timestamps = false;

     protected $guarded = [];
}
