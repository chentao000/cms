<?php namespace app\wechat\controller;

use app\admin\controller\Common;
use houdunwang\request\Request;
use system\model\Config;

class System extends Common {

    /**
     * 微信默认回复消息
     * @return array|mixed
     */
    public function index(){
        //此处书写代码...
        $model = Config::find(1)?:new Config();

        if (Request::isMethod('post')){
            //点击保存按钮
            //向wechat_response字段中添加数据
            $data['wechat_response']= json_encode(Request::post(),JSON_UNESCAPED_UNICODE);
            $model->save($data);

            return $this->setRedirect(u('index'))->success('操作成功');
        }
        $model=json_decode($model['wechat_response'],true);
        return view('',compact('model'));
    }
}
