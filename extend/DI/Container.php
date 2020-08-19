<?php


namespace DI;


class Container
{
    /**
     * 存放容器的数据
     * @var array
     */
    public $instances = [];

    /**
     * 容器中的对象实例
     * @var array
     */
    protected static $instance;

    private function __construct()
    {
    }

    /**
     * 获取当前容器的实例(单例)
     * @access public
     * @return array
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function set($key, $value)
    {
        $this->instances[$key] = $value;
    }

    /**
     * 获取容器里面的实例 会用到反射机制
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (isset($this->instances[$key])) {
            $key = $this->instances[$key];
        }

        $reflect = new \ReflectionClass($key);
        // 获取类的构造函数
        $c = $reflect->getConstructor();
        if (!$c) {
            return new $key;
        }
        // 获取构造函数参数
        $params = $c->getParameters();
        if (!$params) {
            return new $key;
        }
        foreach ($params as $param) {
            // 判断参数是否是个对象
            $class = $param->getClass();
            if (!$class) {
                // todo
            } else {
                $args[] = $this->get($class->name);
            }
        }

        return $reflect->newInstanceArgs($args);
    }

}