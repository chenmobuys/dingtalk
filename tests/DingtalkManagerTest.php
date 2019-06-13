<?php

class DingtalkManagerTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    public function setUp()
    {
        $this->setDingtalkManager();
    }

    public function testDingtalkManager()
    {
        $this->assertInstanceOf('ChenDingtalk\DingtalkManager', $this->dingtalkManager);
    }

    public function testAttendanceClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\AttendanceClient', $this->dingtalkManager->attendance());
    }

    public function testAuthClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\AuthClient', $this->dingtalkManager->auth());
    }

    public function testBlackboardClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\BlackboardClient', $this->dingtalkManager->blackboard());
    }

    public function testCalendarClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CalendarClient', $this->dingtalkManager->calendar());
    }

    public function testCheckinClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CheckinClient', $this->dingtalkManager->checkin());
    }

    public function testCspaceClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CspaceClient', $this->dingtalkManager->cspace());
    }

    public function testDepartmentClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\DepartmentClient', $this->dingtalkManager->department());
    }

    public function testExtcontactClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\ExtcontactClient', $this->dingtalkManager->extcontact());
    }

    public function testHealthClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\HealthClient', $this->dingtalkManager->health());
    }

    public function testMediaClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MediaClient', $this->dingtalkManager->media());
    }

    public function testMessageClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MessageClient', $this->dingtalkManager->message());
    }

    public function testMicroappClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MicroappClient', $this->dingtalkManager->microapp());
    }

    public function testProcessClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\MessageClient', $this->dingtalkManager->message());
    }

    public function testReportClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\ReportClient', $this->dingtalkManager->report());
    }

    public function testRoleClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\RoleClient', $this->dingtalkManager->role());
    }


    public function testSmartworkClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\SmartworkClient', $this->dingtalkManager->smartwork());
    }

    public function testUserClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\UserClient', $this->dingtalkManager->user());
    }

    public function testWorkrecordClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\WorkrecordClient', $this->dingtalkManager->workrecord());
    }

    public function testCallbackClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\CallbackClient', $this->dingtalkManager->callback());
    }

    public function testNotifyClient()
    {
        $this->assertInstanceOf('ChenDingtalk\Clients\NotifyClient', $this->dingtalkManager->notify());
    }
}