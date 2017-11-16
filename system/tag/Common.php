<?php namespace system\tag;

use houdunwang\db\Db;
use houdunwang\view\build\TagBase;

class Common extends TagBase
{
    /**
     * 标签声明
     * @var array
     */
    public $tags = [
        'line' => ['block' => false],
        'tag' => ['block' => true, 'level' => 4],
        'category' => ['block' => true, 'level' => 4],
        'article' => ['block' => true, 'level' => 4],
        'slide' => ['block' => true, 'level' => 4],
    ];


    //文章标签
    public function _article($attr, $content, &$view)
    {

        $row = isset($attr['row']) ? $attr['row'] : -1;
        $ishot = isset($attr['ishot']) ? $attr['ishot'] : -1;
        $iscommend = isset($attr['iscommend']) ? $attr['iscommend'] : -1;
        $rand = isset($attr['rand']) ? $attr['rand'] : -1;
        $cid = isset($attr['cid']) ? $attr['cid'] : -1;
        $order = isset($attr['order']) ? $attr['order'] : -1;
        $pagenum = isset($attr['pagenum']) ? $attr['pagenum'] : 10000;
        $str = <<<str
        <?php
            \$db = Db::table('article');
            \$cate = Db::table('category');
            if($cid>0){
                \$db->where('art_cate_id',$cid);
            }
            if($ishot==1)
			{
				\$db->where('art_ishot',$ishot);
			}
			if($iscommend==1)
			{
				\$db->where('art_iscommend',$iscommend);
			}
			if($rand==1)
			{
				\$db->orderBy('rand()');
			}
			if($order==2){
                \$db->orderBy('art_sort','desc');
            }
            if($order==1){
                 \$db->orderBy('art_sort','asc');
            }
            if($row>0){
                \$db->limit($row);
            }
            \$data = \$db->paginate($pagenum);
            \$num=0;
            foreach(\$data as \$field){
            \$num++;
            \$field['url'] = __ROOT__ . '/c/' . \$field['art_id'];
            \$field['cateName'] = \$cate->where('cate_id',\$field['art_cate_id'])->pluck('cate_name');
        ?>
        $content
        <?php
            }
        ?>
str;
        return $str;
    }


    /**
     * 栏目循环标签
     * @param $attr
     * @param $content
     * @param $view
     * @return string
     */
    public function _category($attr, $content, &$view)
    {
        $row = isset($attr['row']) ? $attr['row'] : -1;
        $order = isset($attr['order']) ? $attr['order'] : 1;
        $pid = isset($attr['pid']) ? $attr['pid'] :'-1';
        $str = <<<str
        <?php
            \$db = Db::table('category');
            if($pid>=0){
                \$db->where('cate_pid',$pid);
            }
            if($order==2){
                \$db->orderBy('cate_sort','desc');
            }else{
                \$db->orderBy('cate_sort','asc');
            }
            
            if($row>0){
                \$db->limit($row);
            }
            \$data = \$db->get();
            foreach(\$data as \$field){
                if(\$field['cate_ishome']==1){
                    \$field['url']=__ROOT__."/h/".\$field['cate_id'];
                }else{
                    \$field['url']=__ROOT__."/l/".\$field['cate_id'];
                }
        ?>
        $content
        <?php
            }
        ?>
str;
        return $str;
    }

    public function _slide($attr, $content, &$view)
    {
        $rand = isset($attr['rand']) ? $attr['rand'] : -1;
        $row = isset($attr['row']) ? $attr['row'] : -1;
        $str = <<<str
        <?php
            \$db = Db::table('slide');
            if($rand==1)
			{
				\$db->orderBy('rand()');
			}
            if($row>0){
                \$db->limit($row);
            }
            \$data = \$db->get();
            foreach(\$data as \$field){
        ?>
        $content
        <?php
            }
        ?>
str;
        return $str;
    }

    //line 标签
    public function _line($attr, $content, &$view)
    {
        return 'link标签 测试内容';
    }

    //tag 标签
    public function _tag( $attr, $content, &$view ) {
        $action = $attr['action'];
        if($action){
            //将拆成数组
            $info = explode ('.',$action);
            //(new \addons\links\system\Tag)->lists ();
            //(new \module\links\system\Tag)->lists ();
            //数据库查找是否系统模块
            $is_system = Db::table('module')->where('module_name',$info[0])->pluck('module_is_system');
            if(!is_null ($is_system)){
                $class = ($is_system==1?'module':'addons') . '\\' . $info[0] . '\system\Tag';
                return call_user_func_array ([new $class,$info[1]],[$attr, $content, &$view]);
            }
        }
    }

}