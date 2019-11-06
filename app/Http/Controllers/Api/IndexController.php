<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Attr;
use App\Http\Model\Category;
use App\Http\Model\Goods;
use App\Http\Model\GoodsAttr;
use App\Http\Model\product;
use App\Http\Model\Type;
use App\Http\Model\User;
use App\Http\Model\Catr;
use Illuminate\Support\Facades\Cache;
class IndexController extends Controller
{
    //查询最新商品接口
    public function news()
    {
        //缓存处理 
        //先去缓存里读数据
           $goodsData=Goods::orderBy("goods_id","DESC")->limit(4)->get()->toArray();

           foreach($goodsData as $key =>$value){
            $goodsData[$key]['goods_img']="http://www.laravels.com/".$value['goods_img'];
           }
        //    echo "<pre>";
        //    var_dump($goodsData);die;
           return json_encode($goodsData);

    }
     //查询商品分类
    public function lei()
    {
        $cateinfo=Category::get()->where('cate_pid',0)->toArray();
        //      echo "<pre>";
        //    var_dump($cateinfo);die;
         return json_encode($cateinfo);
    }

    public function details(Request $request) 
    {
        $goods_id=$request->input('goods_id');
        $goodsData=Goods::where('goods_id',$goods_id)->first();
         $attrData=GoodsAttr::join("attr","goods_attr.attr_id","=","attr.attr_id")
         ->where(['goods_id'=>$goods_id])->get()->toArray();
        //   echo "<pre>";
        //   var_dump($attrData);die;
            $specData=[];
            $argsData=[];
          foreach($attrData as $key=>$value){
              if($value['attr_type']== 2){
               $specData[$value['attr_id']][]=$value;
              }else{
                  $argsData[]=$value;
              }
          }
        return json_encode([
                'goodsData'=>$goodsData,
                'specData'=>$specData,
                'argsData'=>$argsData
        ]);
    }

            public  function login(Request $request)
            {
                //接收用户名或者密码
                    $name=$request->input('name');
                    $password=$request->input('password');
                    //查询数据库
                    $userData=User::where(['name'=>$name,'password'=>$password])->first();
                    //判断正确
                    if(!$userData){
                        return json_encode(['code'=>201,'msg'=>'用户名或者密码错误']);
                    }
                    //生成一个token令牌
                    $token=md5($userData['user_id'].time());
                    $userData->token=$token;
                    $userData->add_time=time()+7200;
                    $userData->save();

                    return json_encode([
                        'code'=>200,
                        'msg'=>'登录成功',
                         'data'=>$token
                    ]);

            }
                //检验 token令牌 添加购物车
             public function addcart(Request $request)
             {
                // var_dump($userData);die;
                $goods_id=$request->input('goods_id');
                $goods_attr_list=implode(",",$request->input('attr_list'));
                $user_id=$userData['user_id'];
                //  var_dump($goods_attr_list);
                $buy_number =1;
                $productData=product::where(['goods_id'=>$goods_id,'value_list'=>$goods_attr_list])->first();
                // echo "<pre>";
                // var_dump($productData);die;
                $product_num=$productData['number_product'];//商品的库存量
                if($buy_number >=$product_num){
                            //没货
                        $is_have_num=0;
                }else{
                        //有货
                        $is_have_num=1;
                }
                //判断加入购物车商品 是否已存在
                $catrData=Catr::where(['goods_id'=>'goods_id','user_id'=>$user_id,
                'goods_attr_list'=>$goods_attr_list])->first();
                //     echo "<pre>";
                //   var_dump($cartData);
                if(!empty($catrData)){
                    $cartData->buy_number=$cartData->buy_number+$buy_number;
                    $cartData->save();
                }else{
                   $catrData=Catr::create([
                        'goods_id'=>$goods_id,
                        'goods_attr_list'=>$goods_attr_list,
                        'user_id'=>$user_id,
                        'buy_number'=>$buy_number,
                        'product_id'=>$productData->product_id,
                        'is_have_num'=>$is_have_num
                    ]);
                }
                return json_encode(['code'=>200,'msg'=>'加入购物车成功']);

             }

             public function  catrshow(Request $request)
             {
                $userData = request()->get('userData');//中间件产生的参数
                $catrData=Catr::join("goods","catr.goods_id","=","goods.goods_id")
                ->where(['user_id'=>$userData->user_id])
                ->get()->toArray();
                 
             
                foreach($catrData as $key=>$value){
                    // echo "<pre>";
                   $goods_attr_list=explode(',',$value['goods_attr_list']);
                
                    $catrData[$key]['goods_img']='http://www.laravels.com/'.$value['goods_img']; 
                    $goodsAttrData=GoodsAttr::join("attr","goods_attr.attr_id","=","attr.attr_id")
                    ->whereIn("goods_attr_id",$goods_attr_list)
                   ->get()->toArray();
               

                        $goods_attr_list='';
                    // 循环不能冲突 设置$k=>$v
                    foreach($goodsAttrData as $k=>$v){
                    //点拼接
                    $goods_attr_list.= $v['attr_name'].":".$v['attr_value'].',';
                    }
                    // echo "<pre>";
                    // var_dump($goods_attr_list);die;
                    $goods_attr_list=rtrim($goods_attr_list,',');
                    $catrData[$key]['goods_attr_list']=$goods_attr_list;
                }
                // echo "<pre>"; 
                // var_dump($goodsAttrData);
               
                return json_encode(['code'=>200,'res'=>$catrData]);


             }

            
             
             
            


    

}
