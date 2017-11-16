<?php

namespace addons\links\system;

class Tag
{
    public function lists($attr, $content, &$view){
        $row = isset($attr['row']) ? $attr['row'] : -1;
        $str = <<<str
		<?php
		\$db = Db::table('links')->orderBy('links_sort','desc');
		if($row>0){
                \$db->limit($row);
            }
        \$data=\$db->get();
		foreach(\$data as \$k=>\$field){
		?>
		
		$content
		<?php
			}
		?>
str;
        return $str;
    }
}