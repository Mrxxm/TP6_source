<?php


class CountableA implements Countable
{
    public function count()
    {
        return 123;
    }
}