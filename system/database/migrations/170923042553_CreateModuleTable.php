<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateModuleTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'module', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('module_name',100)->defaults('')->comment('模型标识');
            $table->string('module_title',100)->defaults('')->comment('模型中文名称');
            $table->string('module_preview',100)->defaults('')->comment('模型预览图');
            $table->string('module_description',200)->defaults('')->comment('模型描述');
            $table->tinyInteger('module_is_system')->defaults(0)->comment('是否为系统模型,1是,0不是');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'module' );
    }
}