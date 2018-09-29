<?php
namespace lib\Api;
use lib\Network\Http;

class Turing
{
    /*
     * apiKey 机器人标识
     */
    private $apiKey = '';

    /*
     * userId 用户唯一标识
     */
    private $userId = 'zhiming';

    /**
     * 向机器人发送问题
     * @param $msg
     * @return mixed|null
     */
    public static function Askquestions($msg)
    {
        //检验数据
        $apiKey = '';
        $userId = '';
        if ($apiKey == '' || $userId == '')
        {
            echo 'apiKey 和 userId 不能为空';
            return;
        }

        //组装数据
        $url = 'http://openapi.tuling123.com/openapi/api/v2';
        $data = [
            'reqType' => 0,
            'perception' => ['inputText' => ['text' => $msg]],
            'userInfo' => ['apiKey' => $apiKey, 'userId' => $userId],
        ];

        //请求数据
        $http = new Http();
        $res = $http->post($url, $data);
        $res = json_decode($res, true);

        //返回数据
        return $res;
    }
}