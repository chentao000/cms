<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;
use houdunwang\request\Request;
use system\model\Config;

/**
 * 全局中间件
 * Class Boot
 * @package system\middleware
 */
class Boot implements Middleware
{
    //执行中间件
    public function run($next)
    {
        $this->Installed();
        //如果有lock.php文件才能读取系同配置项和微信数据项
        if(is_file('lock.php')) {
            //调用系统配置项
            $this->setSystemConfig();
            //调用微信配置项
            $this->setWechatConfig();
        }
        $next();
    }


    /**
     * 判断是否安装
     */
    public function Installed()
    {
        //如果没有lock.php文件就跳转到安装界面
        //正则匹配安装界面的地址栏参数防止页面死循环
        if (!is_file('lock.php') && !preg_match("#system/install#", Request::get('s'))) {
            go(u('system.install.copyright'));
            exit;
        }
    }

    /**
     * 存储系统配置项
     */
    public function setSystemConfig()
    {
        //获取配置项的第一号元素
        $model = Config::find(1);

        if ($model) {
            //说明数据库有数据
            //转化为数组
            $field = json_decode($model['system_config'], true);

        } else {
            $field = [];
        }
        //使用全局函数v简述,将系统配置项存储起来,方便调用
        v('system_config', $field);
    }

    /**
     * 设置微信通信配置项
     */
    public function setWechatConfig()
    {
        $model = Config::find(1);
        if ($model['wechat_config']) {
            //说明数据库有数据
            $field = json_decode($model['wechat_config'], true);
            if (!$field){
                $field =[];
            }
            //dd($field);
        } else {
            $field = [];
        }
        //调用c函数将微信配置项的数据存入到配置项中,但是不要覆盖原来的数据
        c('wechat', array_merge(c('wechat'), $field));
        //p(c('wechat'));die;
    }
}