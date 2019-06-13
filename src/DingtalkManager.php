<?php

namespace ChenDingtalk;

use GuzzleHttp\Client;

/**
 * Class DingtalkManager
 *
 * @method \ChenDingtalk\Clients\AttendanceClient attendance()
 * @method \ChenDingtalk\Clients\AuthClient auth()
 * @method \ChenDingtalk\Clients\BlackboardClient blackboard()
 * @method \ChenDingtalk\Clients\CalendarClient calendar()
 * @method \ChenDingtalk\Clients\CheckinClient checkin()
 * @method \ChenDingtalk\Clients\CspaceClient cspace()
 * @method \ChenDingtalk\Clients\DepartmentClient department()
 * @method \ChenDingtalk\Clients\ExtcontactClient extcontact()
 * @method \ChenDingtalk\Clients\HealthClient health()
 * @method \ChenDingtalk\Clients\MediaClient media()
 * @method \ChenDingtalk\Clients\MessageClient message()
 * @method \ChenDingtalk\Clients\MicroappClient microapp()
 * @method \ChenDingtalk\Clients\ProcessClient process()
 * @method \ChenDingtalk\Clients\ReportClient report()
 * @method \ChenDingtalk\Clients\RoleClient role()
 * @method \ChenDingtalk\Clients\SmartworkClient smartwork()
 * @method \ChenDingtalk\Clients\UserClient user()
 * @method \ChenDingtalk\Clients\WorkrecordClient workrecord()
 * @method \ChenDingtalk\Clients\CallbackClient callback()
 * @method \ChenDingtalk\Clients\NotifyClient notify()
 *
 * @package dingtalk
 */
class DingtalkManager
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var array
     */
    protected $clients = [];

    /**
     * @param array $config
     * @return DingtalkManager
     */
    public static function make($config = [])
    {
        return new self($config);
    }

    /**
     * DingtalkManager constructor.
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function client($name)
    {
        if (!isset($this->clients[$name])) {
            $this->clients[$name] = $this->createClient($name);
        }

        return $this->clients[$name];
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function createClient($name)
    {
        if(!array_key_exists('app_key',$this->config)){
            throw new DingtalkException('app_key cannot be empty!');
        }

        if(!array_key_exists('app_secret',$this->config)){
            throw new DingtalkException('app_secret cannot be empty!');
        }

        $class = '\\ChenDingtalk\\Clients\\' . ucfirst($name) . 'Client';
        $httpClient = new Client();
        return new $class($this, $httpClient, $this->config);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->client($name);
    }
}