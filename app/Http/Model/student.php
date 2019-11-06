<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
     //  关联到模型的数据表
     protected $table = "student";

     public $timestamps = false;
   
     public $primaryKey = 'id';
 
     protected $guarded = [];
}
