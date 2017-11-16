<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreatecategoryTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'category', function ( Blueprint $table ) {
			$table->increments( 'cate_id' );
            $table->timestamps();
            $table->string('cate_name',100)->defaults('')->comment('栏目名称');
            $table->string('cate_description',200)->defaults('')->comment('栏目描述');
            $table->string('cate_thumb',200)->defaults('')->comment('栏目缩略图');
            $table->integer('cate_sort')->defaults(0)->comment('栏目排序');
            $table->integer('cate_pid')->defaults(0)->comment('父级id');
            $table->tinyInteger('cate_ishome',100)->defaults(0)->comment('是否为封面,1是0不是');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'category' );
    }
}