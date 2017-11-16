<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateslideTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'slide', function ( Blueprint $table ) {
			$table->increments( 'slide_id' );
            $table->timestamps();
            $table->string ('slide_title',100)->defaults ('')->comment ('轮播图标题');
            $table->string ('slide_linkurl',200)->defaults ('')->comment ('跳转连接');
            $table->tinyInteger  ('slide_sort')->defaults (0)->comment ('轮播图排序');
            $table->string   ('slide_thumb',100)->defaults (0)->comment ('轮播图缩略图');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'slide' );
    }
}