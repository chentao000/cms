<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreatearticleTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'article', function ( Blueprint $table ) {
			$table->increments( 'art_id' );
            $table->timestamps();
            $table->string('art_title',100)->defaults('')->comment('文章标题');
            $table->string('art_description',200)->defaults('')->comment('文章描述');
            $table->string('art_author',100)->defaults('')->comment('文章作者');
            $table->string('art_thumb',200)->defaults('')->comment('文章缩略图');
            $table->tinyInteger('art_iscommend')->defaults(0)->comment('是否推荐 1推荐0不推荐');
            $table->tinyInteger('art_ishot')->defaults(0)->comment('是否热门 1热门0不热门');
            $table->tinyInteger('art_sort')->defaults(0)->comment('文章排序');
            $table->Integer('art_click')->defaults(0)->comment('文章点击次数');
            $table->tinyInteger('art_cate_id')->defaults(0)->comment('文章所属栏目');
            $table->text('art_content')->comment('文章内容');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'article' );
    }
}