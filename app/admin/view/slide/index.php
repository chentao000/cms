<extend file='resource/admin/view/master'/>
<block name="content">
    <parent name="header" title="这是标题">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="{{u('index')}}">轮播图列表</a></li>
            <li class=""><a href="{{u('add')}}">轮播图添加</a></li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>轮播图列表</legend>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>轮播图编号</th>
                        <th>轮播图名称</th>
                        <th>轮播图排序</th>
                        <th>链接地址</th>
                        <th>缩略图</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from='$slideDate' value='$v'>
                        <tr>
                            <td>{{$v['slide_id']}}</td>
                            <td>{{$v['slide_title']}}</td>
                            <td>{{$v['slide_sort']}}</td>
                            <td>
                                <a href="{{$v['slide_linkurl']}}">{{$v['slide_linkurl']}}</a>
                            </td>
                            <td><img style="width: 50px;height: 50px;" src="{{$v['slide_thumb']}}" alt=""></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{u('add',['slide_id'=>$v['slide_id']])}}" type="button"
                                       class="btn btn-primary" style="margin-right: 10px">编辑</a>
                                    <button type="button" class="btn btn-danger" onclick="del({{$v['slide_id']}})">删除
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="page">
            {{$slideDate->links()}}
        </div>
        <parent name="footer">
            <script>
                function del(slide_id) {
                    require(['hdjs'], function (hdjs) {
                        hdjs.confirm('确定删除吗?', function () {
                            location.href = "{{u('del')}}" + "&slide_id=" + slide_id;
                        })
                    })
                }
            </script>
</block>
