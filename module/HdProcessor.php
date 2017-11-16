<?php

namespace module;

use houdunwang\route\Controller;
use houdunwang\wechat\WeChat;

/**
 * 微信处理器
 * Class HdProcessor
 * @package module
 */
class HdProcessor extends Controller
{
    //自动调用回复方法
    public function __call($name, $arguments)
    {

        $instance = WeChat::instance('message');
        $instance->$name(current($arguments));
        // TODO: Implement __call() method.
    }
}