
@extends('layout.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表展示</title>
</head>
<body>
        <center>
                    用户姓名: <input type="text" name="name">
                    <input type="button" class="search" value="搜索">
                <table width="550" >
                    <tr>
                            <td>ID</td>
                            <td>商品名称</td>
                            <td>款式</td>
                            <td>商品图片</td>
                            <td>操作</td>
                    </tr>

                    <tbody id="list">

                    </tbody>
                    
                </table>
                <!-- 从前台框架bootstrap模板模板布局复制过来的 -->
                <nav aria-label="Page navigation">
                <ul class="pagination">
                   
                </ul>
            </nav>
        </center>
</body>
</html>
<script type="text/javascript" src="/js/jquery.js"></script>
<script>
            var urll="http://www.laravels.com/api/index";
$.ajax({
    url:urll,
    type:"GET",
    dataType:"json",
    success:function(res){
        showData(res);      
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        }
      })
      

      //分页功能
      $(document).on('click',".pagination a",function(){
    //  alert(1);
    var page=$(this).attr('page');
        // alert(page);
        var urll="http://www.laravels.com/api/index";
        $.ajax({
            url:urll,
            data:{page:page,name:name},
            type:"GET",
            dataType:"json",
            success:function(res){
                 showData(res);             
            }
          
            
        })
})

  //删除 功能
   $(document).on('click',".del",function(){
        //  alert(1);
        var urll="http://www.laravels.com/api/delete";
        var id=$(this).attr('id');
        // alert(id);
    $.ajax({
        url:urll,
        data:{id:id},
        type:"GET",
        dataType:"json",
        success:function(res){
             if(res.code==200){
                 alert(res.msg);
                 location.reload();
             }else{
                 alert(res.msg);
             }
        }
        
    })
   })

   //修改功能 
   $(document).on('click',".upd",function(){
                //   alert(123);
                var id=$(this).attr('id');
                   window.location.href='http://www.laravels.com/test/save?id='+id
            })

    
    //搜索功能
    $(".search").on('click',function(){
        var name=$("[name='name']").val();
        var urll="http://www.laravels.com/api/index";
        $.ajax({
            url:urll,
            data:{name:name},
            type:"GET",
            dataType:"json",
            success:function(res){
                $("#list").empty();

                $.each(res.data.data,function(i,v){

             var tr=$("<tr></tr>");
            tr.append("<td>"+v.id+"</td>");
            tr.append("<td>"+v.name+"</td>");
            tr.append("<td>"+v.sex+"</td>");
            tr.append("<td><img src='\\"+v.img+"' width='80px'></td>");
            tr.append("<td><a href='javasript:;'id='"+v.id+"' class='del'>删除</a>||<a href='javascript:;' id='"+v.id+"' class='upd'>修改</a></td>");

            $("#list").append(tr);
             })

            }
        })
        
    })

    //封装分页
          function showData(res)
          {
            //   页面数据渲染
            $("#list").empty();

                $.each(res.data.data,function(i,v){
             var tr=$("<tr></tr>");
            tr.append("<td>"+v.id+"</td>");
            tr.append("<td>"+v.name+"</td>");
            tr.append("<td>"+v.sex+"</td>");
            tr.append("<td><img src='\\"+v.img+"' width='80px'></td>");
            tr.append("<td><a href='javasript:;'id='"+v.id+"' class='del'>删除</a>||<a href='javascript:;' id='"+v.id+"' class='upd'>修改</a></td>");
            $("#list").append(tr);
         })

          //构建页码
          var page = "";
              for(var i=1; i<=res.data.last_page; i++){
                  if(i ==res.data.current_page ){
                      //标红当前当前页
                    page +="<li class='active' ><a page='"+i+"'>第"+i+"页</a></li>";
                  }else{
                    page +="<li><a page='"+i+"'>第"+i+"页</a></li>";
                  }
                 
              }
               $('.pagination').html(page);                      
          }
</script>
@endsection