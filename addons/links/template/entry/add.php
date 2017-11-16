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
        <li ><a href="{{url('links.entry.index')}}" >友链列表</a></li>
        <li class="active"><a href="{{url('links.entry.add')}}" >友链添加</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">友链列表</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">友链名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="links_name" value="{{$model['links_name']}}" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">友链连接</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="links_url" value="{{$model['links_url']}}" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="links_sort" value="{{$model['links_sort']}}" id="" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">提交</button>
    </form>


</block>
