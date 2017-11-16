<?php namespace system\database\seeds;
use houdunwang\database\build\Seeder;
use houdunwang\db\Db;
class ModuleSeeder extends Seeder {
    //执行
	public function up() {
		//Db::table('news')->insert(['title'=>'后盾人']);
        $data =[
            [
                'module_name'=>'base',
                'module_is_system'=>1,
            ],
            [
                'module_name'=>'article',
                'module_is_system'=>1,
            ]
        ];

        foreach ($data as $v){
            Db::table('module')->insert($v);
        }
    }
    //回滚
    public function down() {

    }
}