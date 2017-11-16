<extend file='resource/admin/view/wechat'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{url('base.wx.index')}}">消息回复</a></li>
        <li><a href="{{url('base.wx.add')}}">添加回复</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">消息回复</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>关键词</th>
                    <th>回复内容</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <foreach from="$field" value="$v">
                    <tr>

                        <td>{{$v['id']}}</td>
                        <td>{{$v->keywords->keyword}}</td>
                        <td>{{$v['content']}}</td>
                        <td>
                            <div class="btn-group btn-group-s">
                                <a href="{{url('base.wx.add',['id'=>$v['id']])}}" class="btn btn-primary" style="margin-right: 10px;">编辑</a>
                                <a href="javascript:;" onclick="del({{$v['id']}})" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                </foreach>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function del(id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    location.href = "{{url('base.wx.del')}}" + '&id=' + id;
                })
            })
        }

    </script>
</block>

