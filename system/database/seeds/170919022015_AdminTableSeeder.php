<?php namespace system\database\seeds;
use houdunwang\database\build\Seeder;
use houdunwang\db\Db;
class AdminTableSeeder extends Seeder {
    //执行
	public function up() {
		//Db::table('news')->insert(['title'=>'后盾人']);
		Db::table('admin')->insert(['admin_username'=>'admin','admin_password'=>password_hash('admin888',PASSWORD_DEFAULT)]);

    }
    //回滚
    public function down() {

    }
}