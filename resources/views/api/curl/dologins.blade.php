<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
</head>
<body>
    <center>

    <form action="">

<table border="1" width="550">
        <tr>
            <td>登录用户名</td>
            <td><input type="text" name="name"></td>
        </tr>

        <tr>
            <td>登录密码</td>
            <td><input type="text" name="password"></td>
        </tr>

        <tr>
            <td>
                 <button type="button" class="but">登录</button>
            </td>
            
        </tr>
</table>
</form>
    </center>
   
</body>
</html>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/public.js"></script>
<script>
    $(".but").on('click',function(){
        var name=$("[name='name']").val();
        var password=$("[name='password']").val();
        //    console.log(name);
        //    console.log(password);
        var urll="http://www.laravels.com/api/api/dologin"

        $.ajax({
             url:urll,
             data:{name:name,password:password},
             dataType:"json",
             success:function(res){
                    if(res.code==200){
                        // setCookie('token',res.data,7200);
                        alert('登陆成功');
                        window.location.href="http://www.laravels.com/api/api/indee";
                    }else{
                        alert(res.msg);
                    }

                  
             }
        })
        
    });
</script>