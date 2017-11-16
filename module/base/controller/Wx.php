<?php
namespace module\base\controller;

use houdunwang\request\Request;
use module\base\model\BaseContent;
use module\Hdcontroller;

/**
 * 微信处理
 * Class Wx
 * @package module\base\controller
 */
class Wx extends Hdcontroller
{

    public function __construct()
    {
        Middleware::set('auth');
    }

    //获取回复内容
    public function index()
    {
        //获取回复内容
        $field = BaseContent::get();

        return $this->template('', compact('field'));
    }

    /**
     * 添加和编辑
     * @return array|mixed
     */
    public function add()
    {

        //p(url('base.wx.index'));
        //获取get参数
        $id = Request::get('id');

        //如果当前id对应的数据存在就执行编辑
        $baseContentModel = BaseContent::find($id)?:new BaseContent();

        if (Request::isMethod('post')){
            $post = Request::post();
            //验证关键词不能重复
            $keyWord = Db::table('keywords')->where('keyword', $post['keyword'])->pluck('keyword');

            if (!is_null($keyWord) && is_null($id)) return $this->setRedirect("url(base.wx.index)")->success('关键词不能重复');
            //返回内容表的自增id
            $baseContent_id = $baseContentModel->save($post);

            //添加关键词表
            $data =[
                'keyword'=>$post['keyword'],
                'module_name'=>'base',
                'module_id'=>$id?:$baseContent_id
            ];
            //调用写入关键词的方法
            $this->saveKeyword($data);

            return $this->setRedirect(url('base.wx.index'))->success('操作成功');

        }
        //分配关键词页面的变量
        $this->assignKeyword($id);

        return $this->template('',compact('baseContentModel'));
    }

    /**
     * 删除
     * @return array
     */
    public function del(){
        $id =Request::get('id');//回复表主键，关键词表的module_id

        //删除对应的内容表数据
        BaseContent::delete($id);
        //调用删除关键词表的方法
        //删除对应数据
        $this->delKeyword($id);
        return $this->setRedirect(url('base.wx.index'))->success('操作成功');
    }
}