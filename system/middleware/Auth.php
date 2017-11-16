<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;

class Auth implements Middleware{
	//执行中间件
	public function run($next) {
        $this->checklogin();
         $next();
	}
	public function checklogin(){
        if (!Session::get('admin.admin_id')){
            return go('admin.login.index');
        }
    }
}