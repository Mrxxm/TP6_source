<?php


namespace designMode;


class Single
{
    static public $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function test()
    {
        return 'test';
    }
}