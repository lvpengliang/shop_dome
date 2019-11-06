@extends('layout.admin')

@section('content')

<table class="layui-table">
 
  <thead>
    <tr>
      <th>ID</th>
      <th>分类名称</th>
      <th>操作</th>
    </tr> 
  </thead>
  @foreach($cate as $v)
  <tbody>
    <tr>
      <td>
      <input type="checkbox"  class="i-checks" name="input[]">{{$v['cate_id']}}
        </td>
      <td>@php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$v['level'])@endphp {{$v['cate_name']}}</td>
      <td> <a href="{{url('/admin/delete')}}?id={{$v['cate_id']}}"> <i class="layui-btn layui-btn-radius layui-btn-danger">删除</i></a></td>
    </tr>
 @endforeach
  </tbody>
</table>



@endsection