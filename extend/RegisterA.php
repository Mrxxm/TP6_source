<?php


class RegisterA
{

    protected $age = 23;
    /**
     * register
     * @return string
     */
    public function abc()
    {
        return 'abc';
    }

    /**
     * 反射
     * @param $a
     * @param $b
     * @return string
     */
    public function ref($a, $b)
    {
        return $a . $b;
    }
}