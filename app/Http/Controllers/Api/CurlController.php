<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\Curl;
use App\Http\model\Cur;
use App\Http\model\User;
use DB;
class CurlController extends Controller
{
   public  function  adds()
    {
        $keywordArr = ['特朗普','王者荣耀','英雄联盟','韩剧'];
              foreach($keywordArr as $k => $v){
                $url="http://api.avatardata.cn/ActNews/Query?key=1a4dac9414894968a3b7c734d7a81238&keyword=".$v;
                $data=Curl::curlget($url);
                //把数据转化一下
                $data=json_decode($data,true);
                // dd($data);
                if($data['error_code']!=0){
                              echo "没有此条数据";die;

                }
                foreach($data['result'] as $key=>$value){
                     //判断当前新闻是否在库里
                    $newsData=DB::table('curl')->where(['title'=>$value['title']])->first();
                    if(!$newsData){
                          DB::table('curl')->insert([
                              'title'=>$value['title'],
                              'content'=>$value['content'],
                              'full_title'=>$value['full_title']
                          ]);
                    }
                    //  echo "<pre>";
                    //  var_dump($newsData);die;
                    $data=DB::table('curl')->get();
                      echo "<pre>";
                     var_dump($data);die;
                       //存到缓存里
                    //  Cache::put("news_data",$data,7200);
                    
                }
            }
                return json_encode(['code'=>'200','data'=>$data]);
    
    }

    public function indee()
    {
        $data=Cur::paginate(3);
      return view('api/curl.indee',['data'=>$data]);
    }


    public function  login(Request $request)
    {
       $name=$request->input('name');
       $password=$request->input('password');

       if(empty($name) || empty($password)){
           return json_encode(['code'=>211, 'msg'=>'用户名密码不能为空']);
       }
       $res=User::create([
              'name'=>$name,
              'password'=>$password,
              'add_time'=>time()
       ]);

        if($res){
            return json_encode(['code'=>200,'msg'=>'注册成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'注册失败']);
        }
    }

    public function dologin(Request $request)
    {
        $name=$request->input('name');
       $password=$request->input('password');
       $userData=User::where(['name'=>$name,'password'=>$password])->first();
       if(!$userData){
            return json_encode(['code'=>201,'msg'=>'账号密码不正确']);
       }
       $token=md5($userData['user_id'].time());
       $userData->token=$token;
       $userData->add_time=time()+7200;
       $userData->save();

       return json_encode(['code'=>200,'msg'=>'登录成功']);
        
    }

    
}
