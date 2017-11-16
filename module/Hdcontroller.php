<?php

namespace module;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Module;

/**
 * 模块公用的控制器
 * Class Hdcontroller
 * @package module
 */
class Hdcontroller extends Controller
{

    use Wechat;

    /**
     * 公用的控制器
     * 用于控制加载关键词页面
     * @param string $tpl
     * @param array $args
     * @return mixed
     */
    public function template($tpl='',$args=[])
    {
        //分割get参数
        $info = explode('/',Request::get('action'));
        $module_is_system = Module::where('module_name',$info[0])->pluck('module_is_system');
        $tpl = $tpl ?$tpl:$info[2];
        //组合控制器类
        $template = ($module_is_system==1?'module':'addons')."/{$info[0]}/template/".strtolower($info[1])."/{$tpl}.php";
        //p($template);die;
        return view($template,$args);
    }
}