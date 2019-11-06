<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\Type;
use App\Http\Model\Attr;
use App\Http\Model\Goods;
use App\Http\Model\GoodsAttr;
use App\Http\Model\product;
class CateController extends Controller
{
      //添加分类
      public function  cate()
      {
            
            $res=Category::get()->toArray();
            $cate=Category::cateTree($res);
            // compact() 函数创建一个包含变量名和它们的值的数组。
          return view('admin/cate.add',compact('cate'));
      }
      //处理分类
      public function do_cate(Request $request)
      {
            $req=$request->all();
            $res=Category::insert($req);
            if($res){
                  return redirect('/admin/list');
            }else{
                  echo "<script>alert('添加失败')</script>";
            }
      }
      //展示分类
        public function  list()
        {
              $res=Category::get()->toArray();
              $cate=Category::cateTree($res);

              return view('admin/cate.list',compact('cate'));
        }

        //删除分类 
        public function  delete(Request $request)
        {
              $req=$request->all();
            $res=Category::where('cate_id',$req['id'])->delete();
            if($res){
                  return redirect('/admin/list');
            }else{
                  echo "<script>alert('删除失败')</script>";
            }
        }

        //属性添加 
        public function  add_attr()
        {
             $typeData=Type::get()->toArray();

             return view('admin/cate.add_attr',compact('typeData'));
        }
        //处理属性添加
        public function do_add_attr(Request $request)
        {
            $req=$request->input();
            
            $attr_name=$req['attr_name'];
            $type_id=$req['type_id'];
            $attr_type=$req['attr_type'];

            $data=Attr::insert([
                  'attr_name'=>$attr_name,
                  'type_id'=>$type_id,
                  'attr_type'=>$attr_type
            ]);
            if($data){
                  return json_encode(['code'=>200,'msg'=>'添加成功']);
            }else{
                  return json_encode(['code'=>202,'msg'=>'添加失败']);
            }
        }
         //属性列表
        public function attr_list(Request $request)
        {
            $attr_name=$request->input('attr_name');
            $type_name=$request->input('type_name');
            $where=[];
            if(isset($attr_name)){
                  $where[]=["attr.attr_name","like","%$attr_name%"];
            }
            if(isset($type_name)){
                  $where[]=["type.type_id","=",$type_name];
            }
            $typeData=Type::get()->toArray();
            $attrData=Attr::join("type","attr.type_id","=","type.type_id")->where($where)->paginate(3);
              return view('admin/cate.attr_list',compact('typeData','attrData'));
        }

       //  商品添加
        public function  add_goods()
        { 
            $catedata=Category::get()->toArray();
            $typeData=Type::get()->toArray();

            return view('admin/cate.add_goods',compact('catedata','typeData'));
        }

         //商量类型
            public function getAttr(Request $request)
            {
                  $type_id=$request->input('type_id');
                  $data=Attr::where(['type_id'=>$type_id])->get()->toArray();
                  return json_encode($data);
            }

         //处理商品添加

          public function  do_add_goods(Request $request)
          {
            $data=$request->input();
             // 数据入库
            //  echo "<pre>";
            //  var_dump($data);
            $img= request('goods_img');
            // dd($img);
            $filename = md5(time().rand(1000,9999)).".".$img->getClientOriginalExtension();
            $path = $img->storeAs('img',$filename);

            $goodsData=Goods::create([
                  'goods_name'=>$data['goods_name'],
                  'cate_id'=>$data['cate_id'],
                  'goods_price'=>$data['goods_price'],
                  'goods_img'=>$path,
                  'goods_desc'=>$data['goods_desc']
            ]);
          
            //  获取商品主键id
            $goods_id=$goodsData->goods_id;
            //  echo $goods_id;die;
            // dd($goods_id);
            // 商品属性信息入库 商品 属性关系表
            foreach($data['attr_id_list'] as $key=>$value){
                   $insertData[]=[
                         'goods_id'=>$goods_id,
                         'attr_id'=>$value,
                         'attr_value'=>$data['attr_value_list'][$key],
                         'attr_price'=>$data['attr_price_list'][$key],
                   ];
            }
            $res=GoodsAttr::insert($insertData);

            return redirect("admin/productadd/".$goods_id);
          }

          //商品列表
          public function goods_list()
          {
            $goods=Goods::join('category','goods.cate_id','=','category.cate_id')->get()->toArray();
            $category=Category::get()->toArray();
                return view('admin/cate.goods_list',compact('goods','category'));
          }



          public function  productadd($goods_id)
          {
            $goodsData=Goods::where(['goods_id'=>$goods_id])->first();
            // echo "<pre>";
            //  var_dump($goodsData);die;
            $attrData=GoodsAttr::join("attr","goods_attr.attr_id","=","attr.attr_id")
            ->where(['goods_id'=>$goods_id,"attr.attr_type"=>2])->get()->toArray(); 

            //  echo "<pre>";
            //  var_dump($attrData);die;


            $spec= []; //规格数据

             foreach($attrData as $key =>$value){
                 $spec[$value['attr_id']][] = $value; 
             }

            //    echo "<pre>";
            //  var_dump($attrData);
                return view('admin/cate.productadd',compact('goodsData','goods_id','spec'));
          }

                  public function  productadd_do(Request $request)
                  {
                        $postData=$request->input();
                        // echo "<pre>";
                        //  var_dump($postData);
                        $size=count($postData['goods_attr'])  / count($postData['product_number']);
                      
                         $goods_attr=array_chunk($postData['goods_attr'],$size);
                        //  echo "<pre>";
                        //  var_dump($goods_attr);

                        foreach($goods_attr as $key=>$value){
                              $insertData[]=[
                                    'goods_id'=>$postData['goods_id'],
                                    'value_list'=>implode(",",$value),
                                    'number_product'=>$postData['product_number'][$key]  
                              ];             
                        }

                       
                        // echo  "<pre>";
                        // var_dump($insertData);
                         $res=product::insert($insertData);
                      
                  }

                 


                   public function aaa()
                   {
                        $url="http://wym.yingge.fun/api/user/test"; 
                        $name="吕芃良";
                        $age=21;
                        $mobile=126456;
                        $rand=rand(1000,9999);
                        $sign=
                        sha1('1902age'.$age.'&mobile'.$mobile.'&name='.$name.'&rand='.$rand);
                        $url.="?name={$name}&age={$age}&mobile={$mobile}&rand={$rand}&sign={$sign}";
                        $data=file_get_contents($url);
                   }
          

}