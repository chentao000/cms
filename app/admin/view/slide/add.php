
<extend file='resource/admin/view/master'/>
<block name="content">
    <!--TAB NAVIGATION-->
    <ul class="nav nav-tabs" role="tablist">
        <li class=""><a href="{{u('index')}}" >轮播图列表</a></li>
        <if value="Request::get('slide_id')">
            <li class="active"><a href="" >轮播图编辑</a></li>
            <else/>
            <li class="active"><a href="{{u('add')}}" >轮播图添加</a></li>
        </if>

    </ul>
    <form action="" method="POST" onsubmit="post(event)" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>
                    <if value="Request::get('slide_id')">
                        轮播图编辑
                        <else/>
                        轮播图添加
                    </if>
                </legend>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">轮播图名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="slide_title" class="form-control" value="{{$model['slide_title']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">轮播图内容</label>
                    <div class="col-sm-10">
                        <textarea name="slide_content" class="form-control"  rows="5">{{$model['slide_content']}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">轮播图排序</label>
                    <div class="col-sm-10">
                        <input type="text" name="slide_sort" class="form-control" value="{{$model['slide_sort']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">链接地址</label>
                    <div class="col-sm-10">
                        <input type="text" name="slide_linkurl" class="form-control" value="{{$model['slide_linkurl']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">上传轮播图 </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" name="slide_thumb" readonly="" value="{{$model['slide_thumb']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{pic($model['slide_thumb'],'/node_modules/hdjs/dist/static/image/nopic.jpg')}}"
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
                    $("[name='slide_thumb']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }
        //移除图片
        function removeImg(obj) {
            $(obj).prev('img').attr('src','/node_modules/hdjs/dist/static/image/nopic.jpg');
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

