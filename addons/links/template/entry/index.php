<extend file='resource/admin/view/module'/>
<block name="module">
    <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
         aria-expanded="false" aria-controls="collapseExample"
         style="border-top: 1px solid #ddd;border-radius: 0%">
        <h4 class="panel-title">友情连接</h4>
        <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <i class="fa fa-chevron-circle-down"></i>
        </a>
    </div>
    <ul class="list-group menus collapse in" id="collapseExample">
        <a href="{{url('links.entry.index')}}" class="list-group-item">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <span class="pull-right" href=""></span>
            友链列表
        </a>
        <a href="{{url('links.entry.add')}}" class="list-group-item">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <span class="pull-right" href=""></span>
            友链添加
        </a>
    </ul>
</block>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{url('links.entry.index')}}" >友链列表</a></li>
        <li><a href="{{url('links.entry.add')}}" >友链添加</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">友链列表</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>友链编号</th>
                    <th>友链名称</th>
                    <th>链接</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <foreach from="$links" value="$v">
                    <tr>
                        <td>{{$v['links_id']}}</td>
                        <td>{{$v['links_name']}}</td>
                        <td>{{$v['links_url']}}</td>
                        <td>{{$v['links_sort']}}</td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <a href="{{url('links.entry.add',['links_id'=>$v['links_id']])}}" class="btn btn-primary">编辑</a>
                                <button type="button" onclick="del({{$v['links_id']}})" class="btn btn-danger">删除</button>
                            </div></td>
                    </tr>
                </foreach>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{$links->links()}}
    </div>
    <script>
        function del(links_id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    location.href = "{{url('links.entry.del')}}"+'&links_id='+links_id;
                })
            })
        }
    </script>
</block>
