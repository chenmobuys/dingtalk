<?php

/**
 * Class DingtalkManagerTest
 */
class DingtalkManagerTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @test
     */
    public function setUp()
    {
        $this->setDingtalkManager();
    }

    /**
     * @test
     */
    public function dingtalkManager()
    {
        $this->assertInstanceOf('ChenDingtalk\DingtalkManager', $this->dingtalkManager);
    }

    /**
     * @test
     */
    public function attendanceClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\AttendanceClient', $this->dingtalkManager->attendance());
    }

    /**
     * @test
     */
    public function authClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\AuthClient', $this->dingtalkManager->auth());
    }

    /**
     * @test
     */
    public function blackboardClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\BlackboardClient', $this->dingtalkManager->blackboard());
    }

    /**
     * @test
     */
    public function calendarClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CalendarClient', $this->dingtalkManager->calendar());
    }

    /**
     * @test
     */
    public function checkinClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CheckinClient', $this->dingtalkManager->checkin());
    }

    /**
     * @test
     */
    public function cspaceClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CspaceClient', $this->dingtalkManager->cspace());
    }

    /**
     * @test
     */
    public function departmentClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\DepartmentClient', $this->dingtalkManager->department());
    }

    /**
     * @test
     */
    public function extcontactClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\ExtcontactClient', $this->dingtalkManager->extcontact());
    }

    /**
     * @test
     */
    public function healthClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\HealthClient', $this->dingtalkManager->health());
    }

    /**
     * @test
     */
    public function mediaClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MediaClient', $this->dingtalkManager->media());
    }

    /**
     * @test
     */
    public function messageClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MessageClient', $this->dingtalkManager->message());
    }

    /**
     * @test
     */
    public function microappClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MicroappClient', $this->dingtalkManager->microapp());
    }

    /**
     * @test
     */
    public function processClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MessageClient', $this->dingtalkManager->message());
    }

    /**
     * @test
     */
    public function reportClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\ReportClient', $this->dingtalkManager->report());
    }

    /**
     * @test
     */
    public function roleClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\RoleClient', $this->dingtalkManager->role());
    }


    /**
     * @test
     */
    public function smartworkClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\SmartworkClient', $this->dingtalkManager->smartwork());
    }

    /**
     * @test
     */
    public function userClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\UserClient', $this->dingtalkManager->user());
    }

    /**
     * @test
     */
    public function workrecordClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\WorkrecordClient', $this->dingtalkManager->workrecord());
    }

    /**
     * @test
     */
    public function callbackClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CallbackClient', $this->dingtalkManager->callback());
    }

    /**
     * @test
     */
    public function notifyClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\NotifyClient', $this->dingtalkManager->notify());
    }
}