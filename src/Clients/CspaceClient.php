<?php


namespace ChenDingtalk\Clients;


/**
 * Class CspaceClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/wk3krc
 */
class CspaceClient extends AbstractClient
{
    /**
     * 发送钉盘文件给指定用户
     * @param $agent_id
     * @param $userid
     * @param $media_id
     * @param $file_name
     * @return \StdClass
     */
    public function addToSingleChat($agent_id, $userid, $media_id, $file_name)
    {
        return $this->executePost('cspace/add_to_single_chat', compact('agent_id', 'userid', 'media_id', 'file_name'));
    }

    /**
     * 新增文件到用户钉盘
     * @param $agent_id
     * @param $code
     * @param $media_id
     * @param $space_id
     * @param $folder_id
     * @param $name
     * @param bool $overwrite
     * @return \StdClass
     */
    public function add($agent_id, $code, $media_id, $space_id, $folder_id, $name, $overwrite = false)
    {
        return $this->executeGet('cspace/add', compact('agent_id', 'code', 'media_id', 'space_id', 'folder_id', 'name', 'overwrite'));
    }

    /**
     * 获取企业下的自定义空间
     * @param null $agent_id
     * @param null $domain
     * @return \StdClass
     */
    public function getCustomSpace($agent_id = null, $domain = null)
    {
        return $this->executeGet('cspace/get_custom_space', compact('agent_id', 'domain'));
    }

    /**
     * 授权用户访问企业自定义空间
     * @param $type
     * @param $userid
     * @param int $duration
     * @param null $path
     * @param null $fields
     * @param null $agent_id
     * @param null $domain
     * @return \StdClass
     */
    public function grantCustomSpace($type, $userid, $duration = 0, $path = null, $fields = null, $agent_id = null, $domain = null)
    {
        return $this->executeGet('cspace/grant_custom_space', compact('type', 'userid', 'duration', 'path', 'fields', 'agent_id', 'domain'));
    }
}