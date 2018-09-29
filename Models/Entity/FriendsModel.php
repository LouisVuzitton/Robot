<?php
namespace Models\Entity;

class FriendsModel extends BeanModel
{
    var $modelName = 'friends';
    private static $instance = null;

    /**
     * 初始化构造函数
     */
    function __construct()
    {
        parent::__construct($this->modelName);
    }

    /**
     * 单例
     */
    public static function M()
    {
        if(self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 设置备注
     * @param $username
     * @param $remarkName
     */
    public function setRemarkName($username, $remarkName)
    {
        $this->init()->setRemarkName($username, $remarkName);
    }

    /**
     * 设置好友置顶
     * @param $username
     * @param bool $isStick
     */
    public function setStick($username, $isStick = true)
    {
        $this->init()->setStick($username, $isStick);
    }

    /**
     * 添加好友
     * @param $username
     * @param null $content
     */
    public function add($username, $content = null)
    {
        $this->init()->add($username, $content);
    }

    /**
     * 同意好友请求
     * @param $message
     */
    public function approve($message)
    {
        $this->init()->approve($message);
    }
}
