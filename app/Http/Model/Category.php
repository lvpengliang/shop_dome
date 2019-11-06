<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //  关联到模型的数据表
     protected $table = 'category';

     public $timestamps = false;
   
     public $primaryKey = 'cate_id';
 
     protected $guarded = [];


     public static function cateTree($data,$pid=0,$level=0) //重新对分类排序
     {
         if(!$data || !is_array($data)){
             return;
         }
         static $arr = [];
         foreach ($data as $k=>$v) {
             if($v['cate_pid']==$pid){
                 $v['level']=$level;
                 $arr[] = $v;
                 self::cateTree($data,$v['cate_id'],$level+1);
             }
         }
         return $arr;
     }
}
