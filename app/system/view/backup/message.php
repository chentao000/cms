<extend file='resource/admin/view/system'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="{{u('index')}}" >备份管理</a></li>
    </ul>
    <form action="" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">数据备份</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    {{$message}}
                </div>
            </div>

        </div>
    </form>
    <script>
        setTimeout(function() {
            location.href = "{{$_SERVER['REQUEST_URI']}}"
        },100);
    </script>
</block>

