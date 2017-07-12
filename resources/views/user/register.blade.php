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
<form action="loginSuccess" method="post">
    <table>
        <tr>
            <td>项目根目录：$path <?php echo $name; ?> </td>
        </tr>
        <tr>
            <td>用户名:</td>
            <td><input type="text" name="userName"/></td>
        </tr>
        <tr>
            <td>密　码:</td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td>姓　名:</td>
            <td><input type="text" name="realName"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="提交"/></td>
        </tr>
    </table>
</form>
</body>
</html>
