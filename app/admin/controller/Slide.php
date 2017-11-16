<?php namespace app\admin\controller;

use houdunwang\request\Request;
use system\model\Slide as SlideMidel;

class Slide extends Common
{
    //中间件
    public function __construct()
    {
        $this->auth();
    }

    //显示轮播图列表
    public function index()
    {

        //倒序排列并且分页
        $slideDate = SlideMidel::orderBy('slide_id', 'DESC')->paginate(5);

        return view('', compact('slideDate'));
    }


    /**
     * 添加/修改轮播图的方法
     * @param SlideMidel $slide
     * @return array|mixed
     */
    public function add(SlideMidel $slide)
    {
        //获取get参数slide_id
        //如果有get参数就是修改否则就是添加
        $slide_id = Request::get('slide_id');

        //如果slide表中能找到对应的id的数据就执行修改
        //不能就执行添加
        $model = SlideMidel::find($slide_id) ?: $slide;

        if (Request::isMethod('post')) {//点击提交按钮
            //执行添加/修改数据库
            $model->save(Request::post());

            return $this->setRedirect(u('index'))->success('操作成功');
        }
        return view('', compact('model'));
    }

    /**
     * 删除方法
     * @return array
     */
    public function del()
    {
        $slide_id = Request::get('slide_id');
        //删除对应id的数据
        SlideMidel::delete($slide_id);
        return $this->setRedirect(u('index'))->success('操作成功');
    }
}
