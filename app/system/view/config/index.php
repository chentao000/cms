<extend file='resource/admin/view/system'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('index')}}" >配置项列表</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">系统配置管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">网站名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="webname" value="{{$model['webname']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">网站描述</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" value="{{$model['description']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">站长邮箱</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{$model['email']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">客服电话</label>
                    <div class="col-sm-10">
                        <input type="text" name="tel" value="{{$model['tel']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">icp备案号</label>
                    <div class="col-sm-10">
                        <input type="text" name="icp" value="{{$model['icp']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">文章相关配置项</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">每页条数</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_num" value="{{$model['art_num']}}" class="form-control" id="" placeholder="">
                    </div>
                </div>
            </div>

        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>

</block>

