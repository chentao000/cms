<?php

namespace module;

use houdunwang\request\Request;
use system\model\Keywords;

/**
 * 微信相关的数据和方法
 * Trait Wechat
 * @package module
 */
trait Wechat
{
    /**
     * 关键词的添加和编辑
     */
    public function saveKeyword($data)
    {

        //如果是修改的话，$data会接受module_id数据
        //如果能找到数据说明是编辑，找不到数据(空数组)说明是添加
        $where = [
            ['module_id', $data['module_id']],
            ['module_name', $data['module_name']],
        ];
        $KeywordsModel = Keywords::where($where)->first();
        //p($KeywordsModel);die;
        $Keywords = $KeywordsModel ? Keywords::find($KeywordsModel['kid']) : new Keywords();

        $Keywords->save($data);
    }

    /**
     * 分配变量
     * @param $id
     */
    public function assignKeyword($id)
    {
        $info = explode('/', Request::get('action'));

        $where = [
            ['module_id', $id],
            ['module_name', $info[0]],
        ];

        $keyword = Keywords::where($where)->pluck('keyword');
        //p($keyword);
        View::with('keyword', $keyword);
    }


    /**
     * 删除
     * @param $id
     */
    public function delKeyword($id)
    {
        $info = explode('/', Request::get('action'));
        $where = [
            ['module_id', $id],
            ['module_name', $info[1]],
        ];
        Db::table('keywords')->where($where)->delete();
    }
}