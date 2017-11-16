<?php namespace app\system\controller;


use houdunwang\db\Db;
use houdunwang\dir\Dir;
use houdunwang\request\Request;
use houdunwang\validate\Validate;
use houdunwang\view\View;
use system\model\Module as ModuleModel;

class Module extends Common
{
    public function __construct()
    {
        $this->assignModuleData();
    }

    public function assignModuleData()
    {
        $moduleData = Db::table('module')->where('module_is_system',0)->get();
        View::with('moduleData',$moduleData);
    }

    //动作

    /**
     * 模块列表
     * @return mixed
     */
    public function index()
    {
        //获取addons的目录
        $dir = Dir::tree('addons');
        //p($dir);die;

        //获取数据库中已安装的模块有哪些
        $installModule = Db::table('module')->lists('module_name');
        $data = [];
        //循环$dir显示到页面上
        foreach ($dir as $value) {

            //组合配置项路径
            $config = $value['path'] . '/config.php';
            //dd($config);
            //如果$config存在执行代码
            if (is_file($config)) {
                //获取$congif中的数据
                $res = include $config;
                //添加一个标识判断是否安装
                $res['isInstalled'] = in_array($value['basename'], $installModule);
                //p($res);die;
                //添加到$data数组中
                $data[] = $res;
            }
        }
        //p($data);die;
        //此处书写代码...
        return view('', compact('data'));
    }

    /**
     * 设计模块
     * @return array|mixed
     */
    public function design()
    {
        if (Request::isMethod('post')) {
            //dd(Request::post());
            //1.接受post数据
            $post = Request::post();
            //2.数据验证
            Validate::make([
                ['module_name', 'required', '请输入模块标识', Validate::MUST_VALIDATE],
                ['module_title', 'required', '请输入模块中文名称', Validate::MUST_VALIDATE],
                ['module_description', 'required', '请输入模块描述', Validate::MUST_VALIDATE],
                ['module_preview', 'required', '请输入模块图片', Validate::MUST_VALIDATE],
            ], $post);

            //5.判断模块不能重复创建
            if (is_dir("addons/{$post['module_name']}") || is_dir("module/{$post['module_name']}")) {
                return $this->setRedirect('back')->success('模块已存在,不允许重复添加');
            }

            //3.生成目录的基本机构
            $dirs = ['controller', 'model', 'system', 'template'];
            foreach ($dirs as $dir) {
                Dir::create("addons/{$post['module_name']}/{$dir}");
            }

            //dd($post);


            //4.生成基本文件
            $module_name = $post['module_name'];
            $content = <<<str
<?php namespace addons\\{$module_name}\system;
use module\HdProcessor

/**
*微信处理器
*@package addons\pic\system
*/
class Processor extends HdProcessor
{
    public function handler(){
    }
}
str;
            file_put_contents("addons/{$module_name}/system/Processor.php", $content);

            //6.生成配置文件
            //将post数据保存下来,安装的时候需要将这些数据写入到数据库中
            file_put_contents("addons/{$module_name}/config.php", "<?php\r\nreturn " . var_export($post, true) . ";?>");
            return $this->setRedirect(u('index'))->success('操作成功');
        }
        return view();
    }

    /**
     * 安装
     * @param ModuleModel $module
     * @return array
     */
    public function install(ModuleModel $module)
    {
        //接受需要安装的标识
        $module_name = Request::get('module_name');
        //p($module_name);die;
        //将该模块下config.php文件中的数据获取出来写入到数据库中
        $config = include "addons/{$module_name}/config.php";
        $module->save($config);
        return $this->setRedirect(u('index'))->success('安装成功');
    }

    /**
     * 卸载
     * @param ModuleModel $module
     * @return array
     */
    public function uninstall(ModuleModel $module)
    {
        //接受需要卸载的标识
        $module_name = Request::get('module_name');
        //p($module_name);die;
        $module->where('module_name', $module_name)->delete();
        return $this->setRedirect(u('index'))->success('卸载成功');
    }

}
