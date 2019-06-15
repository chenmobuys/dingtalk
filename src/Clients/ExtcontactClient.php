<?php

namespace ChenDingtalk\Clients;

/**
 * Class ExtcontactClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/nb93oa
 */
class ExtcontactClient extends AbstractClient
{
    /**
     * 获取外部联系人标签列表
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function listLabelGroups($offset = 0, $size = 20)
    {
        return $this->executePost('topapi/extcontact/listlabelgroups', compact('offset', 'size'));
    }

    /**
     * 获取外部联系人列表
     * @param int $offset
     * @param int $size
     * @return mixed
     */
    public function lists($offset = 0, $size = 20)
    {
        return $this->executePost('topapi/extcontact/list', compact('offset', 'size'));
    }

    /**
     * 获取企业外部联系人详情
     * @param $user_id
     * @return \StdClass
     */
    public function get($user_id)
    {
        return $this->executePost('topapi/extcontact/get', compact('user_id'));
    }

    /**
     * 添加外部联系人
     * @param $contact
     * @return \StdClass
     */
    public function create($contact)
    {
        return $this->executePost('topapi/extcontact/create', compact('contact'));
    }

    /**
     * 更新外部联系人
     * @param $contact
     * @return \StdClass
     */
    public function update($contact)
    {
        return $this->executePost('topapi/extcontact/update', compact('contact'));
    }

    /**
     * 删除外部联系人
     * @param $user_id
     * @return \StdClass
     */
    public function delete($user_id)
    {
        return $this->executePost('topapi/extcontact/delete', compact('user_id'));
    }

}