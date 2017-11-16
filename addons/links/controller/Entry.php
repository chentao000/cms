<?php

namespace addons\links\controller;
use addons\links\model\Links;
use houdunwang\db\Db;
use module\Hdcontroller;

class Entry extends Hdcontroller
{
    /**
     * 首页展示
     * @return mixed
     */
    public function index()
    {
        //获取links数据库中的数据
        $links=Db::table('links')->orderBy('links_sort','desc')->paginate(10);
        return $this->template('',compact('links'));
    }

    /**
     * 编辑和添加
     * @return mixed
     */
    public function add()
    {
        //获取get参数links_id
        //如果存在执行编辑
        //不存在执行添加功能
        $links_id=Request::get('links_id');
        $model =Links::find($links_id)?:new Links();
        if (IS_POST){//点击提交按钮
            $post = Request::post();
            //p($post);die;
            //将数据添加到数据库中
            $model->save($post);
            //成功提示
            return $this->setRedirect(url('links.entry.index'))->success('操作成功');
        }

        return $this->template('',compact('model'));
    }

    /**
     * 删除
     * @return array
     */
    public function del()
    {
        //获取要删除元素的id
        $links_id=Request::get('links_id');
        //删除对应id的数据
        Links::delete($links_id);
        //成功提示
        return $this->setRedirect(url('links.entry.index'))->success('操作成功');
    }
}