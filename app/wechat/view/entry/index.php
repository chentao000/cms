<extend file='resource/admin/view/wechat'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('index')}}" >配置项列表</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">账户信息</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">公众号名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="wechat_name" value="{{$model['wechat_name']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">token</label>
                    <div class="col-sm-10">
                        <input type="text" name="token" value="{{$model['token']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">appid</label>
                    <div class="col-sm-10">
                        <input type="text" name="appid" value="{{$model['appid']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">appsecret</label>
                    <div class="col-sm-10">
                        <input type="text" name="appsecret" value="{{$model['appsecret']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
            </div>

        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>

</block>

