<?php
namespace Models\Entity;

class GroupsModel extends BeanModel
{
    var $modelName = 'groups';
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
    static function M()
    {
        if(self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 根据昵称获取群联系人
     * @param $nickname
     * @param bool $blur
     * @return mixed
     */
    public function getGroupsByNname($nickname, $blur = false)
    {
        return $this->init()->getGroupsByNickname($nickname, $blur);
    }

    /**
     * 根据昵称搜索群成员
     * @param $groupUsername
     * @param $memberNickname
     * @param bool $blur
     * @return mixed
     */
    public function getMembersByNname($groupUsername, $memberNickname, $blur = false)
    {
        return $this->init()->getMembersByNickname($groupUsername, $memberNickname, $blur);
    }

    /**
     * 创建群聊天
     * @param array $contacts
     * @return mixed
     */
    public function create(array $contacts)
    {
        return $this->init()->create($contacts);
    }

    /**
     * 删除群成员
     * @param $groupUsername
     * @param $members
     * @return mixed
     */
    public function delMember($groupUsername, $members)
    {
        return $this->init()->delMember($groupUsername, $members);
    }

    /**
     * 删除群成员
     * @param $groupUsername
     * @param $members
     * @return mixed
     */
    public function addMember($groupUsername, $members)
    {
        return $this->init()->addMember($groupUsername, $members);
    }

    /**
     * 设置群名称
     * @param $groupUsername
     * @param $members
     * @return mixed
     */
    public function setGroupName($group, $name)
    {
        return $this->init()->setGroupName($group, $name);
    }
}