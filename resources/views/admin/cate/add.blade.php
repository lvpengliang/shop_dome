@extends('layout.admin')

@section('content')

<form class="layui-form" action="{{url('/admin/do_cate')}}">
<div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-inline">
      <input type="text" name="cate_name" id="cate_name" name="cate_name" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">所属分类</label>
    <div class="layui-input-inline">
      <select name="cate_pid" lay-filter="aihao">
        <option value="0">顶级分类</option>
         @foreach($cate as  $v)
            <option value="{{$v['cate_id']}}" >@php echo str_repeat("&nbsp;&nbsp;&nbsp;",$v['level'])@endphp {{$v['cate_name']}}</option>
        @endforeach
       
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" id="btn" lay-submit lay-filter="formDemo" >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
<script>
layui.use('form', function(){
  var form = layui.form;
});
// $('#cate_name').blur(function(){
//     var cate_name=$("[name='cate_name']").val();
//     //   alert(cate_name);
//     var _this = $(this);
//         // alert(_this);
// });










</script>
@endsection