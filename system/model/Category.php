<?php namespace system\model;

use houdunwang\db\Db;
use houdunwang\model\Model;

class Category extends Model
{
    //数据表
    protected $table = "category";

    //允许填充字段
    protected $allowFill = ['*'];

    //禁止填充字段
    protected $denyFill = [];

    //自动验证
    protected $validate = [
        //['字段名','验证方法','提示信息',验证条件,验证时间]
        ['cate_name', 'required', '栏目名称不能为空', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['cate_sort', 'num:1,999999', '栏目排序必须为数字1-999999', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['cate_description', 'required', '栏目描述不能为空', self::MUST_VALIDATE, self::MODEL_BOTH]
    ];

    //自动完成
    protected $auto = [
        //['字段名','处理方法','方法类型',验证条件,验证时机]
    ];

    //自动过滤
    protected $filter = [
        //[表单字段名,过滤条件,处理时间]
    ];

    //时间操作,需要表中存在created_at,updated_at字段
    protected $timestamps = true;

    /**
     * 获取排除自己和子集的数据
     * @param $cate_id
     * @return mixed
     */
    public function getCateDate($cate_id)
    {
        //1.找到当前数据所有子集
        $data = Db::table('category')->get();
        //获取子集id
        $cate_ids = $this->getSon($data,$cate_id);
        //2.把自己追加进去
        $cate_ids[] = $cate_id;
        $data = Db::table('category')->whereNotIn('cate_id',$cate_ids)->get();
        return Arr::tree($data,'cate_name','cate_id','cate_pid');

    }

    /**
     * 找自己cate_id
     * @param $data
     * @param $cate_id
     * @return array
     */
    public function getSon($data,$cate_id){
        //定义静态属性用于接受cate_id
        static $temp = [];
        //递归查询
        foreach ($data as $k=>$v){
            //循环判断是否和父级id形同
            //相同说明他是子集
            if($cate_id==$v['cate_pid']){
                $temp[] = $v['cate_id'];
                $this->getSon ($data,$v['cate_id']);
            }
        }
        return $temp;
    }
}