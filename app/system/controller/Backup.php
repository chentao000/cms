<?php namespace app\system\controller;

use houdunwang\backup\Backup as BackupModel;
use houdunwang\request\Request;

class Backup extends Common
{
    //显示备份列表
    public function index()
    {

        $dirs = BackupModel::getBackupDir('backup');
        //p($dirs);die;
        return view('', compact('dirs'));
    }

    /**
     * 执行备份
     */
    public function run()
    {
        $config = [
            'size' => 2,//分卷大小单位KB
            'dir' => 'backup/' . date("Ymdhis"),//备份目录
        ];
        $status = BackupModel::backup($config, function ($result) {
            if ($result['status'] == 'run') {
                //备份进行中
                $message = $result['message'];
                die(view('message', compact('message')));
                //刷新当前页面继续下次
            } else {
                //备份执行完毕
                die($this->setRedirect(u('index'))->success($result['message']));
            }
        });
        if ($status === false) {
            //备份过程出现错误
            die($this->setRedirect('back')->success(BackupModel::getError()));
        }
    }

    /**
     * 执行还原
     */
    public function recovery()
    {
        //要还原的备份目录
        $config = ['dir' => Request::get('dir')];

        $status = BackupModel::recovery($config, function ($result) {
            if ($result['status'] == 'run') {
                //还原进行中
                $message = $result['message'];
                die(view('message', compact('message')));
                //刷新当前页面继续执行
            } else {
                //还原执行完毕
                die($this->setRedirect(u('index'))->success($result['message']));
            }
        });
        if ($status === false) {
            //还原过程出现错误
            die($this->setRedirect('back')->success(BackupModel::getError()));
        }
    }

    /**
     * 删除备份
     * @return array
     */
    public function del()
    {
        $dir = Request::get('path');
        Dir::del($dir);
        return $this->setRedirect('index')->success('删除成功');
    }

}
