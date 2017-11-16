<?php namespace app\wechat\controller;

use houdunwang\db\Db;
use houdunwang\route\Controller;
use module\base\model\BaseContent;
use system\model\Config;
use system\model\Keywords;
use system\model\Module;

class Api extends Controller
{

    //进行微信通信验证
    public function __construct()
    {
        WeChat::valid();
    }

    /**
     * 消息回复
     */
    public function handler()
    {
        //消息管理模块
        $instance = WeChat::instance('message');
        //关注用户扫描二维码事件
        $model = Config::find(1);
        $data = json_decode($model['wechat_response'], true);

        if ($instance->isSubscribeEvent()) {
            //向用户回复消息
            $instance->text($data['welcome']);
        }

        //粉丝发来的消息
        $message = $instance->getMessage();
        //消息内容
        $content = $message->Content;

        //查找关键词
        //$keyword = Keywords::where('keyword',$content)->first();
//        $keyword = Db::table( 'keywords' )->where( 'keyword','like', "%{$content}%" )->first();
//        if ($keyword){
        //   //说明数据库匹配到了这个数据
        //   //获取对应内容
//           $resContent = BaseContent::find($keyword['module_id']);
//            $instance->text($resContent['content']);
//          }
        $this->parseMessage($content);
        if ($instance->isTextMsg()) {
            //向用户回复消息
            $instance->text($data['default']);
        }
    }

    //处理回复消息
    public function parseMessage($content)
    {
        $keyword = Keywords::where('keyword', $content)->first();

        //说明数据库匹配到了这个数据
        //获取对应内容
        if ($keyword) {
            //根据关键词对应的模块，获取该模块是否为系统模块
            $module_is_system = Module::where('module_name', $keyword['module_name'])->pluck('module_is_system');
            //$class ="\module\base\system\Processor.php"
            $class = "\\" . ($module_is_system == 1 ? 'module' : 'addons') . "\\" . $keyword['module_name'] . "\system\Processor";
            //WeChat::instance('message')->text($class);
            call_user_func_array([new $class, 'handler'], [$keyword['module_id']]);
        }
    }
}
