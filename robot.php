<?php
namespace App;

use Hanson\Vbot\Foundation\Vbot;
use Middleware\MsgRouter;

//错误开启
ini_set('display_errors', true);
error_reporting(E_ALL);

//声明路径
$sep = DIRECTORY_SEPARATOR;
$root = dirname(__FILE__).$sep;

//加载配置
$config = require 'config.php';

//加载组件
require_once $root. '/vendor/autoload.php';
require_once $root. '/Middleware/MsgRouter.php';

//自动加载类
spl_autoload_register(function ($cls)
{
    global $root, $sep;
    $path = explode('\\', $cls);
    include($root . join($sep, $path) . '.php');
});

//实例化
$robot = new Vbot($config);

//注册消息路由
$robot->messageHandler->setHandler([MsgRouter::class, 'Forward']);

//运行
$robot->server->serve();

