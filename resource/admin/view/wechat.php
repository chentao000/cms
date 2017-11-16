<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>博客后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="{{__ROOT__}}/resource/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/admin/css/site.css" rel="stylesheet">
    <link href="{{__ROOT__}}/resource/admin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>
        window.hdjs={};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = "{{u('component.upload.uploader')}}";
        //获取文件列表的后台地址
        window.hdjs.filesLists = "{{u('component.upload.filesLists')}}";
    </script>
    <script src="./node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="./node_modules/hdjs/static/requirejs/config.js"></script>
    <script> require(['hdjs']);</script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i{
            color: #337ab7;
        }
    </style>
</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="{{u('admin.entry.index')}}" style="color: white;margin-left: -14px">个人博客后台系统</a>
                </h4>
                <div class="navbar-header">

                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="/" target="_blank"></i>前台首页</a>
                        </li>
                        <li >
                            <a href="{{u('admin.category.index')}}"  ><i class="fa fa-w fa-cubes"></i>文章系统</a>
                        </li>
                        <li class="active">
                            <a href="{{u('wechat.entry.index')}}" ><i class="fa fa-w fa-comments-o"></i> 微信功能</a>
                        </li>
                        <li>
                            <a href="{{u('system.config.index')}}" ><i class="fa fa-wrench"></i> 系统配置</a>
                        </li>
                        <li>
                            <a href="{{u('system.module.index')}}" ><i class="'fa-w fa fa-arrows"></i> 模块管理</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i class="fa fa-w fa-font"></i> 字体库</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            {{Session::get('admin.admin_username');}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{u('admin.entry.changePass')}}">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{u('admin.entry.out')}}">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus">
                <!--配置管理 start-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
                     aria-expanded="false" aria-controls="collapseExample"
                     style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">微信配置</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="{{u('wechat.entry.index')}}" class="list-group-item">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        设置微信配置
                    </a>
                </ul>
                <!--配置管理 end-->
                <!--微信消息管理 start-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2"
                     aria-expanded="false" aria-controls="collapseExample2"
                     style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">微信消息管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="{{u('wechat.system.index')}}" class="list-group-item">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        系统消息
                    </a>
                    <a href="{{url('base.wx.index')}}" class="list-group-item">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        消息回复
                    </a>
                </ul>
                <!--消息管理 end-->
            </div>
        </div>
        <!--右侧主体区域部分 start-->
        <div class="col-xs-12 col-sm-9 col-lg-10">
            <blade name="content"/>
        </div>
    </div>
    <!--右侧主体区域部分结束 end-->
</div>
</div>
<div class="master-footer" style="margin-top: 150px">
    <a href="http://www.baidu.com">{{v('system_config.webname')}}<br>{{v('system_config.description')}}</a>
    <br>
    Powered by {{v('system_config.email')}} v2.0 © 2017 http://www.chentao.xin {{v('system_config.tel')}} {{v('system_config.icp')}}
</div>
</body>
</html>
