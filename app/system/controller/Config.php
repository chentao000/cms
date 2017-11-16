<?php namespace app\system\controller;
use system\model\Config as ConfigModel;

class Config extends Common {

    /**
     * 系统配置项
     * @return array|mixed
     */
    public function index(){
        //获取配置项信息
        //如果能获取到数据就执行修改
        //如果不能获取数据就进行实例化执行添加
        $model=ConfigModel::find(1)?:new ConfigModel();

        if (Request::isMethod('post')){
            //点击了确认按钮
            //将获取到post数据转化为json存入到$data['system_config']
            $data['system_config'] = json_encode(Request::post(),JSON_UNESCAPED_UNICODE);
            //执行添加或修改
            $model->save($data);
            return $this->setRedirect(u('system.config.index'))->success('操作成功');
        }
        //获取$model['system_config']数据
        //转化为数组
        $model = json_decode($model['system_config'],true);
        return view('',compact('model'));
    }
}
