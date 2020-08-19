<?php


namespace DI;


class Person
{
    /*
     * 依赖：Person依赖Car
     * 注入：Car注入Person
     */
    public function buy($obj)
    {
//        $bmw = new Car();
        return $obj->pay();
    }
}