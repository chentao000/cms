<?php namespace app\wechat\controller;

use app\admin\controller\Common;
use houdunwang\request\Request;
use system\model\Config;

class Entry extends Common {

    public function __construct()
    {
        $this->auth();
    }

    /**
     *微信配置项
     * @return array|mixed
     */
    public function index(){

        $model = Config::find(1)?: new Config();

        if (Request::isMethod('post')){//点击提交按钮
            //dd(Request::post());
            //向config表中的wechat_config字段添加json数据
            $data['wechat_config'] = json_encode(Request::post(),JSON_UNESCAPED_UNICODE);
            $model->save($data);

            return $this->setRedirect(u('index'))->success('操作成功');
        }

        $model = json_decode($model['wechat_config'],true);
        return view('',compact('model'));
    }

}
