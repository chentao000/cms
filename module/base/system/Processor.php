<?php
namespace module\base\system;

use module\base\model\BaseContent;
use module\HdProcessor;

class Processor extends HdProcessor
{
    /**
     * 回复文本消息
     * @param $module_id
     */
    public function handler($module_id)
    {
        $resContent = BaseContent::find($module_id);

        $this->text($resContent['content']);
    }
}