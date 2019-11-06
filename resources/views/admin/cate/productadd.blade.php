@extends('layout.admin')

@section('content')
<h3>货品添加</h3>
<form action="{{url('/admin/productadd_do')}}" >
<table width="100%" id="table_list" class='table table-bordered'>
    <tbody>
    <input type="hidden" name="goods_id" value="{{$goods_id}}">
    <tr>
      <th colspan="20" scope="col">商品名称：oppo11&nbsp;&nbsp;&nbsp;&nbsp;货号：ECS000075</th>
    </tr>

    <tr>
      <!-- start for specifications -->
      @foreach($spec as $k=>$v)
      <td scope="col"><div align="center"><strong>{{$v[0]['attr_name']}}</strong></div></td>
      @endforeach
      <!-- <td scope="col"><div align="center"><strong>颜色</strong></div></td> -->
            <!-- end for specifications -->
     
      <td class="label_2">库存</td>
      <td class="label_2">&nbsp;</td>
    </tr>
    
    <tr id="attr_row">
      <!-- start for specifications_value -->
    @foreach($spec as $k => $v)
		<td align="center" style="background-color: rgb(255, 255, 255);">
			<select name="goods_attr[]">
        <option value="" selected="">请选择...</option>
       @foreach($v as $kk=>$vv)
        <option value="{{$vv['attr_value']}}">{{$vv['attr_value']}}</option>
        @endforeach
      </select>
    </td>
    @endforeach
		<!-- <td align="center" style="background-color: rgb(255, 255, 255);">
			<select name="attr[214][]">
				<option value="" selected="">请选择...</option>
			    <option value="土豪金">土豪金</option>
			    <option value="太空灰">太空灰</option>
			</select>
		</td> -->
	    <!-- end for specifications_value -->
		<td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="product_sn[]" value="" size="20"></td>
		<td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="product_number[]" value="1" size="10"></td>
		<td style="background-color: rgb(255, 255, 255);"><input type="button" class="button addRow" value=" + " ></td>
    </tr>

    <tr>
      <td align="center" colspan="5" style="background-color: rgb(255, 255, 255);">
        <input type="submit" class="button" value="添加">
      </td>
    </tr>
  </tbody>
</table>
</form>
<script type="text/javascript">
          $(document).on('click','.addRow',function(){
           var val=$(this).val();
           if(val==" + "){
               // 定义一个tr
            var tr=$(this).parent().parent();
            

            //  clone克隆 克隆好就是一个字符串
            $(this).val(" - "); //复制需要 -号
            var tr_clone=tr.clone();
            $(this).val(" + ");
            tr.after(tr_clone);
           }else{
             $(this).parent().parent().remove();
           }
           
          })
</script>
@endsection