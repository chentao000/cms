<?php namespace system\model;

use houdunwang\model\Model;
use houdunwang\validate\Validate;

class Admin extends Model
{
    //数据表
    protected $table = "admin";
    //时间操作,需要表中存在created_at,updated_at字段
    protected $timestamps = true;

    /**
     * 登录验证
     * @param $data
     * @return array
     */
    public function login($data)
    {
        //1.数据验证
        //p(Session::all());die;
        Validate::make([
            ['admin_username', 'required', '请输入用户名', Validate::MUST_VALIDATE],
            ['admin_password', 'required', '请输入密码', Validate::MUST_VALIDATE],
            ['code', 'captcha', '验证码输入错误', Validate::MUST_VALIDATE]
        ], $data);


        //    获取数据库数据
        //通过用户名查找数据
        $adminModel = $this->where('admin_username',$data['admin_username'])->first();
        //2.比对用户名是否存在
        //验证用户名是否存在
        //如果找不到数据就说明用户名不存在
        if (!$adminModel) return ['code'=>0,'msg'=>'用户名不存在'];

        //3.验证密码是否正确
        if (!password_verify($data['admin_password'],$adminModel['admin_password'])) return ['code'=>0,'msg'=>'密码不正确'];

        //4.将用户信息存到session中
        Session::set('admin.admin_id',$adminModel['admin_id']);
        Session::set('admin.admin_username',$adminModel['admin_username']);
        return ['code'=>1,'msg'=>'登录成功'];
    }

    public function changePass($data)
    {
        //1.数据验证
        Validate::make([
            ['admin_password', 'required', '请输入原密码', Validate::MUST_VALIDATE],
            ['new_password', 'required', '请输入新密码', Validate::MUST_VALIDATE],
            ['new_password', 'confirm:confirm_password', '两次密码不相同', Validate::MUST_VALIDATE],
        ], $data);

        //2.对比原始密码是够正确
        $userinfo = $this->find(Session::get('admin.admin_id'));
        if (!password_verify($data['admin_password'],$userinfo['admin_password'])) return ['code'=>0,'msg'=>'原密码不正确'];
        //4.更新数据
        $userinfo['admin_password'] = password_hash($data['new_password'],PASSWORD_DEFAULT);
        $userinfo->save(); // 保存当前数据对象
        return ['code'=>1,'msg'=>'修改成功'];

    }



}