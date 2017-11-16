<?php

namespace addons\search\controller;
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
        $search=Db::table('search')->orderBy('search_click','desc')->paginate(10);
        return $this->template('',compact('search'));
    }

    /**
     * 删除
     * @return array
     */
    public function del()
    {
        //获取要删除元素的id
        $search_id=Request::get('search_id');
        //删除对应id的数据
        Links::delete($search_id);
        //成功提示
        return $this->setRedirect(url('search.entry.index'))->success('操作成功');
    }
}