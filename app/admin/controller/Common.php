<?php namespace app\admin\controller;

use houdunwang\route\Controller;

class Common extends Controller
{
    /**
     * 公共方法
     */
    public function auth()
    {
        Middleware::set('auth');
    }
}
