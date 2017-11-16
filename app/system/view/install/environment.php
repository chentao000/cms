<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HDCMS 环境检测</title>
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
                         aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">安装步骤</li>
                    <li class="list-group-item">
                        <i class="fa fa-copyright"></i>
                        安装协议
                    </li>
                    <li class="list-group-item" style="background: #dff0d8">
                        <i class="fa fa-pencil-square-o"></i>
                        环境检测
                    </li>
                    <li class="list-group-item">
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">系统环境</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>参数</th>
                                <th>值</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>php版本</td>
                                <td>{{$data['php_version']}}</td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>操作系统</td>
                                <td>{{$data['php_os']}}</td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>服务器环境</td>
                                <td>{{$data['server_software']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">HDCMS 系统环境要求</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>参数</th>
                                <th>说明</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>php版本</td>
                                <td>系统要求php版本高于5.6</td>
                                <td>
                                    <?php $res = version_compare($data['php_version'], '5.6', '>'); ?>
                                    <if value="$res">
                                        <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                        <else/>
                                        <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                    </if>
                                </td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>GD</td>
                                <td>用来处理图像</td>
                                <td>
                                    <if value="$data['gd']">
                                        <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                        <else/>
                                        <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                    </if>
                                </td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>CURL</td>
                                <td>微信等远程接口将需要CURL模块</td>
                                <td>
                                    <if value="$data['curl']">
                                        <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                        <else/>
                                        <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                    </if>
                                </td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>PDO</td>
                                <td>连接数据库</td>
                                <td>
                                    <if value="$data['pdo']">
                                        <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                        <else/>
                                        <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                    </if>
                                </td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>openssl</td>
                                <td>需要支持</td>
                                <td>
                                    <if value="$data['openssl']">
                                        <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                        <else/>
                                        <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                    </if>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel panel-default">
                	  <div class="panel-heading">
                			<h3 class="panel-title">目录权限检测</h3>
                	  </div>
                	  <div class="panel-body">
                			<table class="table table-hover">
                				<thead>
                					<tr>
                						<th>目录</th>
                						<th>状态</th>
                					</tr>
                				</thead>
                				<tbody>
                					<tr>
                						<td>./</td>
                						<td>
                                            <if value="$data['is_writable']">
                                                <i class="fa fa-check-circle-o alert-info" style="font-size: 20px;"></i>
                                                <else/>
                                                <i class="fa fa-times alert-danger hd-error" style="font-size: 20px;"></i>
                                            </if>
                                        </td>
                					</tr>
                				</tbody>
                			</table>
                	  </div>
                </div>
                <a href="{{u('system.install.copyright')}}" class="btn btn-info">上一步</a>
                <a href="javascript:;" onclick="next()" class="btn btn-primary">下一步</a>
            </div>
        </div>
    </div>
</div>
<script>
    function next() {
        var len = $('.hd-error').length;
        if(len>0){
            alert('环境不符合要求');return false;
        }else{
            location.href = "{{u('system.install.database')}}"
        }
    }
</script>
</body>
</html>