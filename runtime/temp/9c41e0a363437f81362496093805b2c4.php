<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\wamp\www\tp5\public/../application/admin\view\user\add.html";i:1513929158;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/css/bootstrap.min.css" />
</head>
<body>
    <div class="page">
        <form action="<?php echo url('user/addUser'); ?>" id="form" method="post">
            <div class="form-group">
                <label for="username">用户名：</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="用户名">
            </div>
            <div class="form-group">
                <label for="password">密   码：</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="密码">
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
</body>
<script>

</script>
</html>