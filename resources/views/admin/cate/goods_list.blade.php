@extends('layout.admin')

@section('content')

<table class="layui-table">
  <thead>
    <tr>
      <th>商品ID</th>
      <th>商品名称</th>
      <th>商品分类</th>
      <th>商品价格</th>
      <th>是否上架</th>
      <th>商品图片</th>
      <th>操作</th>
    </tr>
  </thead>
     @foreach($goods  as $v)
            <tr >
                <td>{{$v['goods_id']}}</td>
                <td>{{$v['goods_name']}}</td>
                <td>{{$v['cate_name']}}</td>
                <td>{{$v['goods_price']}}</td>
                <td>
                    @if (($v['goods_desc'])==1)
                      √
                    @else
                     ×
                     @endif
                </td>
                <td><img src="\{{$v['goods_img']}}" width="80" class="content"></td>
                <td><a href="{{url('/admin/productadd/')}}/{{$v['goods_id']}}" class="btn btn-danger">货品详情</a></td>
            </tr>
     @endforeach
        </table> 
    </body>
</html>


@endsection