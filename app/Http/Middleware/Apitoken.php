<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Model\User;
use Illuminate\Support\Facades\Cache;
class Apitoken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // echo 1;die;

        $userData = $this->checkToken($request);
       
        $mid_params = ['userData'=>$userData];
          $request->attributes->add($mid_params);//添加参数

          //接口防刷处理
        //根据ip做防刷
        //获取客户端ip 
     
        $ip=$_SERVER['REMOTE_ADDR'];
        //记录当前ip 1分钟访问了接口多少
        $cache_name="pass_time_".$ip;
        // dd($cache_name);
        //上一次访问多少次
        $num=Cache::get($cache_name);
        if(!$num){
             $num=0;
        }
        if($num >50){
            //ip记录到文件 服务器端配置屏蔽某个ip
            echo json_encode([
                'ret'=>201,
                'msg'=>"访问接口过于频繁 请稍等"
            ]);die;
        }
        $num +=1;
        //  echo $num;
        Cache::put($cache_name,$num,10);
      
        return $next($request);
    }


    public  function checkToken($request)
    {
        $token=$request->input('token');//接收token令牌
                 if(empty($token)){
                     return json_encode(['code'=>201,'msg'=>'请先登录']);
                 }
                 //检测token是否正确
                 $userData=User::where(['token'=>$token])->first();
                 if(!$userData){
                     return json_encode(['code'=>202,'msg'=>'请先登录']);
                 }
                 //判断有期限
                 if(time()>$userData['add_time']){
                    return json_encode(['code'=>202,'msg'=>'请重新登陆']);
                 }
                 $userData->add_time=time()+7200;
                 $userData->save();

                 return $userData;
    }



}