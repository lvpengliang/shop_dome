<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     //  关联到模型的数据表
     protected $table = "user";

     public $timestamps = false;
   
     public $primaryKey = 'user_id';
 
     protected $guarded = [];
}
