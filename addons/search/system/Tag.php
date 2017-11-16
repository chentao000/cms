<?php

namespace addons\search\system;

class Tag
{
    public function lists($attr, $content, &$view){
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $str = <<<str
		<?php
		\$data = Db::table('search')->orderBy('search_click','desc')->limit($row)->get();
		foreach(\$data as \$k=>\$field){
			\$field['url'] = __ROOT__ . '/search?search=' . \$field['search_keyword'];
		?>
		$content
		<?php
			}
		?>
str;
        return $str;
    }
}