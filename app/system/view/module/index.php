<extend file='resource/admin/view/module'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('index')}}" >模块列表</a></li>
        <li ><a href="{{u('design')}}" >设计模块</a></li>
    </ul>

    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">模块列表</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>模块标识</th>
                        <th>模块预览图</th>
                        <th>模块中文名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <foreach from="$data" value="$v">
                        <tr>
                            <td>{{$v['module_name']}}</td>
                            <td><img src="{{$v['module_preview']}}" style="width: 60px" alt=""></td>
                            <td>{{$v['module_title']}}</td>
                            <td>
                                <div class="btn-group btn-group-s">
                                    <if value="$v['isInstalled']">
                                        <a href="javascript:;" onclick="uninstall('{{$v['module_name']}}')" class="btn btn-danger">卸载</a>
                                        <else/>
                                        <a href="{{u('install',['module_name'=>$v['module_name']])}}" class="btn btn-primary">安装</a>
                                    </if>
                                </div>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script>
        function uninstall(module_name) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定卸载吗?', function () {
                    location.href = "{{u('uninstall')}}"+'&module_name='+module_name;
                })
            })
        }
    </script>
</block>
