<?php
namespace app\controller;

use ali\Send;
use app\BaseController;
use designMode\Register;
use designMode\Single;
use DI\Car;
use DI\Person;
use Mrxxm\Scanner\Scanner;

class Index extends BaseController
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V6<br/><span style="font-size:30px">13载初心不改 - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }

    public function ali()
    {
        return Send::push();
    }

    public function scanner()
    {
        $urls = [
            'www.baidu.com',
            'www.baidddddd.com',
            'www.qq.com'
        ];

        $obj = new Scanner($urls);
        $result = $obj->getInvalidUrld();

        return json($result);
    }

    // 加载
    public function obj()
    {
        $obj = new \ObjArray();
        $obj['key'] = '1';
        var_dump($obj['key'], $obj['title']);
    }

    // yaconf
    public function ini()
    {
        $title = \Yaconf::get('abc.title');
        var_dump($title);
    }

    // yaml
    public function yaml()
    {
        $file = yaml_parse_file("../config/xxm.yaml");
        var_dump($file);
    }

    // 单例
    public function single()
    {
        $obj = Single::getInstance();
        var_dump($obj->test());
    }

    // 注册树
    public function register()
    {
        $a = new \RegisterA();
        Register::set('xxm', $a);

        $result = Register::get('xxm')->abc();

        var_dump($result);
    }

    // 依赖注入
    public function personBuy()
    {
        $xxm = new Person();
        $bmw = new Car();
        echo $xxm->buy($bmw);
    }

    // 反射机制
    public function rel()
    {
        $obj = (new \ReflectionClass('RegisterA'))->newInstanceArgs();
        echo $obj->ref(1, 2);
    }

}
