<extend file='resource/admin/view/module'/>
<block name="content">
    <!--TAB NAVIGATION-->
    <ul class="nav nav-tabs" role="tablist">
        <li class=""><a href="{{u('index')}}">模块列表</a></li>
        <li class="active"><a href="">设计模块</a></li>
    </ul>
    <form action="" method="POST" onsubmit="post(event)" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>设计模块</legend>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块标识</label>
                    <div class="col-sm-10">
                        <input type="text" name="module_name" class="form-control" placeholder="请输入模块的英文名称" value="{{$model['art_title']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块的中文名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="module_title" placeholder="请输入模块的中文名称" class="form-control" value="{{$model['art_author']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块描述</label>
                    <div class="col-sm-10">
                        <input type="text" name="module_description" placeholder="请输入模块的描述" class="form-control" value="{{$model['art_sort']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">模块图片描述</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" name="module_preview" readonly="" value="{{$model['art_thumb']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{pic($model['art_thumb'],'/node_modules/hdjs/dist/static/image/nopic.jpg')}}"
                                 class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">提交</button>
    </form>
    <script>
        //上传图片
        function upImage() {
            require(['hdjs'], function (hdjs) {
                options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='module_preview']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }

        //移除图片
        function removeImg(obj) {
            $(obj).prev('img').attr('src', '/node_modules/hdjs/dist/static/image/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }
    </script>
    <script>
        function post(event) {
            event.preventDefault();
            require(['hdjs'], function (hdjs) {
                hdjs.submit({
                    successUrl: "{{u('index')}}",
                });
            })
        }

    </script>
</block>

