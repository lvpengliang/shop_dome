<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//接口基本增删改查
Route::any('/api/add','Api\TestController@add');//添加
Route::get('/test/add',function (){
    return view('api.add');
});
Route::any('/api/index','Api\TestController@index');//展示
Route::get('/test/index',function (){
    return view('api.index');
});
Route::any('/api/delete','Api\TestController@delete');//删除
Route::any('/api/save','Api\TestController@save');//修改
Route::any('/test/save',function(){
    return view('api.save');
});
Route::any('/api/update','Api\TestController@update');//修改执行
Route::any('/api/login','Api\TestController@login');//登陆
Route::any('/api/dologin','Api\TestController@dologin');//处理登陆



//电商项目 后台管理
Route::any('/admin/cate','Admin\CateController@cate'); //添加分类
Route::any('/admin/do_cate','Admin\CateController@do_cate');//处理添加分类
Route::any('/admin/list','Admin\CateController@list');//分类展示
Route::any('/admin/delete','Admin\CateController@delete');//分类删除
Route::any('/admin/add_attr','Admin\CateController@add_attr');//属性添加
Route::any('/admin/do_add_attr','Admin\CateController@do_add_attr');//处理属性添加
Route::any('/admin/attr_list','Admin\CateController@attr_list');//列表展示
Route::any('/admin/add_goods','Admin\CateController@add_goods');//商品添加
Route::any('/admin/getAttr','Admin\CateController@getAttr');
Route::any('/admin/do_add_goods','Admin\CateController@do_add_goods');//处理商品添加
Route::any('/admin/goods_list','Admin\CateController@goods_list');  //商品展示
Route::any('/admin/productadd/{goods_id}','Admin\CateController@productadd');  //货品添加
Route::any('/admin/productadd_do','Admin\CateController@productadd_do'); //货品处理添加

Route::any('/admin/aaa','Admin\CateController@aaa'); //货品处理添加

// 电商项目 API前台接口 
//解决跨越中间件                                    
Route::middleware(['apiheader'])->prefix('api')->namespace('Api')->group(function () {
    Route::any('/index/news','IndexController@news');
    Route::any('/index/lei','IndexController@lei');
 
    Route::any('/index/login','IndexController@login');
    

    Route::middleware(['apitoken'])->group(function (){
        Route::any('/index/details','IndexController@details');
        Route::any('/index/addcart','IndexController@addcart');
        Route::any('/index/catrshow','IndexController@catrshow');

    });

    Route::any('/api/adds','CurlController@adds');//10月接口添加
    Route::any('/api/indee','CurlController@indee');//10月接口展示
    Route::any('/api/login','CurlController@login');//10月接口注册
    Route::any('api/logins',function(){
          return view('api/curl.logins');
    });
    Route::any('/api/dologin','CurlController@dologin');//10月接口登录
    Route::any('api/dologins',function(){
        return view('api/curl.dologins');
  });
      
});
// 数据处理测试
Route::any('/api/indexs','APi\FitnessController@indexs');
Route::any('/api/show','APi\FitnessController@show');


//微信小程序接口
Route::prefix('mini')->group(function(){
     Route::any('nav/lists','Mini\IndexController@lists');
});



Route::get('/', function () {
    return view('welcome');
});
