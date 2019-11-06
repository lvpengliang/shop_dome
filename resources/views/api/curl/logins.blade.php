<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册页面</title>
</head>
<body>
    <center>

    <form action="" method="POST" enctype="multipart/form-data">
       <table border="1" width="550">
            <tr>
            <td>注册用户名</td>
            <td><input type="text" name="name"></td>
            </tr>

            <tr>
            <td>注册密码</td>
            <td><input type="text" name="password"></td>
            </tr>

            <tr>
            <td>
                <button type="button" class="sub">注册</button>
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
       var password=$("[name='password']").val();
                // console.log(name);
                // console.log(password);
        var urll="http://www.laravels.com/api/api/login";

        $.ajax({
            url:urll,
            data:{name:name,password:password},
            dataType:"json",
            success:function(res){
                 alert(res.msg);
            }
        });
       
      });
</script>