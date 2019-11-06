<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Catr extends Model
{
     //  关联到模型的数据表
     protected $table = 'catr';

     public $timestamps = false;
   
     public $primaryKey = 'catr_id';
 
     protected $guarded = [];
}
