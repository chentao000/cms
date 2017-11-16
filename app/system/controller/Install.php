<?php

namespace app\system\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use houdunwang\validate\Validate;

class Install extends Controller
{
    //判断是否安装
    public function __construct()
    {
        $this->isIstalled();
    }

    /**
     * 判断是否安装
     */
    public function isIstalled()
    {
        //如果有lock.php就提示系统已安装
        //跳转到登录后台的界面
        if (is_file('lock.php')) {

            $this->setRedirect(u('admin.login.index'))->success('系统已安装,请删除lock.php文件');
        }
    }


    //版权协议
    public function copyright()
    {
        return view();
    }

    //环境检测
    public function environment()
    {

        $data['php_version'] = PHP_VERSION;//php版本
        $data['php_os'] = PHP_OS;//操作系统
        $data['server_software'] = $_SERVER['SERVER_SOFTWARE'];//服务器环境

        $data['gd'] = extension_loaded('gd');//GB
        $data['curl'] = extension_loaded('curl');//curl
        $data['pdo'] = extension_loaded('pdo');//pdo
        $data['openssl'] = extension_loaded('openssl');//GB

        $data['is_writable'] = is_writable('./');

        //p($data);

        return view('', compact('data'));
    }


    //链接数据库
    public function database()
    {
        if (Request::isMethod('post')) {
            //接受post数据
            $post = Request::post();
            //p($post);die;

            //2.执行验证
            Validate::make([
                ['host', 'required', '请输入主机地址', Validate::MUST_VALIDATE],
                ['database', 'required', '请输入数据库名', Validate::MUST_VALIDATE],
                ['user', 'required', '请输入数据库用户名', Validate::MUST_VALIDATE],
                ['password', 'required', '请输入数据库密码', Validate::MUST_VALIDATE],
            ]);

            //3.链接数据库
            try {
                //链接数据库
                $dsn = "mysql:host={$post['host']};dbname = {$post['database']}";
                $pdo = new \PDO($dsn, $post['user'], $post['password']);
                //如果./.env存在就进行正则替换
                if (is_file("./.env")) {
                    //获取./.env中的数据
                    $envContent = file_get_contents('./.env');
                    //p($envContent);die;
                    $str = preg_replace("/DB_HOST=(.*?)\n/", "DB_HOST={$post['host']}\n", $envContent);
                    $str = preg_replace("/DB_DATABASE=(.*?)\n/", "DB_DATABASE={$post['database']}\n", $str);
                    $str = preg_replace("/DB_USER=(.*?)\n/", "DB_USER={$post['user']}\n", $str);
                    $str = preg_replace("/DB_PASSWORD=(.*?)\n/", "DB_PASSWORD={$post['password']}\n", $str);

                    file_put_contents('./.env', $str);
                } else {//没有就新建./.env文件
                    $str = <<<str
APP_NAME=HDPHP 3.0
DB_DRIVER=mysql
DB_HOST={$post['host']}
DB_DATABASE={$post['database']}
DB_USER={$post['user']}
DB_PASSWORD={$post['password']}
str;
                    //写入到./.env文件中
                    file_put_contents('./.env', $str);
                }

                return ['valid'=>1,'message'=>'数据库链接成功'];
            } catch (\Exception $exception) {

                return ['valid' => 0, 'message' => $exception->getMessage()];
            }


        }
        return view();
    }

    public function tables()
    {
        //创建数据库
        cli("hd migrate:make");

        //基本数据填充
        cli("hd seed:make");

        //创建上传需要的附件表
        $sql = <<<EOF
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '会员编号',
  `name` varchar(80) NOT NULL,
  `filename` varchar(300) NOT NULL COMMENT '文件名',
  `path` varchar(300) NOT NULL COMMENT '文件路径',
  `extension` varchar(10) NOT NULL DEFAULT '' COMMENT '文件类型',
  `createtime` int(10) NOT NULL COMMENT '上传时间',
  `size` mediumint(9) NOT NULL COMMENT '文件大小',
  `data` varchar(100) NOT NULL DEFAULT '' COMMENT '辅助信息',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态',
  `content` text NOT NULL COMMENT '扩展数据内容',
  PRIMARY KEY (`id`),
  KEY `data` (`data`),
  KEY `extension` (`extension`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='附件';
EOF;
        Schema::sql($sql);
        go('system.install.finish');
    }

    public function finish()
    {
        //创建lock.php文件
        touch('lock.php');
        return view();
    }

}