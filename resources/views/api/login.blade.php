



<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">
    <!-- [if lt IE         9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif] -->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">h</h1>

            </div>
            <h3>欢迎使用 hAdmin</h3>
            <img src="http://qr.liantu.com/api.php?text=http://www.baidu.com"/>
            <form class="m-t" role="form" action="" method="post">

                <div class="form-group">
                    <input type="name" class="form-control"  placeholder="用户名" name="name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码"  name="password" >
                </div>
               
                <div class="form-group">
                    <input type="text" name='code' class="form-control" style="width:65%;float:left" placeholder="微信验证码">
                    <input type="button" class="btn btn-info" value="获取验证码" id="send">
                </div>
               
                <button type="submit" class="btn btn-primary block full-width m-b" id="btn">登 录</button>
            

                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery.min.js?v=2.1.4')}}"></script>
    <script src="{{asset('js/bootstrap.min.js?v=3.3.6')}}"></script>
</body>

</html>

<script type="text/javascript">
 $("#btn").on("click",function(){
       var name=$("[name='name']").val();
       var password=$("[name='password']").val();
        //  console.log(name);
        //  console.log(password);
        var urll="http://www.laravels.com/api/dologin";
        $.ajax({
            url:urll,
            data:{name:name,password:password},
            type:"POST",
            dataType:"json",
            success:function(res){
                 alert(res.msg);
                if(res.code==200){
								location.href="{{url('/api/loginw')}}";
							}
            }
                

        })
         
         event.preventDefault();
 })
</script>
