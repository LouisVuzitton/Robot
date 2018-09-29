<?php
namespace Controller;

use Models\Logic\FriendsLogic;

class MsgCollector extends BeanCollector
{
    /**
     * 联系人消息
     * @param $msg
     */
    public function User($msgs)
    {
        //外部参数
        $UserName = $msgs['from']['UserName'];

        //调用图灵机器人
        $msg = FriendsLogic::answer($msgs);

        //发送
        $this->SendText($UserName, $msg);
    }

    /**
     * 群组消息
     * @param $msg
     */
    public function Group($msgs)
    {
        //todo
    }

    /**
     * 公众号消息
     * @param $msg
     */
    public function Official($msgs)
    {
        //todo
    }

    /**
     * 特殊账号消息
     * @param $msg
     */
    public function Special($msgs)
    {
        //todo
    }

    /**
     * 自己消息
     * @param $msg
     */
    public function Self($msgs)
    {
        //todo
    }

    /**
     * 系统消息
     * @param $msg
     */
    public function System($msg)
    {
        //todo
    }
}