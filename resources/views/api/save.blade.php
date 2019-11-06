<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>
</head>
<body>
  <center>
     <form action=""  method="POST"   enctype="multipart/form-data">
       <span><h1>修改页面</h1></span>
        <table border="1">
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                        <td>学生性别</td>
                         <td>
                            <input type="radio" class="a"  name="sex" value="1" >男
                            <input type="radio" class="b"  name="sex" value="2">女
                         </td>
                    </tr>
                    <input type="hidden" name="id">
            <tr>
                        <td>
                        <button type="button" class="sub">修改</button>
                        </td>
            </tr>
                      
        </table>
     </form>
     </center>
</body>
</html>
<script type="text/javascript" src="/js/jquery.js"></script>
<script>

  //  发送请求到后台查询默认值 
  var id =getUrlParam('id');
//   alert(id);
  var urll="http://www.laravels.com/api/save";
                $.ajax({
                    url:urll,
                    data:{id:id},
                    dataType:"json",
                    success:function(res){
                                //页面赋值
                                $("[name='name']").val(res.data.name);
                                // $("[name='sex']").val(res.data.sex);
                                // console.log(res.data.sex);return;
                                if(res.data.sex == 1){
                                    $('.a').prop("checked","checked")
                                }else{
                                    $('.b').prop("checked","checked")
                                }
                                // var sex=$('input:radio:checked').val();
                    }
                })
                 function getUrlParam(name) {
                        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
                        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
                        if (r != null) return decodeURI(r[2]); return null; //返回参数值
                    }


                    $('.sub').on('click',function(){
                    //  alert(123);
                    var name=$("[name='name']").val();
                    var sex=$("[name='sex']").val();
                    //  var id=$("[name='id']").val();
                  
                    $.ajax({
                        url:"http://www.laravels.com/api/update",
                        data:{name:name,sex:sex,id:id},
                        dataType:'json',
                        method:'GET',
                        success:function(res){
                            if(res.code == 200){
                                alert(res.msg);
                                window.location.href='http://www.laravels.com/test/index';
                            }else{
                                alert(res.msg);
                            }
                        }
                    })
                })
</script>
