<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HDCMS 数据库配置</title>
    <script src="{{__ROOT__}}/resource/admin/js/jquery.min.js"></script>
    <link rel="stylesheet" href="{{__ROOT__}}/resource/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{__ROOT__}}/resource/admin/font-awesome-4.7.0/css/font-awesome.min.css">
    <script>
        window.hdjs={};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = "{{u('component.Upload.uploader')}}";
        //获取文件列表的后台地址
        window.hdjs.filesLists = "{{u('component.Upload.filesLists')}}";
    </script>
    <script src="/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="/node_modules/hdjs/static/requirejs/config.js"></script>
    <script>require(['hdjs']);</script>
</head>
<body style="background: #33b2e2">
<div style="width:1100px;margin: 10px auto;">
    <div style="background: url(http://dev.hdcms.com/resource/images/logo.png) no-repeat;background-size:contain;height:80px;"></div>
    <br>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">HDCMS 百分百开源免费,可用于任意商业项目! 使用高效的HDPHP框架构建
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                         aria-valuemin="0" aria-valuemax="100" style="width: 70%">70%
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">安装步骤</li>
                    <li class="list-group-item" >
                        <i class="fa fa-copyright"></i>
                        安装协议
                    </li>
                    <li class="list-group-item" >
                        <i class="fa fa-pencil-square-o"></i>
                        环境检测
                    </li>
                    <li class="list-group-item" style="background: #dff0d8">
                        <i class="fa fa-database"></i>
                        数据库配置
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-check-circle"></i>
                        安装完成
                    </li>
                </ul>
            </div>
            <div class="col-sm-9">
                <form action="" method="POST" class="form-horizontal" role="form" onsubmit="post(event)">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">系统环境</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">主机地址</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="host" value="127.0.0.1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">数据库</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="database" value="ceshi_chentao_x">
                                    <span class="help-block">请确保数据库已经存在，否则无法安装</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user" value="ceshi_chentao_x">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="password" value="HmS8CK23fN">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{u('system.install.environment')}}" class="btn btn-info">上一步</a>
                    <button  class="btn btn-primary">下一步</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function post(event) {
        event.preventDefault();
        require(['hdjs'], function (hdjs) {
            hdjs.submit({
                //操作成功时返回地址，不填写时回调上一页，可以使用refresh（默认),back,留空不操作等
                successUrl: "{{u('system.install.tables')}}",
            });
        })
    }
</script>
</body>
</html>