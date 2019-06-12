<?php


namespace ChenDingtalk\Clients;


/**
 * Class HealthClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/emdh5f
 */
class HealthClient extends AbstractClient
{
    /**
     * 获取用户钉钉运动开启状态
     * @param $userid
     * @return \stdClass
     */
    public function getUserStatus($userid)
    {
        return $this->executePost('topapi/health/stepinfo/getuserstatus', compact('userid'))->status;
    }

    /**
     * 获取个人或部门的钉钉运动数据
     * @param $type
     * @param $object_id
     * @param $stat_dates
     * @return \stdClass
     */
    public function lists($type, $object_id, $stat_dates)
    {
        return $this->executePost('topapi/health/stepinfo/list', compact('type', 'object_id', 'stat_dates'))->stepinfo_list;
    }

    /**
     * 批量获取钉钉运动数据
     * @param $userids
     * @param $stat_dates
     * @return \stdClass
     */
    public function listByUserId($userids, $stat_dates)
    {
        return $this->executePost('topapi/health/stepinfo/listbyuserid', compact('userids', 'stat_dates'))->stepinfo_list;
    }
}