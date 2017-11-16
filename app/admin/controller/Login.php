<?php

namespace app\admin\controller;
use houdunwang\route\Controller;
use houdunwang\view\View;
use system\model\Admin;

class Login extends Controller
{
    /**
     * 加载登录页面
     * @return mixed
     */
    public function index(){

        if (Request::isMethod('post')){
            //调用Admin模型中的登录方法验证
            $res = (new Admin())->login(Request::post());
            if ($res['code']){//成功提示
                return $this->setRedirect(u('entry.index'))->success('登录成功');
            }else{//失败提示
                return $this->setRedirect('back')->success($res['msg']);
            }
        }

        return View();
    }

    /**
     * 加载验证码
     */
    public function code()
    {
        Code::num(1)->make();
    }


}