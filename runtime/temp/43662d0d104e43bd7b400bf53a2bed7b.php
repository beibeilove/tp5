<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\login\login.html";i:1520215714;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,body{
            width:100%;
            height:100%;
            overflow: hidden;
            background: url("../../../../public/static/img/bg-login.jpg") no-repeat center;
            background-size:cover;
        }
        a{text-decoration: none;}
        form{
            position: absolute;
            top:0;left:0;right:0;bottom:0;margin:auto;
            width:400px;height:300px;
            border:1px solid #333;border-radius: 10px;
            box-shadow: 1px 1px 10px rgba(45,45,45,0.6);
            padding:30px 10px;
            box-sizing: border-box;
            background:#cc99aa;
        }
        form h4{
            font-size: 30px;
            line-height: 40px;
            text-align: center;
            font-weight: normal;
            margin:0;
        }
        form label{
            width:100%;
            display: block;
            padding:10px;
            box-sizing: border-box;
            text-align: center;
        }
        form label span{
            font-size: 20px;
        }
        form label input{
            width:200px;
            line-height:30px;
            font-size: 20px;
        }
        form button{
            width:40%;
            font-size: 24px;
            line-height:40px;
            margin:20px auto 10px;
            display: block;
            border-radius: 10px;
        }
        form a{
            float: right;
            margin-right: 30px;
        }
    </style>
</head>
<body>
<form action="<?php echo url('login/relogin'); ?>" method="post">
    <h4>登录页面</h4>
    <label for="">
        <span>用户名：</span>
        <input type="text" name="username" placeholder="用户名">
    </label>
    <label for="">
        <span>密&nbsp;&nbsp;&nbsp;码：</span>
        <input type="password" name="password" placeholder="密码">
    </label>
    <button type="submit">登录</button>
    <a href="<?php echo url('reg/index'); ?>">请注册 ></a>
</form>
</body>
</html>