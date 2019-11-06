<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\Cate;
class TestController extends Controller
{       

        public function add(Request $request)
        {
            $name=$request->input('name');
            $sex=$request->input('sex');

            if(empty($name) || empty($sex)){
                return json_encode(['code'=>201,'msg'=>'参数不能为空']);
            }
            $path="";
            if ($request->hasFile('img')) {
                $path = $request->img->store('images/'.date('Y-n-j'));
            }

           $res=DB::table('cate')->insert([
                 'name'=>$name,
                 'sex'=>$sex,
                 'img'=>$path,
                 'add_time'=>time(),
           ]);
          if($res){
            return json_encode(['code'=>200, 'msg'=>'添加成功']);
          }else{
            return json_encode(['code'=>202, 'msg'=>'添加失败']);
          }

        }


        public function index(Request $request)
        {

            $name=$request->input('name');
            $where=[];
            if(!empty($name)){
                $where[]=['name','like',"%$name%"];
            }
            $data=DB::table('cate')->where($where)->paginate(2)->toArray();
            return json_encode(['code'=>200,'data'=>$data]);
        }

        public function delete(Request $request)
     {
        $id=$request->input();
                if(empty($id)){
                  return json_encode(['code'=>201,'msg'=>'id不能为空']);
                  }
            $res=DB::table('cate')->where('id',$id)->delete();
            // dd($res);
            if($res){
                //删除成功
                return json_encode(['code'=>200,'msg'=>'删除成功']);
            }else{
                // 删除失败
                return json_encode(['code'=>202,'msg'=>'删除失败']);
            }
     }

     public function save(Request $request)
     {  
        $id=$request->input('id');
         if(empty($id)){
             return json_encode(['code'=>203,'msg'=>'修改id不能为空']);
         }
        //查询数据库
        $data=DB::table('cate')->where(['id'=>$id])->first();
        //  dd($data);
        //返回json数据
        return json_encode(['code'=>200,'data'=>$data]);
     }


     public function update(Request $request)
     {
         //要求传递 name 和mobile
       $name=$request->input('name');
       $sex=$request->input('sex');
       $id=$request->input('id');
       
      
        $data =Cate::find($id);

        $flight->name = $name;
        $flight->sex = $sex;
        $res = $flight->save();
    
        if($res){
            //添加成功
            return json_encode(['code'=>200,'msg'=>'修改成功']);
        }else{
            //添加失败
            return json_encode(['code'=>201,'msg'=>'修改失败']);
        }     
     }
     


       public function  login()
       { 
           return view('/api/login');
       }


       public function dologin(Request $request)
       {
         
          $req=$request->all();
          $req['password']=md5($req['password']);
          $where=['name'=>$req['name']];
          $info=DB::table('user')->where($where)->first();
          //判断数据库中是否有此用户
        //   dd($info);
        if(empty($info)){
           return json_encode(['code'=>202, 'msg'=>'用户名不存在']); 
           
        }else if($req['password']!==$info->password){
          return json_encode(['code'=>201,'msg'=>'密码错误']);
        }else{
             session(['name'=>$req['name']]);
            return json_encode(['code'=>200,'msg'=>'登陆成功']);

            
        }
          
       }

   


}
