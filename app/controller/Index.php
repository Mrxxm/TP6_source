<?php
namespace app\controller;

use ali\Send;
use app\BaseController;
use designMode\Register;
use designMode\Single;
use DI\Car;
use DI\Container;
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
        $obj = (new \ReflectionClass('RegisterA'));
        $properties = $obj->getProperties(); // 获取所有属性
        dump($properties);
        $methods = $obj->getMethods(); // 获取所有方法
        foreach ($methods as $method) {
            $docComment = $method->getDocComment(); // 获取方法注释
            dump($docComment);
        }
        dump($methods);
        $obj = $obj->newInstanceArgs(); // 实例化反射类
        echo $obj->ref(1, 2);
    }

    // 反射机制-调用方法
    public function rel2()
    {
        $obj = (new \ReflectionClass('RegisterA'));
        // 方法一()
//        $obj = $obj->newInstance();
//        echo $obj->ref(1, 2);
        // 方法二
//        $method = $obj->getMethod('ref');
//        echo $method->invokeArgs($obj->newInstance(), ['mmm', '222']);

        // 判断方法的权限
        $method = (new \ReflectionMethod($obj->newInstance(), 'ref'));
        if ($method->isPublic()) {
            echo "ref是公共方法";
        } elseif ($method->isProtected()) {
            echo "ref是保护方法";
        } elseif ($method->isPrivate()) {
            echo "ref是私有方法";
        } else {
            echo "敲里吗";
        }
        dump($method->getParameters()); // 获取参数
        dump($method->getNumberOfParameters()); // 获取参数个数
    }

    // 容器
    public function container()
    {
        Container::getInstance()->set('person', new Person(new Car()));
        Container::getInstance()->set('car', new Car());

        $pObj = Container::getInstance()->get('person');
        $cObj = Container::getInstance()->get('car');
        dump($pObj->buy());
    }

    // 容器-反射
    public function containerRef()
    {
        Container::getInstance()->set('person', '\DI\Person');
        $pObj = Container::getInstance()->get('person');

        dump($pObj->buy());
    }

    // Countable
    public function countable()
    {
        $obj = new \CountableA();
        echo count($obj);
    }

}
