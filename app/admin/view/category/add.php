
<extend file='resource/admin/view/master'/>
<block name="content">
    <!--TAB NAVIGATION-->
    <ul class="nav nav-tabs" role="tablist">
        <li class=""><a href="{{u('index')}}" >栏目列表</a></li>
        <if value="Request::get('cate_id')">
            <li class="active"><a href="" >栏目编辑</a></li>
            <else/>
            <li class="active"><a href="{{u('add')}}" >栏目添加</a></li>
        </if>

    </ul>
    <form action="" method="POST" onsubmit="post(event)" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>
                    <if value="Request::get('cate_id')">
                        栏目编辑
                        <else/>
                        栏目添加
                    </if>
                </legend>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">栏目名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="cate_name" class="form-control" value="{{$model['cate_name']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">栏目排序</label>
                    <div class="col-sm-10">
                        <input type="text" name="cate_sort" class="form-control" value="{{$model['cate_sort']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属栏目</label>
                    <div class="col-sm-10">
                        <select name="cate_pid" id="inputID" class="form-control">
                            <option value="0"> -- 顶级栏目 -- </option>

                            <foreach from="$cateDate" value="$v" >
                                <option  <if value="$model['cate_pid']==$v['cate_id']">selected</if>  value="{{$v['cate_id']}}" >{{$v['_cate_name']}}</option>
                            </foreach>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">栏目描述</label>
                    <div class="col-sm-10">
                        <textarea name="cate_description"  rows="5" class="form-control">{{$model['cate_description']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否为封面栏目</label>
                    <div class="col-sm-10">
                        <div class="radio">
                        	<label style="margin-right: 20px">
                        		<input type="radio" name="cate_ishome" id="inputID" value="0"  <if value="$model['cate_ishome']==0">checked</if>>
                        		否
                        	</label>
                            <label>
                                <input type="radio" name="cate_ishome" id="inputID" value="1" <if value="$model['cate_ishome']==1">checked</if>>
                                是
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">栏目图片</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" name="cate_thumb" readonly="" value="{{$model['cate_thumb']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{pic($model['cate_thumb'],'/node_modules/hdjs/dist/static/image/nopic.jpg')}}"
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
                    $("[name='cate_thumb']").val(images[0]);
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

