<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
     //  关联到模型的数据表
     protected $table = 'attr';

     public $timestamps = false;
   
     public $primaryKey = 'attr_id';
 
     protected $guarded = [];
}
