<?php


namespace designMode;


class Register
{
    /*
     * 注册树池子
     * @var null
     */
    protected static $object = null;

    /*
     * 将对象设置到树上
     */
    public static function set($key, $object)
    {
        self::$object[$key] = $object;
    }

    /*
     * 从树上获取对象，如果没有的时候 注册
     */
    public static function get($key)
    {
        if (!isset(self::$object[$key])) {
            self::$object[$key] = new $key;
         }

        return self::$object[$key];
    }

    /*
     * 注销
     */
    public static function _unset($key)
    {
        unset(self::$object[$key]);
    }
}