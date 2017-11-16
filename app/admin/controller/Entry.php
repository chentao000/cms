<?php

namespace app\admin\controller;


use system\model\Admin;

class Entry extends Common
{
    //控制类中间件
    public function __construct()
    {
        $this->auth();
    }

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        return view();
    }

    /**
     * 修改密码
     * @return array|mixed
     */
    public function changePass()
    {
        //点击确定按钮才执行下面的代码
        if (Request::isMethod('post')){
            //代用Admin模型中的修改密码方法
            $res = (new Admin())->changePass(Request::post());
            if ($res['code']){//成功提示
                //清除session
                Session::flush();
                return $this->setRedirect(u('config.index'))->success($res['msg']);
            }else{//失败提示
                return $this->setRedirect('back')->success($res['msg']);
            }
        }
        return view();
    }

    /**
     * 退出
     * @return array
     */
    public function out()
    {
        //清除session
        Session::flush();
        return go('login.index');
    }
}