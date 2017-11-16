<extend file='resource/admin/view/system'/>
<block name="content">
    <parent name="header" title="这是标题">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="{{u('index')}}">备份列表</a></li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>备份列表</legend>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>备份目录</th>
                        <th>备份时间</th>
                        <th>备份大小</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from="$dirs" key="$k" value="$v">
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$v['path']}}</td>
                            <td>{{date('Y/m/d H:i:s',$v['filemtime'])}}</td>
                            <td>{{Tool::getSize($v['size'],2)}}</td>
                            <td>
                                <div class="btn-group btn-group-s">
                                    <a href="javascript:;" style="margin-right: 10px;" onclick=" recovery('{{$v["path"]}}')"
                                    class="btn btn-primary">还原</a>
                                    <a href="javascript:;" onclick="del('{{$v["path"]}}')" class="btn
                                    btn-danger">删除</a>
                                </div>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
        </div>
        <parent name="footer">
            <script>
                function del(path) {
                    require(['hdjs'], function (hdjs) {
                        hdjs.confirm('确定删除吗?', function () {
                            location.href = "{{u('del')}}" + "&path=" + path;
                        })
                    })
                }
            </script>
            <script>
                function recovery(path) {
                    require(['hdjs'], function (hdjs) {
                        hdjs.confirm('确定还原吗?', function () {
                            location.href = "{{u('recovery')}}" + "&dir=" + path;
                        })
                    })
                }
            </script>
</block>
