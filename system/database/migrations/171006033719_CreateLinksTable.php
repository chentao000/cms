<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateLinksTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'links', function ( Blueprint $table ) {
			$table->increments( 'links_id' );
            $table->timestamps();
            $table->string ('links_name',100)->defaults ('')->comment ('友链名称');
            $table->string ('links_url',100)->defaults ('')->comment ('连接地址');
            $table->integer  ('links_sort')->defaults (100)->comment ('排序');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'links' );
    }
}