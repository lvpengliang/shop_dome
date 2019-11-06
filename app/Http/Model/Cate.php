<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
     //  关联到模型的数据表
     protected $table = 'cate';

     public $timestamps = false;
   
     public $primaryKey = 'id';
 
     protected $guarded = [];
}
