<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加页面 </title>
</head>
<body>
  <center>
     <form action="">
       <span><h1>添加页面</h1></span>
        <table>
        
            <tr>
                <td>商品名称</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                        <td>款式</td>
                         <td>
                            <input type="radio" name="sex" value="1" checked>男款
                            <input type="radio" name="sex" value="2">女款
                         </td>
            </tr>

            <tr>
                <td>商品图片</td>
                <td>
                    <input type="file" name="file" id="file">
                </td>
            </tr>

            <tr>
                        <td>
                        <button type="button" class="sub">添加</button>
                        </td>
            </tr>
                      
        </table> 

      </form>
      
     </center>
</body>
</html>
<script type="text/javascript" src="/js/jquery.js"></script>
<script>
   $(".sub").on('click',function(){
        var name=$("[name='name']").val();
       var sex=$('input:radio:checked').val();
        var fd = new FormData();
         fd.append('img',$("#file")[0].files[0]);
         fd.append('name',name);
         fd.append('sex',sex);

        //  console.log(fd);return;
        var urll="http://www.laravels.com/api/add?";
        // console.log(name);
        // console.log(sex);
        $.ajax({
            url:urll,
            data:fd,
            type:"POST",
            dataType:"json",
            processData:false,
            contentType:false,
            success:function(res){
                   alert(res.msg);
            window.location.href='http://www.laravels.com/test/index';
            }
        
        })
   
   })

</script>
