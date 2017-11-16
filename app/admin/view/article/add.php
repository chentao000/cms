
<extend file='resource/admin/view/master'/>
<block name="content">
    <!--TAB NAVIGATION-->
    <ul class="nav nav-tabs" role="tablist">
        <li class=""><a href="{{u('index')}}" >文章列表</a></li>
        <if value="Request::get('art_id')">
            <li class="active"><a href="" >文章编辑</a></li>
            <else/>
            <li class="active"><a href="{{u('add')}}" >文章添加</a></li>
        </if>

    </ul>
    <form action="" method="POST" onsubmit="post(event)" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>
                    <if value="Request::get('art_id')">
                        文章编辑
                        <else/>
                        文章添加
                    </if>
                </legend>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章标题</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_title" class="form-control" value="{{$model['art_title']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章作者</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_author" class="form-control" value="{{$model['art_author']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章排序</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_sort" class="form-control" value="{{$model['art_sort']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章点击次数</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_click" class="form-control" value="{{$model['art_click']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属栏目</label>
                    <div class="col-sm-10">
                        <select name="art_cate_id" id="inputID" class="form-control">
                            <option value="0"> -- 选择栏目 -- </option>
                            <foreach from="$cateDate" value="$v" >
                                <option  <if value="$model['art_cate_id']==$v['cate_id']">selected</if>  value="{{$v['cate_id']}}" >{{$v['_cate_name']}}</option>
                            </foreach>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章描述</label>
                    <div class="col-sm-10">
                        <textarea name="art_description" id="" cols="122" rows="5">{{$model['art_description']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否推荐</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label style="margin-right: 20px">
                                <input type="radio" name="art_iscommend" id="inputID" value="0"  <if value="$model['art_iscommend']==0">checked</if>>
                                否
                            </label>
                            <label>
                                <input type="radio" name="art_iscommend" id="inputID" value="1" <if value="$model['art_iscommend']==1">checked</if>>
                                是
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否热门</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label style="margin-right: 20px">
                                <input type="radio" name="art_ishot" id="inputID" value="0"  <if value="$model['art_ishot']==0">checked</if>>
                                否
                            </label>
                            <label>
                                <input type="radio" name="art_ishot" id="inputID" value="1" <if value="$model['art_ishot']==1">checked</if>>
                                是
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">微信关键词</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_keyword" class="form-control" value="{{$model['art_keyword']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原文链接</label>
                    <div class="col-sm-10">
                        <input type="text" name="art_url" class="form-control" value="{{$model['art_url']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章封面</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control" name="art_thumb" readonly="" value="{{$model['art_thumb']}}">
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
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章内容</label>
                    <div class="col-sm-10">
                        <textarea id="container"  name="art_content" style="height:300px;width:100%;">{{$model['art_content']}}</textarea>
                        <script>
                            require(['hdjs'], function (hdjs) {
                                var ueditor =  hdjs.ueditor('container', {hash: 2, data: 'hd'}, function (editor) {
                                    console.log(3)
                                });
                            })
                        </script>
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
                    $("[name='art_thumb']").val(images[0]);
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

