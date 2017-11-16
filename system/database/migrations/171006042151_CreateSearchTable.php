<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateSearchTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'search', function ( Blueprint $table ) {
			$table->increments( 'search_id' );
            $table->timestamps();
            $table->string ('search_keyword',100)->defaults ('')->comment ('搜索关键词');
            $table->integer ('search_click')->defaults (0)->comment ('搜索关键词搜索次数');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'search' );
    }
}