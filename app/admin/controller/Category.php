<?php namespace app\admin\controller;

use system\model\Category as CategoryModel;

class Category extends Common
{
    //中间件
    public function __construct()
    {
        $this->auth();
    }

    /**
     * 显示栏目
     * @return mixed
     */
    public function index()
    {
        //获取栏目表的数据
        $cateDate = CategoryModel::get();
        //判断是够为空
        //如果为空给一个默认空数组
        //不为空转化为数组
        $data = $cateDate ?$cateDate->toArray() :[];
        //树状结构
        $cateDate = Arr::tree($data, 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
        return view('', compact('cateDate'));
    }


    /**
     * 添加/修改
     * @param CategoryModel $category
     * @return array|mixed
     */
    public function add(CategoryModel $category)
    {
        //获取get参数cate_id
        $cate_id = Request::get('cate_id');
        //判断是否没找到get参数对应的数据
        //没空的话说明是添加否则为编辑
        $model = CategoryModel::find($cate_id) ?:$category;
        if (Request::isMethod('post')) {

            //将数据添加或更新到数据库
            $model->save(Request::post());

            //返回成功提示
            return $this->setRedirect(u('index'))->success('操作成功');
        }
        if ($cate_id) {//如果$cate_id存在就执行编辑操作
            $cateDate=$category->getCateDate($cate_id);
        } else {
            //如果$cate_id不存在就执行添加操作
            $cateDate = CategoryModel::get();
            $data = $cateDate ? $cateDate->toArray() : [];
            //转化为树形?
            $cateDate = Arr::tree($data, 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
        }
        return view('', compact('cateDate','model'));
    }

    /**
     * 删除方法
     * @return array
     */
    public function del(){
        //获取get参数主键值
        $cate_id=Request::get('cate_id');
        //获取对应pid的栏目数据
        //如果有数据就说明该栏目就有子栏目不能删除
        $cateDate = CategoryModel::where('cate_pid',$cate_id)->get();
        if ($cateDate) return $this->setRedirect('back')->success('该栏目具有子栏目不能删除!');

        //获取文章表对应id的数据
        //如果有数据就说明该栏目下有文章不能删除
        $artDate = \system\model\Article::where('art_cate_id',$cate_id)->get();
        if ($artDate) return $this->setRedirect('back')->success('该栏目具有文章不能删除!');

        //删除对应id的数据
        CategoryModel::delete($cate_id);
        return $this->setRedirect(u('index'))->success('操作成功');


    }
















//    public function add(CategoryModel $category)
//    {
//        if (Request::isMethod('post')){
//
//            $category->save(Request::post());
//
//            return $this->setRedirect(u('index'))->success('操作成功');
//        }
//        $cateDate = CategoryModel::get();
//        $data = $cateDate ? $cateDate->toArray() : [];
//        $cateDate = Arr::tree($data, 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
//        return view('',compact('cateDate'));
//    }
}
