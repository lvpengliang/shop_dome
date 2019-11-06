<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //  关联到模型的数据表
    protected $table = 'goods';

    public $timestamps = false;
  
    public $primaryKey = 'goods_id';

    protected $guarded = [];
}
