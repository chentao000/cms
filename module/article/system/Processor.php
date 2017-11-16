<?php
namespace module\article\system;

use module\HdProcessor;
use system\model\Article;

class Processor extends HdProcessor
{
    /**
     * 图文回复
     * @param $id
     */
    public function handler($id)
    {
        $data =Article::find($id);
        $news=array(
            array(
                'title'=>$data['art_title'],
                'discription'=>$data['art_description'],
                'picurl'=>__ROOT__.'/'.$data['art_thumb'],
                'url'=>$data['art_url']
            )
        );
        $this->news($news);
    }
}