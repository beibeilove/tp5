<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp\www\tp5\public/../application/admin\view\position\show.html";i:1514270679;}*/ ?>
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
<div class="page table-responsive">
    <form action="<?php echo url('Position/show'); ?>" class="form-inline marginBottom" method="post" id="form">
        <div class="form-group">
            <label for="posname">推荐位名称：</label>
            <input type="text" class="form-control" name="posname" id="posname" placeholder="推荐位名称" value="<?php echo $searcharr['posname']; ?>">
        </div>
        <?php if($searcharr['posname']): ?>
        <a href="<?php echo url('Position/show'); ?>" class="btn btn-default nomarginLeft">撤销</a>
        <?php endif; ?>
        <button type="submit" class="btn btn-default nomarginLeft">查询</button>
    </form>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>推荐位名称</th>
            <th>操作</th>
        </tr>
        <?php if(!empty($data)): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $value['posid']; ?></td>
            <td><?php echo $value['posname']; ?></td>
            <td><a class="btn btn-success marginRight" href="<?php echo url('Position/showPosition'); ?>?posid=<?php echo $value['posid']; ?>">查看</a><a class="btn btn-danger" href="<?php echo url('Position/delete'); ?>?posid=<?php echo $value['posid']; ?>">删除</a></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr>
                <td colspan="3">暂无数据~~~~</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>