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
        return $this->executePost('topapi/extcontact/listlabelgroups', compact('offset', 'size'))->result;
    }

    /**
     * 获取外部联系人列表
     * @param int $offset
     * @param int $size
     * @return mixed
     */
    public function lists($offset = 0, $size = 20)
    {
        return $this->executePost('topapi/extcontact/list', compact('offset', 'size'))->result;
    }

    /**
     * 获取企业外部联系人详情
     * @param $user_id
     * @return mixed
     */
    public function get($user_id)
    {
        return $this->executePost('topapi/extcontact/get', compact('user_id'))->result;
    }

    /**
     * 添加外部联系人
     * @param $contact
     * @return mixed
     */
    public function create($contact)
    {
        return $this->executePost('topapi/extcontact/create', compact('contact'))->userid;
    }

    /**
     * 更新外部联系人
     * @param $contact
     * @return bool
     */
    public function update($contact)
    {
        return $this->executePost('topapi/extcontact/update', compact('contact')) ? true : false;
    }

    /**
     * 删除外部联系人
     * @param $user_id
     * @return bool
     */
    public function delete($user_id)
    {
        return $this->executePost('topapi/extcontact/delete', compact('user_id')) ? true : false;
    }

}