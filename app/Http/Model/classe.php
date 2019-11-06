<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
     //  关联到模型的数据表
     protected $table = 'class';

     public $timestamps = false;
   
     public $primaryKey = 'class_id';
 
     protected $guarded = [];
}
