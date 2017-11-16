<extend file='resource/admin/view/wechat'/>
<block name="content">
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li ><a href="{{url('base.wx.index')}}" >消息回复</a></li>
        <li class="active">
            <if value="Request::get('id')">
                <a href="" >编辑回复</a>
                <else/>
                <a href="" >添加回复</a>
            </if>
        </li>
    </ul>
    <form action="" onsubmit="post(event)" method="POST" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <if value="Request::get('id')">
                        编辑回复
                        <else/>
                        添加回复
                    </if>
                </h3>
            </div>
            <div class="panel-body">
                <include file="resource/view/keyword.php"/>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">回复内容</label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control"  rows="5">{{$baseContentModel['content']}}</textarea>
                    </div>
                </div>

            </div>

        </div>
        <button class="btn btn-primary">保存数据</button>
    </form>
    <script>
        function post(event) {
            event.preventDefault();
            require(['hdjs'], function (hdjs) {
                hdjs.submit({
                    successUrl: "{{url('base.wx.index')}}",
                });
            })
        }
    </script>
</block>

