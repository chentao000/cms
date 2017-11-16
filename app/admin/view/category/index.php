<extend file='resource/admin/view/master'/>
<block name="content">
    <parent name="header" title="这是标题">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="{{u('index')}}">栏目列表</a></li>
            <li class=""><a href="{{u('add')}}">栏目添加</a></li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>栏目列表</legend>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>栏目编号</th>
                        <th>栏目名称</th>
                        <th>栏目排序</th>
                        <th>是否为封面栏目</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from='$cateDate' value='$v'>
                        <tr>
                            <td>{{$v['cate_id']}}</td>
                            <td>{{$v['_cate_name']}}</td>
                            <td>{{$v['cate_sort']}}</td>
                            <td>
                                <if value="$v['cate_ishome']==1">
                                    <i class="fa fa-check-circle fa-2x" style="color: greenyellow"></i>
                                    <else/>
                                    <i class="fa fa-times fa-2x" style="color: red"></i>
                                </if>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{u('add',['cate_id'=>$v['cate_id']])}}" type="button"
                                       class="btn btn-primary" style="margin-right: 10px">编辑</a>
                                    <button type="button" class="btn btn-danger" onclick="del({{$v['cate_id']}})">删除
                                    </button>
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
                function del(cate_id) {
                    require(['hdjs'], function (hdjs) {
                        hdjs.confirm('确定删除吗?', function () {
                            location.href = "{{u('del')}}" + "&cate_id=" + cate_id;
                        })
                    })
                }
            </script>
</block>
