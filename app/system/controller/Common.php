<?php namespace app\system\controller;

use houdunwang\route\Controller;

class Common extends Controller{
    //动作
    //中间件防止不登录直接进入
    public function __construct(){
        //此处书写代码...
        Middleware::set('auth');
    }
}
