<?php

namespace ChenDingtalk\Clients;

/**
 * Class TravelClient
 * @package ChenDingtalk\Clients
 */
class TravelClient extends AbstractClient
{
    /**
     * 获得已经审核的差旅申请单的数据接口
     * @param string $submitDateFrom
     * @param string $submitDateTo
     * @param integer $currentPage
     * @param integer $pageSize
     * @return \stdClass
     * @see https://g.alicdn.com/dingding/opendoc/docs/_secrete/tab6.html?t=1467363848414
     */
    public function getTravelApplyInfo($submitDateFrom, $submitDateTo, $currentPage = 1, $pageSize = 100)
    {
        return $this->executePost('travel/getTravelApplyInfo', compact('submitDateFrom', 'submitDateTo', 'currentPage', 'pageSize'));
    }
}
