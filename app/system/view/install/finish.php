<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HDCMS 安装完成</title>
    <script src="{{__ROOT__}}/resource/admin/js/jquery.min.js"></script>
    <link rel="stylesheet" href="{{__ROOT__}}/resource/admin/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{__ROOT__}}/resource/admin/font-awesome-4.7.0/css/font-awesome.min.css">
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
                         aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%
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
                    <li class="list-group-item" >
                        <i class="fa fa-database"></i>
                        数据库配置
                    </li>
                    <li class="list-group-item" style="background: #dff0d8">
                        <i class="fa fa-check-circle"></i>
                        安装完成
                    </li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="alert alert-danger text-center">
                    <h1><i class="fa fa-flag"></i> 恭喜！系统已经安装完成</h1>
                </div>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title">登录信息</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="admin" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="admin888" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <a href="{{u('admin.login.index')}}" style="width: 100%"  class="btn btn-primary">登录后台</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>