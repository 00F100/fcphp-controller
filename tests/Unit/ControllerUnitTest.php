<?php

use PHPUnit\Framework\TestCase;
use FcPhp\Controller\Controller;
use FcPhp\Service\Interfaces\IService;
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

    public function testCallbackService()
    {
        $instance = new TestController();
        $instance->callback('callbackService', function(string $service, $instance) {
            $this->assertEquals('test', $service);
            $this->assertInstanceOf(TestService::class, $instance);
        });
        $instance->setService('test', new TestService());
        $instance->getService('test');
    }
}

class TestController extends Controller implements IController
{

}

class TestService implements IService
{
    /**
         * Method to configure repository
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function setRepository(string $repository, $instance) :void
        {

        }
        
        /**
         * Method to return repository
         *
         * @param string $repository Name of repository
         * @throws FcPhp\Service\Exceptions\RepositoryNotFoundException
         * @return mixed
         */
        public function getRepository(string $repository)
        {

        }

        /**
         * Method to verify repository exists
         *
         * @param string $repository Name of repository
         * @return bool
         */
        public function hasRepository(string $repository) :bool
        {

        }

        /**
         * Method to configure callback
         *
         * @param string $name Name of callback
         * @param object $callback Callback to execute
         * @return void
         */
        public function callback(string $name, object $callback) :void
        {

        }

        /**
         * Method to configure callback
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function callbackRepository(string $repository, $instance) :void
        {
            
        }
}
