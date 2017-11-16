<extend file='resource/admin/view/master'/>
<block name="content">
    <parent name="header" title="这是标题">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">欢迎页面</a></li>
        </ul>
        <div class="alert alert-info">
            欢迎使用XX后台管理系统，这里可以项目介绍...
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <legend>介绍</legend>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>事件</th>
                        <th>描述</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>项目负责人</td>
                        <td>陈涛</td>
                    </tr>
                    <tr>
                        <td>使用框架</td>
                        <td>hdphp 3.0</td>
                    </tr>
                    <tr>
                        <td>服务器环境</td>
                        <td>apache</td>
                    </tr>
                    <tr>
                        <td>联系邮箱</td>
                        <td>15690057962@163.com</td>
                    </tr>
                    <tr>
                        <td>qq</td>
                        <td>970692963</td>
                    </tr>
                    <tr>
                        <td>开发周期</td>
                        <td>30天</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <parent name="footer">
</block>
