<?php
namespace Middleware;
use Controller\MsgCollector;

class MsgRouter
{
    static private $instance;

    /*
     * 单例模式
     */
    private static function Instance()
    {
        $instance = self::$instance;
        if(!$instance instanceof MsgCollector)
        {
            self::$instance = new MsgCollector();
            $instance = self::$instance;
        }
        return $instance;
    }

    /*
     * 消息路由
     */
    public static function Forward($msg)
    {
        $instance = self::Instance();
        switch ($msg['fromType'])
        {
            case 'Friend':
                $instance->User($msg);
                break;
            case 'Group':
                $instance->Group($msg);
                break;
            case 'Official':
                $instance->Official($msg);
                break;
            case 'Special':
                $instance->Special($msg);
                break;
                case 'Self':
                $instance->Self($msg);
                break;
            case 'System':
                $instance->System($msg);
                break;
        }
    }
}