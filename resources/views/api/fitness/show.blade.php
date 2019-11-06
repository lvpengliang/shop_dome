<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>健身之神</title>
</head>
<body>
        <table width="1000" border="1">
         <tr>
            <th>班级ID</th>
            <th>班级名称</th>
            <th>学生信息</th>
         </tr>

     @foreach($classData as $k=>$v)
         <tr>
            <td>{{$v['class_id']}}</td>
            <td>{{$v['class_name']}}</td>  
            <td> 
                <table>
                    
                    @foreach($v['class_student'] as $kk=>$vv)

                        <tr>
                            <td>{{$vv['id']}}</td>
                            <td>{{$vv['name']}}</td>
                            <td>{{$vv['age']}}</td>
                        </tr>
                    @endforeach

                </table>
            </td>
            
            
             
        </tr>
     
    
    @endforeach
        </table>
</body>
</html>