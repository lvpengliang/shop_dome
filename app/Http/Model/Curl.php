<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Curl  extends Model
{
   
    public static function curlGet($url)
    {
        //1初始化
        $ch = curl_init();
        //2设置
        curl_setopt($ch,CURLOPT_URL,$url); //访问地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回格式
        //请求网址是https
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
        //3执行
        $content = curl_exec($ch);
        //4关闭
        curl_close($ch);  
        return $content;
    }
}
