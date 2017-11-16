
<extend file='resource/admin/view/master'/>
<block name="content">
    <!--TAB NAVIGATION-->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#tab1" role="tab" data-toggle="tab">修改密码</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>密码修改</legend>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input type="text" disabled class="form-control" value="{{Session::get('admin.admin_username')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原始密码</label>
                    <div class="col-sm-10">
                        <input type="text" name="admin_password" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="text" name="new_password" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="text" name="confirm_password" class="form-control" id="" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">提交</button>
    </form>
</block>

