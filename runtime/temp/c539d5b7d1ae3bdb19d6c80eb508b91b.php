<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\tp5\public/../application/admin\view\index\layout.html";i:1514280664;}*/ ?>
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
    <style>
        html,body{
            width:100%;
            height:100%;
            overflow: hidden;
        }
        .personal a span {
            width:10px;
            height:10px;
            display: inline-block;
            margin: auto 3px;
        }
        .personal a span.on{
            display: none;
        }
        .personal a span:nth-of-type(1){
            background: #f1e6c8;
        }
        .personal a span:nth-of-type(2){
            background: #fdfbee;
        }
        .personal a span:nth-of-type(3){
            background: #5c4d92;
        }
        .personal a span:nth-of-type(4){
            background: #d4d6ae;
        }
    </style>
</head>
<body>
<div class="top">
    <h4>xx后台管理系统</h4>
    <div class="personal">
        <a href="javascript:void(0);"><?php echo $username; ?></a>
        <a href="<?php echo url('login/logout'); ?>">退出登录</a>
        <a href="javascript:void(0);">
            <span class="on "></span>
            <span class=""></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <ul class="parent_menu">
        <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <li act="<?php echo $value['act']; ?>" <?php if($value["act"] == "user"): ?> class="on" <?php endif; ?>>
        <a href="javascript:void(0);"><?php echo $value['name']; ?></a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="bottom">
    <div class="left">
        <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
        <ul <?php if($value["act"] == "user"): ?> class="son_menu active" <?php else: ?> class="son_menu"<?php endif; ?> act="<?php echo $value['act']; ?>">
        <?php if(is_array($value["children"]) || $value["children"] instanceof \think\Collection || $value["children"] instanceof \think\Paginator): $i = 0; $__LIST__ = $value["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <li act="<?php echo $v['act']; ?>" op="<?php echo $v['op']; ?>"><a href="javascript:void(0);"><?php echo $v['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="right">
        <iframe id="iframe" src="<?php echo url('index/welcome'); ?>" frameborder="0"></iframe>
    </div>
</div>
</body>
<script type="text/javascript" src="/tp5/public/static/js/jquery.js"></script>
<script>
    $(function(){
        $(".parent_menu").on("click","li",function(){
            $(".parent_menu li").removeClass("on");
            $(this).addClass("on");
            $(".son_menu").hide().eq($(this).index()).show();
        })
        $(".son_menu").on("click","li",function(){
            var act = $(this).attr("act");
            var op = $(this).attr("op");
            var url = "<?php echo url('"+act+"/"+op+"'); ?>";
            $(".son_menu li").removeClass("on");
            $(this).addClass("on");
            $("#iframe").attr("src",url);
        })
        $(".personal a").on("click","span",function(){
            $(".personal a span").removeClass("on");
            $(this).addClass("on");
            var index=$(this).index()+1;
            var backgroundImg=$(".top").css("background-image").replace(/[0-9]+\.jpg/,index+".jpg");
            var backgroundImg1=$(".left").css("background-image").replace(/[0-9]+\.jpg/,index+".jpg");
            $(".top").css({"background-image":backgroundImg})
            $(".left").css({"background-image":backgroundImg1})
        })
    })
</script>
</html>