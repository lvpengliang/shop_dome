<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
     //  关联到模型的数据表
     protected $table = 'type';

     public $timestamps = false;
   
     public $primaryKey = 'type_id';
 
     protected $guarded = [];
}
