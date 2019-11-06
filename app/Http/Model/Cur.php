<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cur extends Model
{
     //  关联到模型的数据表
     protected $table = 'curl';

     public $timestamps = false;
   
     public $primaryKey = 'curl_id';
 
     protected $guarded = [];
}
