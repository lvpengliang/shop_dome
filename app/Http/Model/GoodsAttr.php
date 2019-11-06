<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsAttr extends Model
{
    //  关联到模型的数据表
    protected $table = 'goods_attr';

    public $timestamps = false;
  
    public $primaryKey = 'goods_attr_id';

    protected $guarded = [];
}
