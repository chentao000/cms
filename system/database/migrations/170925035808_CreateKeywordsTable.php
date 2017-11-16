<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateKeywordsTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'keywords', function ( Blueprint $table ) {
			$table->increments( 'kid' );
            $table->timestamps();
            $table->string('keyword',100)->defaults('')->comment('触发关键词');
            $table->string('module_name',100)->defaults('')->comment('哪个模块处理该关键词');
            $table->Integer('module_id')->defaults(0)->comment('对应模块id');

        });
    }

    //回滚
    public function down() {
        Schema::drop( 'keywords' );
    }
}