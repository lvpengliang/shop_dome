<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Model\student;
use App\Http\Model\classe;
use DB;
class FitnessController extends Controller
{
     public function  indexs()
     {
       $classData=classe::get()->toArray();
       foreach($classData as $key=>$value){
           $info=student::where(['class_id'=>$value['class_id']])->count();
           $classData[$key]['class_count']=$info;

       }
        //  echo "<pre>";
        //  var_dump($classData);die;
        
         return view('api/fitness.indexs',['classData'=>$classData]);
     }


     public function show()
     {
         $classData=classe::get()->toArray();
        foreach($classData as $key=>$value){
            $info=student::where(['class_id'=>$value['class_id']])->get()->toArray();
            $classData[$key]['class_student']=$info;
        }
        //  echo  "<pre>";
        // var_dump($classData);die;
        // dd($classData);
            return view('api/fitness.show',compact('classData'));
       
    }






}
