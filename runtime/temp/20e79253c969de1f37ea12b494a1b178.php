<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"F:\phpStudy\WWW\tplay\public/../app/admin\view\common\login.html";i:1534925251;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Xylon后台管理</title>
    <script>
        if (window != window.top) top.location.href = self.location.href;
    </script>
    <link href="/static/public/layui/css/layui.css" rel="stylesheet" />
    <link href="/static/public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/static/admin/css/login.css" rel="stylesheet" />
    <link href="/static/public/sideshow/css/normalize.css" rel="stylesheet" />
    <link href="/static/public/sideshow/css/demo.css" rel="stylesheet" />
    <link href="/static/public/sideshow/css/component.css" rel="stylesheet" />
    <!--[if IE]>
        <script src="/static/public/sideshow/js/html5.js"></script>
    <![endif]-->
    <style>
        canvas {
            position: absolute;
            z-index: -1;
        }
        
        .kit-login-box header h1 {
            line-height: normal;
        }
        
        .kit-login-box header {
            height: auto;
        }
        
        .content {
            position: relative;
        }
        
        .codrops-demos {
            position: absolute;
            bottom: 0;
            left: 40%;
            z-index: 10;
        }
        
        .codrops-demos a {
            border: 2px solid rgba(242, 242, 242, 0.41);
            color: rgba(255, 255, 255, 0.51);
        }
        
        .kit-pull-right button,
        .kit-login-main .layui-form-item input {
            background-color: transparent;
            color: white;
        }
        
        .kit-login-main .layui-form-item input::-webkit-input-placeholder {
            color: white;
        }
        
        .kit-login-main .layui-form-item input:-moz-placeholder {
            color: white;
        }
        
        .kit-login-main .layui-form-item input::-moz-placeholder {
            color: white;
        }
        
        .kit-login-main .layui-form-item input:-ms-input-placeholder {
            color: white;
        }
        
        .kit-pull-right button:hover {
            border-color: #009688;
            color: #009688
        }
    </style>
</head>


<body class="kit-login-bg">
    <div class="container demo-4">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="kit-login-box">
                    <header>
                        <h1>Xylon后台管理</h1>
                    </header>
                    <div class="kit-login-main">
                        <form class="layui-form" id="login">
                            <div class="layui-form-item">
                                <label class="kit-login-icon">
                                    <i class="layui-icon">&#xe612;</i>
                                </label>
                                <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="用户名" class="layui-input" <?php if(!(empty($usermember) || (($usermember instanceof \think\Collection || $usermember instanceof \think\Paginator ) && $usermember->isEmpty()))): ?>value="<?php echo $usermember; ?>"<?php endif; ?> style="border:1px solid rgba(0,150,136,.5);">
                            </div>
                            <div class="layui-form-item">
                                <label class="kit-login-icon">
                                    <i class="layui-icon">&#xe642;</i>
                                </label>
                                <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="密码" class="layui-input" style="border:1px solid rgba(0,150,136,.5);">
                            </div>
                            <div class="layui-form-item">
                                <label class="kit-login-icon">
                                    <i class="layui-icon">&#xe642;</i>
                                </label>
                                <input type="text" name="captcha" lay-verify="required" autocomplete="off" placeholder="验证码" class="layui-input" style="width:45%;float: left;margin-right:5px;border:1px solid rgba(0,150,136,.5);"><img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?seed='+Math.random()" height="37" id="captcha" />
                            </div>
                            <div class="layui-form-item">
                                <div class="kit-pull-left kit-login-remember">
                                    <input type="checkbox" value="1" lay-skin="primary" title="记住帐号?" name="remember" <?php if(!(empty($usermember) || (($usermember instanceof \think\Collection || $usermember instanceof \think\Paginator ) && $usermember->isEmpty()))): ?>checked=""<?php endif; ?>>
                                </div>
                                <div class="kit-pull-right">
                                    <button class="layui-btn layui-btn-primary" lay-submit lay-filter="login" style="border:1px solid rgba(0,150,136,.5);">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i> 登录
                                    </button>
                                </div>
                                <div class="kit-clear"></div>
                            </div>
                            <?php echo token('__token__', 'sha1'); ?>
                        </form>
                    </div>
                    <footer>
                        <p>Tplay © <a href="javascript:;" style="color:white; font-size:18px;" target="_blank">Xylon</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->

    <script src="/static/public/layui/layui.js"></script>
    <script src="/static/public/sideshow/js/TweenLite.min.js"></script>
    <script src="/static/public/sideshow/js/EasePack.min.js"></script>
    <script src="/static/public/sideshow/js/rAF.js"></script>
    <script src="/static/public/sideshow/js/demo-1.js"></script>
    <script src="/static/public/jquery/jquery.min.js"></script>
    <script>
        layui.use(['layer', 'form'], function() {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form;
            $(window).on('load', function() {
                form.on('submit(login)', function(data) {
                    $.ajax({
                        url:"<?php echo url('admin/common/login'); ?>",
                        data:$('#login').serialize(),
                        type:'post',
                        async: false,
                        success:function(res) {
                            layer.msg(res.msg,{offset: '100px',anim: 4});
                            if(res.code == 1) {
                                setTimeout(function() {
                                    location.href = res.url;
                                }, 1500);
                            } else {
                                $('#captcha').click();
                            }
                        }
                    })
                    return false;
                });
            });
        });
    </script>
</body>

</html>