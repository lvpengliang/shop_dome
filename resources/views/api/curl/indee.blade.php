<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>接口展示</title>
</head>
<body>
    <center>
       <table  border="1"> 
            <tr>
                <th>标题</th>
                <th>内容</th>
                <th>次数</th>
                <th>时间</th>
            </tr>

        @foreach($data as $v)
            <tr>
               <td>{{$v['title']}}</td>
               <td>{{$v['content']}}</td>
               <td>{{$v['img_width']}}</td>
               <td>{{$v['full_title']}}</td>
            </tr>
        @endforeach
       </table>
       {{ $data->links() }}
       </center>
</body>
</html>