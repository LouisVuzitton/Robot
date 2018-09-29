<?php
namespace Models\Entity;

class BeanModel
{
    /**
     * 数据连接器
     */
    private $model = null;

    public function __construct($modelName)
    {
        $this->model = vbot($modelName);
    }

    /**
     * 返回实例
     * @return mixed
     */
    public function init()
    {
        return $this->model;
    }

    /**
     * 根据昵称获取对象
     * @param string $nickname
     * @param bool $blur
     * @return mixed
     */
    public function getUserByNname($nickname, $blur = false)
    {
        return $this->model->getUsernameByNickname($nickname, $blur);
    }

    /**
     * 根据备注获取对象
     * @param string $remark
     * @param bool $blur
     * @return mixed
     */
    public function getUserByRname($remark, $blur = false)
    {
        return $this->model->getUsernameByRemarkName($remark, $blur);
    }

    /**
     * 搜索出 UserName
     * @param string $search
     * @param string $key
     * @param bool $blur
     * @return mixed
     */
    public function getUsername($search, $key, $blur = false)
    {
        return $this->model->getUsername($search, $key, $blur);
    }

    /**
     * 根据 UserName 获取联系人
     * @param string $username
     * @return mixed
     */
    public function getAccount($username)
    {
        return $this->model->getAccount($username);
    }
}