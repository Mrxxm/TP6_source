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
Route::get('ali', 'index/ali'); // 类自动加载-自定义文件夹类
Route::get('scanner', 'index/scanner'); // 自定义composer包-手动加载
Route::get('obj', 'index/obj'); // ArrayAccess
Route::get('ini', 'index/ini'); // yaconf
Route::get('yaml', 'index/yaml'); // yaml
Route::get('single', 'index/single'); // 单例模式
Route::get('register', 'index/register'); // 注册树模式
Route::get('personBuy', 'index/personBuy'); // 依赖注入
Route::get('rel', 'index/rel'); // 反射机制
Route::get('rel2', 'index/rel2'); // 反射机制-调用方法
Route::get('container', 'index/container'); // 容器
Route::get('containerRef', 'index/containerRef'); // 容器-反射
Route::get('countable', 'index/countable'); // Countable
Route::get('container1', 'index/container1'); // 容器获取实例
Route::get('facade', 'index/facade'); // 门面模式
Route::get('provider', 'index/provider'); // 门面模式











