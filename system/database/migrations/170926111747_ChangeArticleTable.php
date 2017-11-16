<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class ChangeArticleTable extends Migration {
    //执行
	public function up() {
		Schema::table( 'article', function ( Blueprint $table ) {
			//$table->string('name', 50)->add();
			$table->string('art_keyword', 100)->defaults('')->comment('微信关键词')->add();
			$table->string('art_url', 100)->defaults('')->comment('原文链接')->add();
        });
    }

    //回滚
    public function down() {
            //Schema::dropField('article', 'name');
    }
}