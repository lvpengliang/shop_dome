<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
        //  关联到模型的数据表
        protected $table = "product";

        public $timestamps = false;
      
        public $primaryKey = 'product_id';
    
        protected $guarded = [];
}
