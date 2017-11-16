<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class ChangeSlideTable extends Migration {
    //执行
	public function up() {
		Schema::table( 'slide', function ( Blueprint $table ) {
			//$table->string('name', 50)->add();
			$table->text('slide_content')->comment('轮播图内容')->add();
        });
    }

    //回滚
    public function down() {
            //Schema::dropField('slide', 'name');
    }
}