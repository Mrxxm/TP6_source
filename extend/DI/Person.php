<?php


namespace DI;


class Person
{
    protected $obj = null;

    public function __construct(Car $obj)
    {
        $this->obj = $obj;
    }

    /*
     * 依赖：Person依赖Car
     * 注入：Car注入Person
     */
    public function buy()
    {
        return $this->obj->pay();
    }
}