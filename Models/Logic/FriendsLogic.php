<?php
namespace Models\Logic;

use lib\Api\Turing;
use Modles\Entity\FriendsModel;

class FriendsLogic
{
    public static function answer($msgs)
    {
        //过滤数据
        $msg = $msgs['content'];

        //获取答复
        $res =  Turing::Askquestions($msg);

        //格式化数据
        $reply  = $res['results'][0]['values']['text'];

        //返回
        return $reply;
    }
}