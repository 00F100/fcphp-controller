<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Controller\Controller;
use FcPhp\Controller\Interfaces\IController;

class ControllerUnitTest extends TestCase
{
    public function setUp()
    {
        $this->instance = new TestController();
    }

    public function testInstance()
    {
        $this->assertTrue($this->instance instanceof IController);
    }

    public function testGet()
    {
        $this->instance->setService('test', new TestService());
        $this->assertInstanceOf(TestService::class, $this->instance->getService('test'));
    }

    /**
     * @expectedException FcPhp\Controller\Exceptions\ServiceNotFoundException
     */
    public function testGetNotFound()
    {
        $this->instance->getService('notFound');
    }
}

class TestController extends Controller implements IController
{

}

class TestService
{

}