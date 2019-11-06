<?php

namespace App\Http\Controllers\mini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Nav; 
class IndexController extends Controller
{
     public function  lists()
     {
       $data=Nav::get()->toArray();
        $result=[
               'code'=>200,
               'msg'=>'success',
               'data'=>$data
        ];
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
     } 
}
