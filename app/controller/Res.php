<?php


namespace app\controller;


class Res
{
    public function index()
    {
        echo "index";
    }

    public function save()
    {
        halt(input());
    }

    public function update($id)
    {
        halt("update=>".$id);
    }

    public function delete($id)
    {
        halt("delete=>".$id);
    }
}