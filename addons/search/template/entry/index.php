<extend file='resource/admin/view/module'/>
<block name="module">
    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
         aria-expanded="false" aria-controls="collapseExample"
         style="border-top: 1px solid #ddd;border-radius: 0%">
        <h4 class="panel-title">关键词管理</h4>
        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <i class="fa fa-chevron-circle-down"></i>
        </a>
    </div>
    <ul class="list-group menus collapse in" id="collapseExample">
        <a href="{{url('search.entry.index')}}" class="list-group-item">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <span class="pull-right" href=""></span>
            关键词列表
        </a>
    </ul>
</block>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{url('search.entry.index')}}" >关键词列表</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">关键词列表</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>关键词编号</th>
                    <th>关键词</th>
                    <th>次数</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <foreach from="$links" value="$v">
                    <tr>
                        <td>{{$v['search_id']}}</td>
                        <td>{{$v['search_keyword']}}</td>
                        <td>{{$v['search_click']}}</td>
                        <td>

                            <div class="btn-group btn-group-xs">
                                <button type="button" onclick="del({{$v['search_id']}})" class="btn btn-danger">删除</button>
                            </div></td>
                    </tr>
                </foreach>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{$search->links()}}
    </div>
    <script>
        function del(search_id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    location.href = "{{url('search.entry.del')}}"+'&search_id='+search_id;
                })
            })
        }
    </script>
</block>
