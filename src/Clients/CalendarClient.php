<?php


namespace ChenDingtalk\Clients;

/**
 * Class CalendarClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/iqel76
 */
class CalendarClient extends AbstractClient
{
    /**
     * 创建日程
     * @param $create_vo
     * @return \stdClass
     */
    public function create($create_vo)
    {
        return $this->executePost('topapi/calendar/create', compact('create_vo'))->result;
    }
}