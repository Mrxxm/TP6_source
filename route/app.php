<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');
Route::get('ali', 'index/ali');
Route::get('scanner', 'index/scanner');
Route::get('obj', 'index/obj');
Route::get('ini', 'index/ini');
Route::get('yaml', 'index/yaml');
Route::get('single', 'index/single');
Route::get('register', 'index/register');
Route::get('personBuy', 'index/personBuy');
Route::get('rel', 'index/rel');
Route::get('rel2', 'index/rel2');
Route::get('container', 'index/container');
Route::get('containerRef', 'index/containerRef');







