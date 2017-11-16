<?php namespace system\model;
use houdunwang\model\Model;
class Article extends Model{
	//数据表
	protected $table = "article";

	//允许填充字段
	protected $allowFill = [ '*'];

	//禁止填充字段
	protected $denyFill = [ ];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['art_title','required','请输入文章标题',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_author','required','请输入文章作者',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_sort','num:1,99999','请输入文章排序,1-99999',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_click','num:100,999999','请输入文章点击次数,100-999999',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_cate_id','required','请选择所属栏目',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_description','required','请输入文章描述',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_content','required','请输入文章内容',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['art_thumb','required','请上传文章封面',self::MUST_VALIDATE,self::MODEL_BOTH],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=true;
}