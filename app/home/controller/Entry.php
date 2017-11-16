<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;

use houdunwang\db\Db;
use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Article;
use system\model\Category;
use system\model\Module;

class Entry extends Controller
{
    private $template;
    /**
     * 构造方法
     * Entry constructor.
     */
    public function __construct()
    {
        //将重复的部分添加到属性中
        $this->template = "templates/".(IS_MOBILE ? 'mobile' :'web');
        define(__TEMPLATE__,$this->template);
        $this->runModule();
    }

    /**
     * 跳转到module目录
     */
    public function runModule()
    {
        //获取get参数action
        $action = Request::get('action');
        //通过"/"分割get参数
        $info = explode('/', $action);

        //获取对应控制器的$module_is_system
        //判断是够为系统模型
        $module_is_system = Module::where('module_name', $info[0])->pluck('module_is_system');

        //如果get参数action存在且$module_is_system不为空n那么就跳转到module目录
        if ($action && !is_null($module_is_system)) {

            //组合完整的控制器名
            //$class = 'module\base\controller\Wx';
            $class = ($module_is_system == 1 ? 'module' : 'addons') . "\\{$info[0]}\controller\\" . ucfirst($info[1]);
            //p($class);die;
            //(new $class)->index();
            $a = $info[2];
            //调用对应控制器的方法
            die(call_user_func_array([new $class, $a], []));
        }

    }

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $conf=[
          'css'=>'animation'
        ];
        return view($this->template.'/index.html',compact('conf'));
    }

    /**
     * 列表页
     * @return mixed
     */
    public function lists()
    {
        $conf=[
            'css'=>'view'
        ];
        $cate_id = Request::get('cate_id');
        //p($cate_id);
        $cate_data = Category::find($cate_id);
        //p($cateData->toArray());die;
        return view($this->template.'/lists.html',compact('conf','cate_data','cate_id'));
    }


    /**
     * 栏目页
     * @return mixed
     */
    public function home()
    {
        $conf=[
            'css'=>'view'
        ];
        $cate_id = Request::get('cate_id');
        //p($cate_id);
        $cate_data = Category::find($cate_id);
        //p($cateData->toArray());die;
        return view($this->template.'/home.html',compact('conf','cate_data'));
    }

    /**
     * 内容页
     * @return mixed
     */
    public function content()
    {
        $conf=[
            'css'=>'view'
        ];
        //获取文章id
        $art_id = Request::get('art_id');
        //获取对应id的文章表数据
        $artDate = Article::find($art_id);
        //没刷新一次界面点击次数加1
        Db::table("article")->where('art_id',$art_id)->increment('art_click',1);
        return view($this->template.'/content.html',compact('conf','artDate'));
    }

    /**
     * 搜索功能
     */
    public function search()
    {
        $search =Request::get('search');

        $conf=[
            'css'=>'view'
        ];
        if (Db::table('search')->where('search_keyword',$search)->first()){
            //如果能找见数据，+1
            Db::table('search')->where('search_keyword',$search)->increment('search_click',1);
        }else{
            Db::table('search')->where('search_keyword',$search)->insert(['search_keyword'=>$search,'search_click'=>1]);
        }

        //根据搜索词查找数据
        $searchData=Db::table('article')->where('art_title','like',"%$search%")->get();

        return view($this->template.'/search.html',compact('conf','searchData'));
    }
}