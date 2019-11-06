@extends('layout.admin')

@section('content')


<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>属性添加</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form" action="category/docategory">
                                    <div class="form-group">
                                        <label>属性名称</label>
                                        <input type="type" class="form-control" name="attr_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">类型选择</label>
                                        <select name="type_id" id="">
                                            @foreach($typeData as $v)
                                                <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>是否为可选</label>
                                        <div>
                                            可选<input type="radio" class="form-control xz"  name="attr_type" value="2">
                                        </div>
                                        <div>
                                            不可选<input type="radio" class="form-control xz"  name="attr_type" value="1">
                                        </div>
                                    </div>
                                    <div id="attr">
                                        <button type="button" class="btn btn-default" id='btn'>添加</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
     <script>   
     $('#btn').on('click',function (){
        var  attr_name=$("[name='attr_name']").val();
        var  type_id=$("[name='type_id']").val();
        var  attr_type=$("[name='attr_type']:checked").val();
            // console.log(attr_name);
            // console.log(type_id);
            // console.log(attr_type);
            // return false;
        var urll="http://www.laravels.com/admin/do_add_attr";
       $.ajax({
           url:urll,
           data:{attr_name:attr_name,type_id:type_id,attr_type:attr_type},
           type:"POST",
           dataType:"json",
           success:function(res){
                alert(res.msg);
                    location.href="http://www.laravels.com/admin/attr_list";
           }

       })
     })
     
     </script>


    @endsection