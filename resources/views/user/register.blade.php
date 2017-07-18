<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 14:33
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>新增用户</title>
</head>
<body>

<?php
#phpinfo();
use Illuminate\Support\Facades\Session;
$username = Session::get('username', '');
$password = Session::get('password', '');
$realName = Session::get('realName', '');
$_old_input = Session::get('_old_input', '');
if ($_old_input!=null){
    $username = $_old_input['username'];
    $password = $_old_input['password'];
    $realName = $_old_input['realName'];
}
echo  "_old_input = ";
print_r($_old_input )
//print_r( Session::all() ); //取出来看看是否put成功
?>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="loginSuccess" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <td>项目根目录：$path <?php if (isset($name)) echo $name ?> </td>
        </tr>
        <tr>
            <td>用户名:</td>
            <td><input type="text" name="userName"/><?php echo $username ?></td>
        </tr>
        <tr>
            <td>密　码:</td>
            <td><input type="password" name="password"/><?php echo $password ?></td>
        </tr>
        <tr>
            <td>姓　名:</td>
            <td><input type="text" name="realName"/><?php echo $realName ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="注册"/></td>
        </tr>
    </table>
</form>
</body>
</html>
