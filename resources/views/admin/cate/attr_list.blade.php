@extends('layout.admin')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                    <h2>属性列表</h2>


                <div class="table-responsive">


    <form method="post" action="" class="pull-right mail-search">
                    <div class="form-group">
            <label for="exampleInputFile">所属商品类型：</label>
            <select class="form-control type"   name='type_name'>
                <option value="">全部</option>
            @foreach($typeData as $v)
                    <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
            @endforeach
            </select>
        </div>
        <div class="input-group">
            <input type="text" class="form-control input-sm" name="attr_name" placeholder="搜索属性名称">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-primary">
                    搜索
                </button>
            </div>
        </div>
    </form>




                    <table class="table table-striped">
                        <thead>
                        <tr>




                            <th><input type="checkbox" class="checkbox">属性ID</th>
                            <th>属性名称</th>
                            <th>所属类型</th>
                            <th>是否可选</th>
                            <th>操作</th>




                        </tr>
                        </thead>
                        <tbody class="add">
                            @foreach($attrData as $v)
                            <tr >
                                <td ><label><input type="checkbox" class="del">{{$v['attr_id']}}</label></td>
                                <td>{{$v['attr_name']}}</td>
                                <td>{{$v['type_name']}}</td>
                                <td>
                                   @if (($v['attr_type'])==2)
                                        可选属性
                                    @else
                                        不可选属性
                                    @endif
                                </td>
                                <td><a href="#" class="btn btn-primary">编辑</a>
                    |
                                <a href="" class="btn btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach

              
                        </tbody>
                        <tr>
                            <td colspan="4">
                                <button class="btn btn-danger delete">删除</button>
                            </td>
                        </tr>


                    </table>
                         <center> {{$attrData->links()}}</center>
                    <div class="btn-group">
                    </div>
                </div>


            </div>


        </div>


    </div>
    <script type="text/javascript" src="https://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>

@endsection