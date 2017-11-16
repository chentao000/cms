<extend file='resource/admin/view/master'/>
<block name="content">
    <parent name="header" title="这是标题">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="{{u('index')}}">文章列表</a></li>
            <li class=""><a href="{{u('add')}}">文章添加</a></li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>文章列表</legend>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>文章编号</th>
                        <th>文章标题</th>
                        <th>文章作者</th>
                        <th>文章排序</th>
                        <th>缩略图</th>
                        <th>点击次数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from='$arcDate' value='$v'>
                        <tr>
                            <td>{{$v['art_id']}}</td>
                            <td>{{$v['art_title']}}</td>
                            <td>{{$v['art_author']}}</td>
                            <td>{{$v['art_sort']}}</td>
                            <td>
                                <img style="width: 50px;height: 50px;" src="{{$v['art_thumb']}}" alt="">
                            </td>
                            <td>{{$v['art_click']}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{u('add',['art_id'=>$v['art_id']])}}" type="button"
                                       class="btn btn-primary" style="margin-right: 10px">编辑</a>
                                    <button type="button" class="btn btn-danger" onclick="del({{$v['art_id']}})">删除
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
            {{$arcDate->links()}}
        </div>
        <parent name="footer">
            <script>
                function del(art_id) {
                    require(['hdjs'], function (hdjs) {
                        hdjs.confirm('确定删除吗?', function () {
                            location.href = "{{u('del')}}" + "&art_id=" + art_id;
                        })
                    })
                }
            </script>
</block>
