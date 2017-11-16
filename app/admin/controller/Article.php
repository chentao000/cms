<?php namespace app\admin\controller;

use houdunwang\request\Request;
use module\Wechat;
use system\model\Article as ArticleModel;
use system\model\Category;

class Article extends Common
{
    use Wechat;

    //动作
    //调用中间件防止未登录直接进入方法
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
        //如果判断系统配置项分页是否存在
        //如果不存在就给一个默认值
        $num = v('system_config.art_num') ?: 10;
        //文章分页
        $arcDate = ArticleModel::orderBy('art_id', 'DESC')->paginate($num);
        return view('', compact('arcDate'));
    }

    /**
     * 添加修改
     * @param ArticleModel $article
     * @return array|mixed
     */
    public function add(ArticleModel $article)
    {
        //获取get参数arc_id
        $art_id = Request::get('art_id');
        //判断是否没找到get参数对应的数据
        //没空的话说明是添加否则为编辑
        $model = ArticleModel::find($art_id) ?: $article;

        //点击提交按钮才执行代码
        if (Request::isMethod('post')) {
            //p(Request::post());die;
            //将数据添加或更新到数据库
            $post = Request::post();
            //判断关键字是否存在于数据库中
            //如果不存在才添加
            $art_keyWord = Db::table('keywords')->where('keyword', $post['art_keyword'])->pluck('keyword');
            //dd($art_keyWord);
            //只有添加时才判断是否重复
            if ( $art_keyWord && is_null($art_id)) return $this->setRedirect(u('admin.article.add'))->success('关键词不能重复');
            //获取自增id
            $id = $model->save($post);

            //2017年9月26日15:37:12
            //添加数据表keyword数据
            $data = [
                'keyword' => $post['art_keyword'],
                'module_name' => 'article',
                'module_id' => $art_id ?: $id
            ];
            //调用关键字添加数据库的方法
            $this->saveKeyword($data);

            //返回成功提示
            return $this->setRedirect(u('index'))->success('操作成功');
        }
        //如果$arc_id不存在就执行添加操作
        //获取所有栏目数据
        $cateDate = Category::get();
        //如果栏目表没有数据就给一个默认空数组
        $data = $cateDate ? $cateDate->toArray() : [];
        //转化为树形结构
        $cateDate = Arr::tree($data, 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
        return view('', compact('cateDate', 'model'));
    }

    /**
     * 删除
     * @return array
     */
    public function del()
    {
        //获取get参数主键值
        $art_id = Request::get('art_id');
        //删除当前id对应的数据
        ArticleModel::delete($art_id);
        return $this->setRedirect(u('index'))->success('操作成功');


    }
}
