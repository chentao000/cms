<?php namespace module\base\model;

use houdunwang\model\Model;

class BaseContent extends Model
{
    //数据表
    protected $table = "basecontent";

    //允许填充字段
    protected $allowFill = ['*'];

    //禁止填充字段
    protected $denyFill = [];

    //自动验证
    protected $validate = [
        //['字段名','验证方法','提示信息',验证条件,验证时间]
        ['content', 'required', '请输入回复内容', self::MUST_VALIDATE, self::MODEL_BOTH],
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
    //我们需要在 User 模型中写一个 phone 方法
    //我们需要在 BaseContent 模型中写一个 keywords 方法
    public function keywords()
    {
        //return $this->hasOne (关键字类,'关键词表中关联外键','回复表主键');
        //p($this->hasOne (\system\model\Keywords::class,'module_id','id'));die;
        return $this->hasOne(\system\model\Keywords::class, 'module_id', 'id');
    }
}