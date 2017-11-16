<extend file='resource/admin/view/wechat'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('index')}}" >系统消息</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">系统消息</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">关注消息</label>
                    <div class="col-sm-10">
                        <input type="text" name="welcome" value="{{$model['welcome']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">默认消息</label>
                    <div class="col-sm-10">
                        <input type="text" name="default" value="{{$model['default']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
            </div>

        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>

</block>

