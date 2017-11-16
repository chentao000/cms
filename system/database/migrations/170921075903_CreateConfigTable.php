<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateConfigTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'config', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('wechat_config',300)->defaults('')->comment('微信配置项');
            $table->string('system_config',300)->defaults('')->comment('系统配置项');
            $table->string('wechat_response', 200)->defaults ('')->comment ('微信系统回复');
		});
    }

    //回滚
    public function down() {
        Schema::drop( 'config' );
    }
}