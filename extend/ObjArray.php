<?php


class ObjArray implements ArrayAccess
{
    private $data = [
        'title' => 'xxm'
    ];

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
        return true;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}